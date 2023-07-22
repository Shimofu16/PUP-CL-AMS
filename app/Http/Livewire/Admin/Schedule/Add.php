<?php

namespace App\Http\Livewire\Admin\Schedule;

use App\Models\FacultyMember;
use App\Models\ScheduleDate;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\TeacherClass;
use Livewire\Component;

class Add extends Component
{
    public $teacher_id;
    public $subject_id;
    public $section_id;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;
    public $day;
    public $days;
    public $semester_id;

    protected $rules = [
        'teacher_id' => 'required',
        'subject_id' => 'required',
        'section_id' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
        'day' => 'required',
        'semester_id' => 'required',
    ];
    public function updatedDay($value)
    {
        if ($this->days->count() > 0) {
            foreach ($this->days as $key => $day) {
                if ($day == $value) {
                    $this->days->forget($key);
                }
            }
            $this->days->push($value);
        } else {
            $this->days->push($value);
        }
        $this->sortDays();
    }
    public function removeDay($index)
    {
        try {
            $this->days->forget($index);
            $this->reset('day');
            $this->sortDays();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    private function sortDays()
    {
        $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $sorted = collect();
        foreach ($this->days as $k => $v) {
            $key = array_search($v, $daysOfWeek);
            if ($key !== FALSE) {
                $sorted[$key] = $v;
            }
        }
        $sorted->sortKeys();
        $this->days = $sorted;
    }
    private function getDates($start_date, $end_date, $days)
    {
        $dates = [];
        $start_date = new \DateTime($start_date);
        $end_date = new \DateTime($end_date);
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($start_date, $interval, $end_date);
        foreach ($period as $dt) {
            foreach ($days as $day) {
                if ($dt->format("l") === $day) {
                    $dates[] = $dt->format("Y-m-d");
                }
            }
        }

        return $dates;
    }
    private function generateColor()
    {
        $colors = [
            '#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a'
        ];
        $color = $colors[random_int(0, count($colors) - 1)];
        $sy = SchoolYear::where('is_active', 1)->first();
        $generatedColor = TeacherClass::where('sy_id',$sy->id)->where('semester_id',$sy->semester_id)->where('color', $color)->first() ? $this->generateColor() : $color;
        return $generatedColor;
    }
    public function store()
    {
        $validatedData = $this->validate();



        $dates = $this->getDates($validatedData['start_date'], $validatedData['end_date'], $this->days);
        $key = 'successToast';
        $message = 'Schedule successfully added!';
        $teacher_class_id = null;

        $sy = SchoolYear::where('is_active', 1)->first();
        foreach ($dates as $date) {
            $scheduleDates = ScheduleDate::with('schedule')
                ->whereHas('schedule', function ($query) use ($sy) {
                    $query->where('sy_id', $sy->id)
                        ->where('semester_id', $sy->semester_id);
                })
                ->whereDate('date', $date)
                ->where(function ($query) use ($validatedData) {
                    $query->where(function ($query) use ($validatedData) {
                        $query->where('start_time', '<=', $validatedData['start_time'])
                            ->where('end_time', '>=', $validatedData['start_time']);
                    })->orWhere(function ($query) use ($validatedData) {
                        $query->where('start_time', '<=', $validatedData['end_time'])
                            ->where('end_time', '>=', $validatedData['end_time']);
                    })->orWhere(function ($query) use ($validatedData) {
                        $query->where('start_time', '>=', $validatedData['start_time'])
                            ->where('start_time', '<=', $validatedData['end_time'])
                            ->orWhere('end_time', '>=', $validatedData['start_time'])
                            ->where('end_time', '<=', $validatedData['end_time']);
                    });
                })
                ->get();
            if ($scheduleDates->count() > 0) {
                $message = 'There is a conflict on Time for date ' . date('F d, Y', strtotime($date)) . ' and ' . $scheduleDates->count() . ' other date/s';
                $key = 'errorAlert';
            } else {
                if (!$teacher_class_id) {
                    $teacher_class_id = TeacherClass::create([
                        'teacher_id' => $validatedData['teacher_id'],
                        'subject_id' => $validatedData['subject_id'],
                        'section_id' => $validatedData['section_id'],
                        'start_date' => $validatedData['start_date'],
                        'end_date' => $validatedData['end_date'],
                        'sy_id' => SchoolYear::where('is_active', 1)->first()->id,
                        'semester_id' => $validatedData['semester_id'],
                        'color' => $this->generateColor(),
                    ])->id;
                }

                ScheduleDate::create([
                    'teacher_class_id' => $teacher_class_id,
                    'date' => $date,
                    'start_time' => $validatedData['start_time'],
                    'end_time' => $validatedData['end_time'],
                ]);
            }
        }






        // Perform database operations or other actions with the validated data

        // Reset form fields
        $this->reset();
        $this->days = collect();
        /* redirect back with successToast message */
        return redirect(request()->header('Referer'))->with($key, $message);
    }


    public function mount()
    {
        $this->days = collect();
    }
    public function render()
    {
        $teachers = FacultyMember::all();
        $subjects = Subject::all();
        $sections = Section::all();
        $semesters = Semester::all();

        return view('livewire.admin.schedule.add', compact('teachers', 'subjects', 'sections', 'semesters'));
    }
}

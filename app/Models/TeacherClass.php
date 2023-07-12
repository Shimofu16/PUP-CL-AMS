<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'teacher_id',
        'class_name',
        'description',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; */
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(FacultyMember::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'teacher_class_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function scheduleDates()
    {
        return $this->hasMany(ScheduleDate::class, 'teacher_class_id');
    }

    public function checkIfTeacherUsingComLab($teacher_class_id)
    {
        return $this->attendanceLogs()
            ->where('teacher_class_id', $teacher_class_id )
            ->where('faculty_member_id', '!=' ,null )
            ->where('time_out', '=', null)
            ->whereDate('created_at', now())
            ->first() ? true : false;
    }
    public function checkIfStudentAlreadyHasAttendance()
    {
        return $this->attendanceLogs()
            ->where('student_id', auth()->user()->student->id)
            ->where('time_out', '!=', null)
            ->whereDate('created_at', now())
            ->first() ? true : false;
    }
    public function checkifStudentHasTimeIn()
    {
        return $this->attendanceLogs()
            ->where('student_id', auth()->user()->student->id)
            ->where('time_in', '!=', null)
            ->where('time_out', '=', null)
            ->whereDate('created_at', now())
            ->first() ? true : false;
    }
    public function getTeacherSections()
    {
        return TeacherClass::with('section')->where('teacher_id', $this->teacher_id)->get();
    }

    public function scheduleRequest()
    {
        return $this->hasOne(ScheduleRequest::class, 'teacher_class_id', 'id')->withDefault([
            'status' => 'No Request',
        ]);
    }
    public function getLogsByDate($date)
    {
        return $this->attendanceLogs()->where('student_id','!=',null)->whereDate('created_at', $date)->get();
    }
    public function getTime()
    {
        return $this->scheduleDates()->whereDate('date', now())->first();
    }
    public function getScheduledDates()
    {
        return $this->scheduleDates()->get();
    }
    public function checkIfStudentHasScheduleToday()
    {
        try {
            return $this->scheduleDates()->whereDate('date', now()->format('Y-m-d'))->first() ? true : false;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return false;
        }
    }
}

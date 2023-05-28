<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'student_no',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'course_id',
    ]; */
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'student_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'student_id');
    }
    public function getFullName()
    {
        return Str::ucfirst($this->first_name) . ' ' . Str::ucfirst($this->last_name);
    }
    public function getScheduleBy($type)
    {
        switch ($type) {
            case 'today':
                /* get schedule for a today */
                $schedule = $this->section->schedules()->where('date', now()->format('Y-m-d'))->get();
                break;
            case 'week':
                /* get schedule for a week */
                $schedule = $this->section->schedules()->whereBetween('date', [now()->startOfWeek()->subDay(), now()->endOfWeek()->addDay()])->get();
                break;
            case 'month':
                /* get schedule for a month */
                $schedule = $this->section->schedules()->whereBetween('date', [now()->startOfMonth()->subDay(), now()->endOfMonth()->addDay()])->get();
                break;
        }
        if ($schedule) {
            return $schedule;
        }
        return collect();
    }
    public function checkIfStudentHasSchedule()
    {
        if ($this->section->schedules()->where('date', now()->format('Y-m-d'))->count() == 0) {
            return false;
        }
        return true;
    }
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
}

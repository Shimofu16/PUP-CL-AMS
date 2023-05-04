<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class, 'sy_id');
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'sy_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'sy_id');
    }
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'sy_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'sy_id');
    }
}

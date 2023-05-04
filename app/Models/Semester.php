<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class, 'semester_id');
    }
    public function schoolYears()
    {
        return $this->hasMany(SchoolYear::class, 'semester_id');
    }
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'semester_id');
    }
}

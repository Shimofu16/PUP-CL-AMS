<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class FacultyMember extends Model
{
    use HasFactory;
    /* protected $fileable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; */
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'faculty_member_id');
    }
    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class, 'teacher_id');
    }
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'faculty_member_id');
    }
    public function checkIfTeacherAlreadyTimeIn()
    {
        $log = $this->attendanceLogs()->where('time_in', '!=',null)->where('time_out', '=',null)->whereDate('created_at', now())->first();
        if ($log) {
            return true;
        }
        return false;
    }
    public function getFullName()
    {
        return Str::ucfirst($this->first_name) . ' ' . Str::ucfirst($this->last_name);
    }
}

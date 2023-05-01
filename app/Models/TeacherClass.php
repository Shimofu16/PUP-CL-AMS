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

    public function scheduleRequests()
    {
        return $this->hasMany(ScheduleRequest::class, 'teacher_class_id');
    }
}

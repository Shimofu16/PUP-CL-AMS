<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_class_id',
        'student_id',
        'computer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $guarded = [];

    public function teacherClass()
    {
        return $this->belongsTo(TeacherClass::class, 'teacher_class_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }
}

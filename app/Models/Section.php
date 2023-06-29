<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(TeacherClass::class, 'section_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'section_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    
}

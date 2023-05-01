<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'course_name',
        'description',
    ]; */
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class, 'course_id');
    }
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'course_id');
    }
}

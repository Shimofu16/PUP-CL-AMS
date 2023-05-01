<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacherClass()
    {
        return $this->belongsTo(TeacherClass::class);
    }
}

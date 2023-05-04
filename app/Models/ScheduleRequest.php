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
        return $this->belongsTo(TeacherClass::class, 'teacher_class_id', 'id')->withDefault([
            'status' => 'No Request',
        ]);
    }
    /* get the latest request of specific teacher_class_id */
    public function getLatestRequest()
    {
        return $this->latest()->first();
    }
}

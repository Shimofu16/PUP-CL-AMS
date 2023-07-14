<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function schedule()
    {
        return $this->belongsTo(TeacherClass::class, 'teacher_class_id')->withDefault();
    }
    public function request(){
        return $this->hasOne(ScheduleRequest::class, 'date_id', 'id');
    }
}

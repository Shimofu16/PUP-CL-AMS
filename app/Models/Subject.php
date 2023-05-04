<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(TeacherClass::class, 'subject_id');
    }
     public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function schedule()
    {
        return $this->belongsTo(TeacherClass::class, 'subject_id');
    }
}

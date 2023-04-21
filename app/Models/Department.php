<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'department_name',
        'description',
    ]; */
    protected $guarded = [];

    public function facultyMembers()
    {
        return $this->hasMany(FacultyMember::class, 'department_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    use HasFactory;
    /* protected $fileable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; */
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}

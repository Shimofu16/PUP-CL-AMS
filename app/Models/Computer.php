<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'computer_number',
        'computer_name',
        'os',
        'os_version',
        'processor',
        'memory',
        'storage',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; */
    protected $guarded = [];

    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class, 'computer_id');
    }
    public function computerStatusLogs()
    {
        return $this->hasMany(ComputerStatusLog::class, 'computer_id');
    }
}

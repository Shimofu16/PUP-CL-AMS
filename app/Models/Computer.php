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

    public function getStatus()
    {

        // Retrieve the latest computer status log (ordered by id in descending order)
        $latestComputerStatusLog = $this->computerStatusLogs()->orderBy('id', 'desc')->first();

        // Retrieve the last computer status log (ordered by id in ascending order)
        $lastComputerStatusLog = $this->computerStatusLogs()->orderBy('id', 'asc')->first();

        // Retrieve the latest attendance log (ordered by id in descending order)
        $latestAttendanceLog = $this->attendanceLogs()->orderBy('id', 'desc')->first();

        // Retrieve the last attendance log (ordered by id in ascending order)
        $lastAttendanceLog = $this->attendanceLogs()->orderBy('id', 'asc')->first();

        // Determine the computer status based on the latest or last log
        $computer = $latestComputerStatusLog ?? $lastComputerStatusLog;

        // Determine the attendance status based on the latest or last log
        $attendance = $latestAttendanceLog ?? $lastAttendanceLog;

        // Determine the overall status based on computer and attendance status
        $status = $computer->status ?? $attendance->status ?? 'no data';

        // Return true if the status is "Working", false if "Not Working", or "no data" if none is available
        return $status == 'Working' ? true : ($status == 'Not Working' ? false : 'no data');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'student_id',
        'faculty_member_id',
        'email',
        'status',
        'password',
        'force_change_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function facultyMember()
    {
        return $this->belongsTo(FacultyMember::class, 'faculty_member_id');
    }
    public function computerStatusLogs()
    {
        return $this->hasMany(ComputerStatusLog::class, 'user_id');
    }
    public function logs(){
        return $this->hasMany(Log::class, 'user_id');
    }
    public function getLogsWithinAWeek(){
        return $this->logs()->where('created_at', '>=', now()->subDays(7))->get();
    }
    public function getName(){
        if($this->role->name == 'student'){
            return $this->student->first_name.' '.$this->student->last_name;
        }else{
            return $this->facultyMember->first_name.' '.$this->facultyMember->last_name;
        }
    }
}

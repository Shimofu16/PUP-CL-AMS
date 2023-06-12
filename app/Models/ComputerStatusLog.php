<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerStatusLog extends Model
{
    use HasFactory;
    /* protected $fillable = [
        'computer_id',
        'status',
        'description',
        'checked_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; */
    protected $guarded = [];

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id')->withDefault([
            'status' => 'Not Working'
        ]);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

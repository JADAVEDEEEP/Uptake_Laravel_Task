<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_grant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'days_requested', 
        'leave_type', 
        'start_date', 
        'end_date', 
        'status', 
        'reason'
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

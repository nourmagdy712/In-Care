<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_feedback extends Model
{
    use HasFactory;
    public $timestamps = false;

    //many feedbacks sent by one user
    public function User(){
        return $this->belongsTo(User::class,'patient_id');
    }
}

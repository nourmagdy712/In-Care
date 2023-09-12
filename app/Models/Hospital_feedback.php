<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital_feedback extends Model
{
    use HasFactory;
    public $timestamps = false;
     //many feedbacks by one hospital
     public function Hospital(){
        return $this->belongsTo(Hospital::class);
    }
}

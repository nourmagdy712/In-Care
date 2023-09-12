<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance_request extends Model
{
    use HasFactory;
    //many requests by one hospital
    public function Hospital(){
        return $this->belongsTo(Hospital::class);
    }
    //many ambulance requests sent by one user
    public function ambReserve(){
        return $this->belongsTo(User::class);
    }
}

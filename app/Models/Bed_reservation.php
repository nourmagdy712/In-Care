<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed_reservation extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'condition',
        'age',
        'phone',
        'request_status'
    ];
    use HasFactory;
     //many reservations by one hospital
     public function Hospital(){
        return $this->belongsTo(Hospital::class);
    }
    //many reservations requests sent by one user
    public function bedReserve(){
        return $this->belongsTo(User::class);
    }
}

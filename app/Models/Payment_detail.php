<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{
    protected $fillable = [
        'admin_id',
        'hospital_id',
        'appointment_date'
    ];

    use HasFactory;
//one pd to one hospital
    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
    //many pd to one admin
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}

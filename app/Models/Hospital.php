<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    use HasFactory ,HasApiTokens, Notifiable;
  //  protected $searchable = ['Hospital_name','address'];
    protected $fillable=['admin_id','Hospital_name','email','password','phone','address','type','status'];
    public $timestamps = false;
//one hospital has one pd
    public function paymentDetails(){
        return $this->hasOne(Payment_detail::class);
    }
    //many hospital requests to one admin
    public function requestsManaged(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    // many hospitals added by one admin
    public function added(){
        return $this->belongsTo(Admin::class);
    }
    //one hospital manage many bed reservations
    public function reservationReq(){
        return $this->hasMany(Bed_reservation::class);
    }
   // one hospital manage many amb req
    public function ambReq(){
        return $this->hasMany(Ambulance_request::class);
    }
    //one hospital send many feedbacks
    public function hosFeedback(){
        return $this->hasMany(Hospital_feedback::class);
    }

}

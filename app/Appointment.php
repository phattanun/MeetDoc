<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    public $timestamps = false;

    public function disease()
    {
        return $this->belongsToMany('App\Disease', 'appointment_disease', 'appointment_id', 'disease_id');
    }

    public function prescription()
    {
        return $this->belongsToMany('App\Medicine', 'prescription', 'appointment_id', 'medicine_id');
    }

    public function given_medicine()
    {
        return $this->belongsToMany('App\Medicine', 'given_medicine', 'appointment_id', 'medicine_id');
    }

    public function patient()
    {
        return $this->hasOne('App\User', 'id', 'patient_id');
    }

    public function doctor()
    {
        return $this->hasOne('App\User', 'id', 'doctor_id');
    }
}

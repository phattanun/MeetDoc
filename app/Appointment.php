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
}

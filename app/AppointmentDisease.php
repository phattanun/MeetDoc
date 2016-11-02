<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentDisease extends Model
{
    protected $table = 'appointment_disease';
    public $timestamps = false;
    public function disease()
    {
        return $this->belongsTo('App\Disease', 'disease_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invalid_Appointment extends Model
{
    protected $table = 'invalid_appointment';
    protected $fillable = [];
    public function user()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }
    public function department()
    {
        return $this->belongsTo('App\Department', 'dept_id');
    }
}

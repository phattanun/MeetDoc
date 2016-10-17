<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GivenMedicine extends Model
{
    protected $table = 'given_medicine';
    public $timestamps = false;
    protected $primaryKey = 'appointment_id', 'medicine_id';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    public $timestamps = false;
    protected $primaryKey = 'appointment_id', 'medicine_id';
}

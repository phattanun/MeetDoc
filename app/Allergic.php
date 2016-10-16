<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergic extends Model
{
    protected $table = 'allergic';
    public $timestamps = false;
    protected $primaryKey = array('patient_id', 'medicine_id');
}

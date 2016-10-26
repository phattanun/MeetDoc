<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    public $timestamps = false;
    public function medicine()
    {
        return $this->belongsTo('App\Medicine', 'medicine_id');
    }
}

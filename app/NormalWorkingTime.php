<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalWorkingTime extends Model
{
    protected $table = 'normal_working_time';
    protected $guarded = array();
    public $timestamps = false;
}

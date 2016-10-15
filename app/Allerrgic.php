<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allerrgic extends Model
{
    protected $table = 'allergic';
    public $timestamps = false;
    protected $primaryKey = array('user_id', 'medicine_id');
}

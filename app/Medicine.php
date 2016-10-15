<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine';
    protected $primaryKey = 'medicine_id';
    public $timestamps = false;
}

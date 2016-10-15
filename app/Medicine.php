<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'drug';
    protected $primaryKey = 'medical_id';
    public $timestamps = false;
}

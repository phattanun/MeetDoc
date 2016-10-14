<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $table = 'drug';
    protected $primaryKey = 'medical_id';
    public $timestamps = false;
}

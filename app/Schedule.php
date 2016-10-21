<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule_view';
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

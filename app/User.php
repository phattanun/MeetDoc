<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = 'user';
    public $timestamps = false;
    public $primaryKey = 'ssn';
}

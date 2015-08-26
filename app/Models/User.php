<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    //$name = 'User';
    protected $table = 'users';
    protected $fillable = [
    	'username',
    	'password'
    ];
}

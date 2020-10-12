<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'password', 'Hinh'];
    protected $primaryKey = 'id';
    protected $table = 'users';
}

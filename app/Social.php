<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'provider_user_id',  'provider',  'user_id'
    ];

    protected $primaryKey = 'id';
    protected $table = 'social';

    public function login(){
        return $this->belongsTo('App\Login', 'user_id');//tu tong gan khoa chinh id user thanh user social
    }

}

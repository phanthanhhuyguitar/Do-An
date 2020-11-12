<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slide';
    public function categories()
    {
        return $this->belongsTo('App\Model\Categories','idTheloai','id');
    }
}

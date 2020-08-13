<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tintuc';

    public function typeNews()
    {
        return $this->belongsTo('App\Model\TypeNews','idLoaiTin','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment','idTinTuc','id');
    }
}

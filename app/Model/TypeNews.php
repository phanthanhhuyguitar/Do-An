<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeNews extends Model
{
    protected $table = 'loaitin';

    public function categories()
    {
        return $this->belongsTo('App\Model\Categories','idTheLoai','id');
    }

    public function news()
    {
        return $this->hasMany('App\Model\News','idLoaiTin','id');
    }
}

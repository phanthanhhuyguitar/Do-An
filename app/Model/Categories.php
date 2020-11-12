<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'theloai';

    public function typeNews()
    {
        return $this->hasMany('App\Model\TypeNews','idTheLoai','id');
    }
    public function Slider()
    {
        return $this->hasMany('App\Model\Slider','idTheloai','id');
    }
    public function news()
    {
        return $this->hasManyThrough('App\Model\News','App\Model\TypeNews','idTheLoai','idLoaiTin','id');
    }
};

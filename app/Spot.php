<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    //「1対多」なので複数形
    public function posts()   
{
    return $this->hasMany('App\Post');  
}
}

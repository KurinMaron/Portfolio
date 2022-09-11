<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    //Postに対するリレーション
    
    //「1対多」
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function getByTitle(int $limit_count = 5)
    {
     return $this->posts()->with('title')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

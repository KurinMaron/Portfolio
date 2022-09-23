<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;
    
     protected $fillable = [
        'title',
        'body',
        'spot',
        'category_id',
        'user_id',
        'address',
        'image_path',
        'title_id'
    ];
    
    //Categoryに対するリレーション
       
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    //Likeに対するリレーション
    
    //「1対多」
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }
    
    //Titleに対するリレーション
    
    //「1対多」
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
    
    /**
     * リプライにLIKEを付いているかの判定
     *
     * @return bool true:Likeがついてる false:Likeがついてない
     */
    public function is_liked_by_auth_user()
    {  
        $id = Auth::id();
        
        $likers = array();
        foreach($this->likes as $like) {
          array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
          return true;
        } else {
          return false;
        }
    }
    
    public function getByPost(int $limit_count = 5)
    {
     return $this->likes()->with('post')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }   
    
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this::with('title')->orderBy('updated_at', 'DESC')->paginate($limit_count);
       
    }
    
    public function getByTitle(int $limit_count = 5)
    {
        return $this->posts()->with('title')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    //Userに対するリレーション
    
    //「1対多」の関係なのでuser(単数形)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

}
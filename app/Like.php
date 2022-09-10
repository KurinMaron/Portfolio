<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
      'post_id',
      'user_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('post')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
}

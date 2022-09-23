<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function messageStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->title_id = $data['title_id'];
        $this->body = $data['body'];
        $this->save();

        return;
    }
}

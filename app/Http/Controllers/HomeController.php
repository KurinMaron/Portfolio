<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Post $post)
    {
        $user_likes = $user->getLikes();
        
        if (!empty($user_likes->toArray())) {
            $like_post_id = [];
            foreach ($user_likes as $user_like) {
                $like_post_id[] = $user_like->post_id;
            }
            return view('mypage')->with(['posts' => $user->getOwnPaginateByLimit(), 'likes' =>$post->find($like_post_id)]);
        }else{
            return view('not_login_mypage')->with(['posts' => $user->getOwnPaginateByLimit()]);
        }
       
        //return view('mypage')->with(['posts' => $user->getOwnPaginateByLimit(),
        //'likes' =>$post->find($like_post_id)]);
    }
}

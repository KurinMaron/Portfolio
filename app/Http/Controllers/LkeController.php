<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;

class LkeController extends Controller
{
   public function mypage(Post $post)
   {
       return view('mypage')->with(['posts' => $post->get()]);;
   }
   
   
}
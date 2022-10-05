<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Category;
use App\Title;
use App\Spot;
use Storage;
use App\Like;
use App\Message;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }
    
    public function search(Request $request, Post $post, Like $like, Title $title)
    {
        //ランキング
        $ranks = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Title::query();
        
        //もし検索フォームにキーワードが入力されたら
        if ($search){
            //// 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
             }
             
             $title = $query->orderBy('created_at','desc')->with('posts.likes','posts.user')->paginate(2);
             
            
             return view('posts/search')->with(['search' => $search, 'ranks' => $ranks, 'titles' => $title]);
             
        }else{
            return view('posts/search')->with(['search' => $search, 'ranks' => $ranks, 'titles' => $title->with('posts.likes','posts.user')->paginate(2)]);
        }
        
    }
    
    public function mypage(Post $post)
    {
        return view('mypage')->with(['likes' => $post->getByPost()]);
    }
    
    public function show(Post $post, Message $message, Title $title, Category $category)
    {
        $messages = $message->where('title_id', $title->id)->get();
        //dd($title);
        return view('posts/show')->with(['post' => $post, 'messages' => $messages, 'title' => $title, 'categories' => $category]);
    }
    
    public function detail(Post $post)
    {
        return view('posts/detail')->with(['post' => $post]);
    }
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
          'post_id' => $id,
          'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Liked the Post.');

        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        
        session()->flash('success', 'You Unliked the Post.');
        
        return redirect()->back();
    }
    
    public function create(Title $title)
    {
        return view('posts/create')->with(['title' => $title]);;
    }
    
    public function store(PostRequest $request, Post $post, Title $title)
    {
        
        $input = $request['post'];
        //dd($input);
    
        $input += ['user_id' => $request->user()->id];
            
         //画像アップロード
        //s3にアップロード開始
        $image = $request->file('image');
        //パケットの'otamap'フォルダへアップロード
        $path = Storage::disk('s3')->putFile('otamap', $image, 'public');
        //アップロードした画像のフルパスを取得
        $post->image_path = Storage::disk('s3')->url($path);
        
        
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
    return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $input_post += ['user_id' => $request->user()->id];  
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
?>

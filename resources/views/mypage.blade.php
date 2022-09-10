<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　マイページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        
        <h1><?php $user = Auth::user(); ?>{{ $user->name }}</h1>
        
        <div class='posts'>
            
            <h2>投稿一覧</h2>
            
            @foreach($posts as $post)
            <div class='post'>
                <h3 class="spot">聖地
                    <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
                </h3>
                
                <h4 class="title">作品名
                    <a href="/shows/{{ $post->id }}">{{ $post->title }}</a>
                </h4>
                
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a><br>
                
            </div>
            
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
            </form>
            
            @endforeach
            
            <h2>行きたい一覧</h2>
            @foreach($likes as $like)
                <h3 class="spot">聖地
                    <a href="/posts/{{ $like->id }}">{{ $like->spot }}</a>
                </h3>
                
                <h4 class="title">作品名
                    <a href="/shows/{{ $like->id }}">{{ $like->title }}</a>
                </h4>
                
                <a href="/categories/{{ $like->category->id }}">{{ $like->category->name }}</a><br>
                
            </div>
            
            @endforeach
        </div>
        
        [<a href='/posts/create'>create</a>]<br>
        
        <div class="back">[<a href="/">back</a>]</div>
        
        <div class='paginate'>
            {{ $posts->appends(Request::only('search'))->links() }}
        </div>
        @endsection
    </body>
</html>
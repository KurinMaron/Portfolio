<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　検索一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        
        <form method="GET" action="/" class="text-center">
            <div class="form_group">
            @csrf
                <input type="text" placeholder="作品名" name="search" value="@if (isset($search)) {{ $search }} @endif"/>
                <button type="submit">検索</button>
            </div>
        </form>
        
        <a class="mb-3 mx-3" href="/mypage">マイページ</a>
        
        <div class='posts'>
            @foreach($posts as $post)
            
            <div class='post'>
                <h3 class="spot">聖地
                    <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
                </h3>
                
                <p>行きたい総数{{ $post->likes->count() }}</p>
                
                <h4 class="title">作品名
                    <a href="/shows/{{ $post->title->id }}">{{ $post->title->name }}</a>
                </h4>
                
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a><br>
                
                <p>投稿者 {{ $post->user->name }}</p>
                
            </div>
            
            @endforeach
        </div>
        
         <div class='ranks'>
            <h2>ランキング </h2>
            @foreach($ranks as $rank)
            
                <div class='posts'> 
                    <h3 class="spot">聖地{{ $loop->index }}位
                        <a href="/posts/{{ $post->id }}">{{ $rank->spot }}</a>
                    </h3>
                    
                    <p>行きたい総数{{ $rank->likes->count() }}</p>
                    
                </div>
            @endforeach
        </div>
        
        [<a href='/posts/create'>create</a>]<br>
        
        <div class='paginate'>
            {{ $posts->appends(Request::only('search'))->links() }}
        </div>
        @endsection
    </body>
</html>
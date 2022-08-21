<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>オタマップ　作品詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        
         <h1 class='spot'>
             聖地 <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
        </h1>
               
        <h1 class="title">作品名
            {{ $post->title }}
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h4>作品詳細</h4>
                <p>{{ $post->body }}</p>  
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            </div>
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        @endsection
    </body>
</html>
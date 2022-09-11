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
        <header><h1>オタマップ</h1></header>
        
        {{ Auth::user()->name }}
        
        @csrf
        <form action="/" method="POST">
            <input id="section_form" type="text" placeholder="作品名"/>
        </form>
        
        <button type="submit" form="serach_form">検索</button><br>
        
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h3 class="title">
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
               <a href="">{{ $post->category->name }}</a>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            </div>
            @endforeach
        </div>
        
        [<a href='/posts/create'>create</a>]
        
        
        @csrf
        @method('DELETE')
        <button type="submit">delete</button> 
        </form>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        @endsection
    </body>
</html>
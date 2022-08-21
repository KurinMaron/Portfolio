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
        
        @csrf
        <form action="/" method="POST">
            <input id="section_form" type="text" placeholder="作品名"/>
        </form>
        <button type="submit" form="serach_form">検索</button><br>
        
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h3 class="spot">聖地
                    <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
                </h3>
                <h4 class="title">作品名
                    <a href="/shows/{{ $post->id }}">{{ $post->title }}</a>
                </h4>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a><br>
                <p>{{ $post->user->name }}</p>
            </div>
            @endforeach
        </div>
        
        [<a href='/posts/create'>create</a>]<br>
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
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
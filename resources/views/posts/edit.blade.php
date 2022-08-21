<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　検索一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        @extends('layouts.app')　
        @section('content')
    
        <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='content__spot'>
                        <h2>聖地</h2>
                        <input type='text' name='post[spot]' value="{{ $post->spot }}">
                    </div>
                    
                    <h2>聖地住所</h2>
                        <input type='text' name='post[address]' value="{{ $post->address }}">
                    </div>
                    
                    <div class='content__title'>
                        <h2>作品名</h2>
                        <input type='text' name='post[title]' value="{{ $post->title }}">
                    </div>
                    
                    <div class='content__body'>
                        <h2>本文</h2>
                        <input type='text' name='post[body]' value="{{ $post->body }}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
            
         <div class="back">[<a href="/">back</a>]</div>
         @endsection
    </body>
</html>

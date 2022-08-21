<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　検索一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <body>
        @extends('layouts.app')　
        @section('content')
        <header><h1>オタマップ</h1></header>
        
         <form action="/posts" method="POST">
            @csrf
            <div class="spot">
                <h2>聖地名</h2>
                <input type="text" name="post[spot]" placeholder="地名" value="{{ old('post.spot') }}"/>
            </div>
            
            <div class="address">
                <h2>聖地住所</h2>
                <input type="text" name="post[address]" placeholder="地名" value="{{ old('post.address') }}"/>
            </div>
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="本文">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post/body') }}</p>
            </div>
            
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        @endsection
    </body>
</html>

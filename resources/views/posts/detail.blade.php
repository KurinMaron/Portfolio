<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>オタマップ　聖地詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script src="{{ asset('/js/result.js') }}" defer></script>
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        <div class="back">[<a href="/">back</a>]</div>
        
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        
        <div>
            @if($post->is_liked_by_auth_user())
            <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">行きたい</a>
            @else
            <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">行きたい</a>
            @endif
        </div>
        <p>行きたい総数{{ $post->likes->count() }}</p>
        
         <h1 class='spot'>
             聖地 <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
        </h1>
        
        <h3 class="address">聖地住所
            {{ $post->address }}
        </h3>
               
        <h1 class="title">作品名
            {{ $post->title }}
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h4>聖地詳細</h4>
                <p>{{ $post->body }}</p>  
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            </div>
        </div>
        
        
    
        @if ($post->image_path)
        <img src="{{ $post->image_path }}">
        @endif
        
        
        {{--google map--}}
        <div id="map" style="height:500px">
        </div>
        
        <script>const point = @json($post->address)</script>
        <script type="application/javascript" src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.googlemap.key") }}&callback=initMap" async defer>

        <div class="back">[<a href="/">back</a>]</div>
       
        
        @endsection
    </body>
</html>
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
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        
         <h1 class='spot'>
             聖地 <a href="/posts/{{ $post->id }}">{{ $post->spot }}</a>
        </h1>
        
        <h3 class="address">
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
        
        //google map
        <div id="map" style="height:500px">
        </div>
        
        <script type="application/javascript" src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBgu_4DZLv1VuWR6KkSDbJd0sIGLeCEXgo&callback=initMap" async defer>

        
       
        
        @endsection
    </body>
</html>
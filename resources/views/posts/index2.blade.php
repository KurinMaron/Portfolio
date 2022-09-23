<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　検索一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/index.css">
        <link rel="icon" type="image/x-icon" href="public/img/favicon.ico" />
        <script src="bootstrap-4.3.1-dist/js/Bootstrap.min.js"></script>
        <script src="bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https:/stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div class="container-fluid">
            @extends('layouts.app')　
            @section('content')
            
                <div class="form_group">
                    <form method="GET" action="/" class="text-center">
                        @csrf
                        <div style="height: 100px;">
                            <input  type="text" class="form-control w-75 h-75" placeholder="住所" name="search" value="@if (isset($search)) {{ $search }} @endif"/>
                            <button type="submit" class="btn btn-success">検索</button>
                        </div>
                    </form>
                </div>
              
        
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
        
                <div class="ranks row">
                    <div class="col-6">
                        
                    </div>
                    <h2>ランキング </h2>
                    @foreach($ranks as $rank)
            
                        <div class="posts">
                             
                            <h3 class="spot">聖地{{ $loop->iteration }}位
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
            
        </div>
    </body>
</html>
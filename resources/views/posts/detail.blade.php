<!DOCTYPE html>
<html lang={{ str_replace("_", "-", app()->getLocale()) }}>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>オタマップ　Spot詳細</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/app.css') }}"  rel="stylesheet">
        <link href="{{ asset('/css/detail.css') }}"  rel="stylesheet">
        <script src="{{ asset('/js/result.js') }}"></script>
    </head>
    <body id="page-top">
        @extends('layouts.app')　
        @section('content')
        <!-- ハンバーガーアイコン-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="/mypage">マイページ</a></li>
                <li class="sidebar-nav-item"><a href="/">TOP</a></li>
                <li class="sidebar-nav-item"><a href="/search">検索</a></li>
                <li class="sidebar-nav-item"><a href="/posts/create">投稿</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h3 class="mb-5"><em>オタク活動支援サイト</em></h3>
                <h1 class="mb-1">オタマップ</h1>
               {{-- <a class="btn btn-primary btn-xl" href="#about">オタマップとは...</a> --}}
            </div>
        </header>
        
        <div class="back">[<a href="/">back</a>]</div>
        
        <div>
            @if($post->is_liked_by_auth_user())
            <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="btn btn-success btn-sm">行きたい</a>
            @else
            <a href="{{ route('post.like', ['id' => $post->id]) }}" class="btn btn-secondary btn-sm">行きたい</a>
            @endif
        </div>
        <p>行きたい総数{{ $post->likes->count() }}</p>
        
         <h1 class="spot">
             {{ $post->spot }}</a>
        </h1>
        
        <h3 class="address">住所
            {{ $post->address }}
        </h3>
               
        <h1 class="title">作品名
            <a href="/shows/{{ $post->title->id}}">{{ $post->title->name }}</a>
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h4>詳細</h4>
                <p>{{ $post->body }}</p>  
                {{--<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>--}}
            </div>
        </div>
        
        
    
        @if ($post->image_path)
        <img src="{{ $post->image_path }}">
        @endif
        
        
        {{--google map--}}
        <div id="map" style="height:500px">
        </div>
        
        <script>const point = @json($post->address)</script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config("services.googlemap.key") }}&callback=initMap" async defer>
        </script>
        
        
       
        
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                <p class="text-muted small mb-0">Copyright &copy; Your Website 2022</p>
            </div>
            
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        @endsection
    </body>
</html>

<!DOCTYPE html>
<html lang={{ str_replace("_", "-", app()->getLocale()) }}>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>オタマップ　マイページ</title>
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
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/scripts.js') }}"></script>
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
            </div>
        </header>
        
        <h1><?php $user = Auth::user(); ?>{{ $user->name }}</h1>
        
        <div class='posts'>
            
            <h2>投稿一覧</h2>
            <div class="container">  
        <div class="posts">
            @foreach($posts as $post)
            <div class="col-8 my-4">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img class="img-fluid" src="">
                        </div>
                        <div class="col-8">
                            <div class="post card-body">
                                <h5 class="spot card-title">スポット<a href="/posts/{{ $post->id }}">{{ $post->spot }}</a></h5>
                                <h6 class="title card-text">作品名<a href="/shows/{{ $post->title->id }}">{{ $post->title->name }}</a></h6>
                                <p class="card-text">行きたい総数{{ $post->likes->count() }}</p>
                                <p class="card-text"><small class="text-muted">投稿者 {{ $post->user->name }}</small></p>
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button> 
            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            @endforeach
        </div>
        </div> 
              
        <div class='paginate'>
            {{ $posts->appends(Request::only('search'))->links() }}
        </div>
            
            
           
            
            <h2>行きたい一覧</h2>
            @foreach($likes as $like)
                <h3 class="spot">聖地
                    <a href="/posts/{{ $like->id }}">{{ $like->spot }}</a>
                </h3>
                
                <h4 class="title">作品名
                    <a href="/shows/{{ $like->title->id }}">{{ $like->title->name }}</a>
                </h4>
                
                {{--<a href="/categories/{{ $like->category->id }}">{{ $like->category->name }}</a><br>--}}
                
            </div>
            
            @endforeach
        </div>
        
        
        
        <div class="back">[<a href="/">back</a>]</div>
        
        <div class='paginate'>
            {{ $posts->appends(Request::only('search'))->links() }}
        </div>
        
        
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
        
        @endsection
    </body>
</html>

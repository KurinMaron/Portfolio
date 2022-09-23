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
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/app.css">
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
        
        [<a href='/posts/create'>create</a>]<br>
        
        <div class="back">[<a href="/">back</a>]</div>
        
        <div class='paginate'>
            {{ $posts->appends(Request::only('search'))->links() }}
        </div>
        
        {{--
        <!-- オタマップについて-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                        <p class="lead mb-5">
                            This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at
                            <a href="https://unsplash.com/">Unsplash</a>
                            !
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">オタマップでできること</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- オタマップでできること-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">サービス</h3>
                    <h2 class="mb-5">オタマップでできること</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Responsive</strong></h4>
                        <p class="text-faded mb-0">Looks great on any screen size!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Redesigned</strong></h4>
                        <p class="text-faded mb-0">Freshly redesigned for Bootstrap 5.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>行きたい！</strong></h4>
                        <p class="text-faded mb-0">
                            行きたいと思ったスポットには
                            <i class="fas fa-heart"></i><br>
                            マイページであなたが登録した<br>
                            スポット一覧を確認できます
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Question</strong></h4>
                        <p class="text-faded mb-0">I mustache you a question...</p>
                    </div>
                </div>
            </div>
        </section>
        --}}
        
        {{--
        <div class="form_group">
                    <form method="GET" action="/" class="text-center">
                        @csrf
                        <div style="height: 100px;">
                            <input  type="text" class="form-control w-75 h-75" placeholder="住所" name="search" value="@if (isset($search)) {{ $search }} @endif"/>
                            <button type="submit" class="btn btn-success">検索</button>
                        </div>
                    </form>
                </div>
              
        
        
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
                --}}
        
        {{--
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Welcome to
                    <em>your</em>
                    next website!
                </h2>
                <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/theme/stylish-portfolio/">Download Now!</a>
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Recent Projects</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Stationary</div>
                                    <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-1.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Ice Cream</div>
                                    <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-2.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Strawberries</div>
                                    <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-3.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Workspace</div>
                                    <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-4.jpg" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">The buttons below are impossible to resist...</h2>
                <a class="btn btn-xl btn-light me-4" href="#!">Click Me!</a>
                <a class="btn btn-xl btn-dark" href="#!">Look at Me!</a>
            </div>
        </section>
        <!-- Map-->
        <div class="map" id="contact">
            <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
            <br />
            <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small>
        </div>
        --}}
        
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

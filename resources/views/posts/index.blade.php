<!DOCTYPE html>
<html lang={{ str_replace("_", "-", app()->getLocale()) }}>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>オタマップ　TOP</title>
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
                </ul>
            </nav>
            
            <!-- Header-->
            <header class="masthead d-flex align-items-center">
                <div class="container px-4 px-lg-5 text-center">
                    <h3 class="mb-5"><em>オタク活動支援サイト</em></h3>
                    <h1 class="mb-1">オタマップ</h1>
                </div>
            </header>
        
            <!-- オタマップについて-->
            <section class="content-section bg-light" id="about">
                <div class="container px-4 px-lg-5 text-center">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-lg-10">
                            <h2>オタマップはより快適なオタ活をするためのサイトです！</h2>
                            <p class="lead mb-5">そのためにはみなさんの協力が必要です！！<br>
                            投稿したい作品の詳細ページから情報共有お願いします！</p>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- オタマップでできること-->
            <section class="content-section bg-primary text-white text-center" id="services">
                <div class="container px-4 px-lg-5">
                    <div class="content-section-heading">
                        <h3 class="mb-0">~サービス~</h3>
                        <h2 class="mb-5">オタマップでできること</h2>
                    </div>
                    <div class="row gx-4 gx-lg-5">
                    
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                            <h4><strong>投稿</strong></h4>
                            <p class="text-faded mb-0">作品詳細ページから投稿可能！流行りの聖地巡礼に限らず、コラボカフェやイベント情報の投稿もOK！</p>
                        </div>
                    
                        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                            <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                            <h4><strong>行きたい！</strong></h4>
                            <p class="text-faded mb-0">行きたいと思ったスポットには<i class="fas fa-heart"></i>マイページであなたが登録したスポット一覧を確認できます</p>
                        </div>
                    
                        <div class="col-lg-3 col-md-6">
                            <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                            <h4><strong>作品掲示板</strong></h4>
                            <p class="text-faded mb-0">作品に対する熱い想いを作品詳細ページの掲示板に書き込み！</p>
                        </div>
                    
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                            <h4><strong>画面対応</strong></h4>
                            <p class="text-faded mb-0">どのスクリーンサイズにも対応！</p>
                        </div>
                    
                    </div>
                </div>
            </section>
        
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        @endsection
    </body>
</html>

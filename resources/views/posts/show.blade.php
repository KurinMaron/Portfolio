<!DOCTYPE html>
<html lang={{ str_replace("_", "-", app()->getLocale()) }}>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>オタマップ　作品詳細</title>
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
        
        
        <h1 class="title">作品名
            {{ $title->name }}
        </h1>
        
        <div class="content">
            <div class="content__post">
                <h4>作品詳細</h4>
                <p>{{ $title->body }}</p>  
               {{-- <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>--}}
            </div>
        </div>
        
        <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <ul class="list-group">
                @forelse ($messages as $message)
                    <li class="list-group-item">
                        <div class="py-3 w-100 d-flex">
                           {{-- <img src="{{ asset('storage/profile_image/' .$message->user->profile_image) }}" class="rounded-circle" width="50" height="50">--}}
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $message->user->name }}</p>
                                {{--<a href="{{ url('users/' .$message->user->id) }}" class="text-secondary">{{ $message->user->screen_name }}</a>--}}
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $message->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="py-3">
                            {!! nl2br(e($message->body)) !!}
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">
                        <p class="mb-0 text-secondary">コメントはまだありません。</p>
                    </li>
                @endforelse
                <li class="list-group-item">
                    <div class="py-3">
                        <form method="POST" action="{{ route('messages.store') }}">
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col-md-12 p-3 w-100 d-flex">
                                   {{--<img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">--}}
                                    <div class="ml-2 d-flex flex-column">
                                       {{-- <p class="mb-0">{{ $user->name }}</p>--}}
                                        {{--<a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>--}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="title_id" value="{{ $title->id }}">
                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="text" rows="4">{{ old('body') }}</textarea>

                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-right">
                                    <p class="mb-4 text-danger">140文字以内</p>
                                    <button type="submit" class="btn btn-primary">
                                        口コミを投稿
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
        
        <div class="footer">
            <a href="/">戻る</a>
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

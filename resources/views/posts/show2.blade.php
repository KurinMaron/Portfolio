<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>オタマップ　作品詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/show.css">
    </head>
    <body>
        @extends('layouts.app')　
        @section('content')
        
        <h1 class="title">作品名
            {{ $title->name }}
        </h1>
        
        <div class="rate-form">
            <input id="star5" type="radio" name="rate" value="5">
            <label for="star5">★</label>
            <input id="star4" type="radio" name="rate" value="4">
            <label for="star4">★</label>
            <input id="star3" type="radio" name="rate" value="3">
            <label for="star3">★</label>
            <input id="star2" type="radio" name="rate" value="2">
            <label for="star2">★</label>
            <input id="star1" type="radio" name="rate" value="1">
            <label for="star1">★</label>
        </div>
        
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
        @endsection
    </body>
</html>
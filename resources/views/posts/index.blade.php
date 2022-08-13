<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>オタマップ　検索一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <header><h1>オタマップ</h1></header>
        
        @csrf
        <form action="/" method="POST">
            <input id="serach_form" type="text" placeholder="作品名、地名"/>
        </form>
        <button type="submit" form="serach_form">検索</button><br>
        
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h3 class="title">
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
            @endforeach
        </div>
        
        [<a href='/posts/create'>create</a>]
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
    </body>
</html>


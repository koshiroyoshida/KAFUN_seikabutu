<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>kafunsyou</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>花粉症</h1>
        <a href='/posts/create'>投稿</a>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
            <p class='body'>
            <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
            </p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>

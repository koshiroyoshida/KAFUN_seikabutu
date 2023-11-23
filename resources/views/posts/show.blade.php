<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>kafunsyou</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <!-- ここから追加 -->
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url}}" alt="画像が読み込めません。"/>
            </div>
            @endif
            <!-- ここまで追加 -->
        </div>
        
    <h2>コメント</h2>
    @forelse ($post->comments as $comment)
        <div>
            <p>{{ $comment->user->name }}: {{ $comment->comment }}</p>
        </div>
    @empty
        <p>コメントはありません。</p>
    @endforelse

    <!-- コメントフォーム -->
    <form action="{{ route('posts.addComment', ['post' => $post]) }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="コメントを入力"></textarea>
        <button type="submit">コメントする</button>
    </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

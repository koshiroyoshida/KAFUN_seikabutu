<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Show Comment</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Show Comment</h1>

    <p>{{ $comment->body }}</p>

    <a href="{{ route('comments.edit', ['comment' => $comment]) }}">コメントを編集</a>

</body>
</html>
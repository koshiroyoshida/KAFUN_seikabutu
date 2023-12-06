<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Edit Comment</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Edit Comment</h1>

    <form action="{{ route('comments.update', ['comment' => $comment]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="body">
            <label for="comment_body">コメント</label>
            <textarea name="comment[body]" id="comment_body" placeholder="コメントを編集">{{ $comment->body }}</textarea>
        </div>

        <input type="submit" value="更新">

    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Create Comment</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Create Comment</h1>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="body">
            <label for="comment_body">コメント</label>
            <textarea name="comment[body]" id="comment_body" placeholder="コメントを入力"></textarea>
        </div>

        <input type="submit" value="コメントする">

    </form>
</body>
</html>
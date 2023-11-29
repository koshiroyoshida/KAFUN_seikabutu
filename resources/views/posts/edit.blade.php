<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Edit Post</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="body">
            <h2>花粉情報</h2>
            <textarea name="post[body]" placeholder="花粉情報を編集">{{ $post->body }}</textarea>
        </div>

        <div class="area">
            <h2>都道府県</h2>
            <select name="post[area_id]">
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ $area->id == $post->area_id ? 'selected' : '' }}>
                        {{ $area->area_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="更新">

        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </form>
</body>
</html>

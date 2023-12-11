<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>kafunsyou</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   <body>
    <h1>投稿</h1>

    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="body">
            <h2>花粉情報を共有しよう。</h2>
            <textarea name="post[body]" placeholder="花粉情報を共有しよう。"></textarea>
        </div>

        <div class="area">
            <h2>都道府県</h2>
            <select name="post[area_id]">
            @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
            @endforeach
            </select>
        </div>
        
        <!-- ここから追加 -->
            <div class="image">
                 <h3>画像</h3>
                <input type="file" name="image">
            </div>
        <!-- ここまで追加 -->

        <input type="submit" value="投稿">

        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </form>
</body>

</html>

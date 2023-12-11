<x-app-layout>

<form action="{{ route('search') }}" method="GET">
    <table>
    @csrf
    <tr><input type="text" name="keyword" value="{{ $keyword }}"></tr>
    <button type="submit">検索</button>
    <tr><td><select class="block mt-1 w-full" name="area_id">
        <option>-都道府県-</option>
          @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
          @endforeach
    </select></td></tr>
    </table>
</form>
<h1>検索結果</h1>

<table>
    @forelse ($posts as $post)
        <tr>
            <td>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->body }}</a>
            </td>
        </tr>
    @empty
        <tr>
            <td>投稿が見当たりません</td>
        </tr>
    @endforelse
</table>

    <div class="footer">
                <a href="/">戻る</a>
    </div>

</x-app-layout>
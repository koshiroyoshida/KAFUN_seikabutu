<x-app-layout>
    <h1>コメント一覧</h1>

    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->body }}</p>
            <form action="{{ route('comments.delete', ['comment' => $comment]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">コメント削除</button>
            </form>
        </div>
    @endforeach
    

    <div class='paginate'>
        {{ $comments->links() }}
    </div>
</x-app-layout>
    <x-app-layout>
    <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                
                <h2>投稿</h>
                <p>{{ $post->body }}</p>    
            </div>
            <p>{{ $post ->area->area_name}}</p>
         <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">投稿を編集</a>
        </div>
            
            <!-- ここから追加 -->
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url}}" class="w-[200px]" alt="画像が読み込めません。"/>
            </div>
            @endif
                <form action="{{ url("/posts/{$post->id}") }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">投稿を削除</button> 
            </form>        
            
    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
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
    
    @foreach ($post->comments as $comment)
    <div>
        <p>{{ $comment->user->name }}: {{ $comment->comment }}</p>
        <form action="{{ route('comments.delete', ['comment' => $comment]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">コメントを削除</button>
        </form>
    </div>
    @endforeach
    
            
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>
<x-app-layout>
    <h1>花粉症</h1>
    
    <a href="{{ url('/posts/create') }}">投稿</a>

    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            
            <p class='body'>
                <a href="{{ url("/posts/{$post->id}") }}">{{ $post->body }}</a>
            </p>
            
            <form action="{{ url("/posts/{$post->id}") }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">投稿を削除</button> 
            </form>
        </div>
        @endforeach
    </div>
    
    <div class='paginate'>
        {{ $posts->links() }}
    </div>

    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
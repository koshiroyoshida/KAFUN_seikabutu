<x-app-layout>
    <h1>花粉症</h1>
    
    <a href="{{ url('/posts/create') }}">投稿</a>

    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            
            <p class='body'>
                <a href="{{ url("/posts/{$post->id}") }}">{{ $post->body }}</a>
            </p>
            
            

        </div>
        @endforeach
    </div>
    
    
    <div class='paginate'>
        {{ $posts->links() }}
    </div>


</x-app-layout>
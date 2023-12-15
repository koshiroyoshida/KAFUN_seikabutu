<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-6">投稿一覧</h1>

                    @forelse ($posts as $post)
                        <div class="mb-4">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-blue-500 hover:underline">{{ $post->body }}</a>
                            <!-- その他の投稿情報の表示 -->
                        </div>
                    @empty
                        <p>投稿がありません。</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
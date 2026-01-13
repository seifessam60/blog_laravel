@extends('layout')
@section('title', 'All Posts')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">All Posts</h1>
        <p class="text-gray-600">Discover the latest articles and ideas</p>
    </div>

    @if ($posts->count() > 0)
         <div class="grid gap-6">
            @foreach($posts as $post)
                <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">
                        <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 transition">
                            {{ $post->title }}
                        </a>
                    </h2>
                    
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit($post->content, 200) }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            📅 {{ $post->published_at?->format('Y/m/d') ?? $post->created_at->format('Y/m/d') }}
                        </span>
                        <a href="{{ route('posts.show', $post) }}" 
                           class="text-blue-500 hover:text-blue-700 font-semibold transition">
                            Read more →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm p-12 text-center">
            <div class="text-6xl mb-4">📭</div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">No posts yet</h3>
            <p class="text-gray-600 mb-6">Start writing your first post now!</p>
            <a href="{{ route('posts.create') }}" 
               class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition">
                Create New Post
            </a>
        </div>
    @endif
@endsection
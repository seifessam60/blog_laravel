@extends('layout')

@section('title', $post->title)

@section('content')
    <!-- Back Button -->
    <a href="{{ route('posts.index') }}" 
       class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6 transition">
        ← Back to Posts
    </a>

    <!-- Post Card -->
    <article class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
        <!-- Post Header -->
        <header class="mb-8 pb-6 border-b border-gray-200">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center gap-4 text-gray-500 text-sm">
                <span class="flex items-center gap-2">
                    📅 {{ $post->published_at?->format('Y/m/d') ?? $post->created_at->format('Y/m/d') }}
                </span>
                <span class="flex items-center gap-2">
                    🕒 {{ $post->created_at->diffForHumans() }}
                </span>
            </div>
        </header>

        <!-- Post Content -->
        <div class="prose prose-lg max-w-none mb-8">
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                {{ $post->content }}
            </div>
        </div>

        <!-- Actions -->
        <footer class="pt-6 border-t border-gray-200 flex gap-3">
            <a href="{{ route('posts.edit', $post) }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2.5 rounded-lg transition font-semibold">
                ✏️ Edit Post
            </a>
            
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this post?')"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2.5 rounded-lg transition font-semibold">
                    🗑️ Delete Post
                </button>
            </form>
        </footer>
    </article>
@endsection
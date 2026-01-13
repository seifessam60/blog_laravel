@extends('layout')

@section('title', 'Edit Post')

@section('content')
    <!-- Back Button -->
    <a href="{{ route('posts.show', $post) }}" 
       class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6 transition">
        ← Back to Post
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">✏️ Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Title Field -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Post Title
                </label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $post->title) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                       placeholder="Enter the post title..."
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content Field -->
            <div>
                <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                    Post Content
                </label>
                <textarea name="content" 
                          id="content" 
                          rows="12"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                          placeholder="Write the post content here..."
                          required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold transition">
                    💾 Save Changes
                </button>
                <a href="{{ route('posts.show', $post) }}" 
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-lg font-semibold transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

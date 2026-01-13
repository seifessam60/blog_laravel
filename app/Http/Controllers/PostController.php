<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view("posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $post = auth()->user()->posts()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
            'published_at' => now()
        ]);

        return redirect()->route('posts.store', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        return view("posts.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        return view("posts.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $validated['title'],
            'slug'=> Str::slug($validated['title']),
            'content' => $validated['content']
        ]);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}

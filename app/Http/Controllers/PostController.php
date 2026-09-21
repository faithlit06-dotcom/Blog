<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    //
    public function index()
{
    // Fetches posts ordered in descending order (newest first)
    $posts = Post::where('user_id', auth()->id())->latest()->get();
    return view('posts.index', compact('posts'));
}

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->id(); // Assign the authenticated user's ID to the post

        $post = Post::create($validatedData);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}

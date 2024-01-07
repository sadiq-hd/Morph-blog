<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post; // Import the Post model

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Retrieve all posts
        return view('posts', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        // Create a new post
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Assuming there's a logged-in user
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        // Update the post
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

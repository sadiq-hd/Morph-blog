<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Comment; // تحديد مسار الفئة Comment

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments; // Assuming Post model has a relationship with comments

        return view('posts.show', compact('post', 'comments'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

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

        // Check if the logged-in user is the owner of the post
        if ($post->user_id === Auth::id()) {
            return view('posts.edit', compact('post'));
        }

        return redirect()->route('posts.index')->with('error', 'You do not have permission to edit this post.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::findOrFail($id);

        // Check if the logged-in user is the owner of the post
        if ($post->user_id === Auth::id()) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();

            return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
        }

        return redirect()->route('posts.index')->with('error', 'You do not have permission to update this post.');
    }

    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);

        // Check if the logged-in user is the owner of the comment or is admin
        if (Auth::user()->isAdmin() || $comment->user_id === Auth::id()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully!');
        }

        return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
    }

    public function userPosts()
    {
        $user = Auth::user();

        if ($user) {
            $posts = $user->posts;

            if ($posts->isNotEmpty()) {
                return view('my-post', compact('posts'));
            } else {
                return view('my-post')->with('message', 'No posts found for this user.');
            }
        } else {
            return redirect()->route('login.form')->with('error', 'Please login to view your posts');
        }
    }

    public function showAllPosts()
    {
        $adminPosts = Post::all(); // Retrieve all posts
        $comments = DB::table('comments')->whereIn('post_id', $adminPosts->pluck('id'))->get();

        return view('admin.posts', compact('adminPosts', 'comments'));
    }

    public function editPosts()
    {
        // استرجاع جميع المنشورات وتمريرها إلى صفحة التحرير
        $posts = Post::all();
        return view('edit-posts', compact('posts'));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            // يمكنك إجراء أي عمليات إضافية هنا بعد حذف التعليق
        }
        // ربما تود توجيه المستخدم إلى صفحة معينة بعد الحذف
        return redirect()->back()->with('success', 'تم حذف التعليق بنجاح');
    }
}

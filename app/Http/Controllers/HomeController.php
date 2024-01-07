<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // يمكنك هنا إعادة العرض (View) الخاص بصفحة الرئيسية
        $posts = Post::where('user_id', 3)->get();

        return view('home', compact('posts'));
    }
}

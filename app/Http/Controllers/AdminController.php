<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Post; // أو أي نموذج آخر تحتاجه

class AdminController extends Controller
{
    public function dashboard()
    {
        $user_id = Auth::id(); // استرجاع معرف المستخدم الحالي

        // جلب المنشورات التي أنشأها المستخدم الحالي فقط
        $posts = Post::where('user_id', $user_id)->get();
        
        return view('admin-dashboard', compact('posts'));
    }
    // دالة editPosts لعرض صفحة تعديل المنشورات
    public function editPosts()
    {
        $posts = Post::all();
        return view('edit-posts', compact('posts'));    } 
}

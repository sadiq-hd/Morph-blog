<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // استدعاء نموذج تسجيل الدخول
    }
    public function showRegistrationForm()
    {
        return view('register'); // استدعاء نموذج تسجيل الدخول
    }

    // يمكنك أن تواصل الكتابة لبقية الأكواد هنا مثل دالة الدخول (login function) والتحقق من البيانات والمزيد
}

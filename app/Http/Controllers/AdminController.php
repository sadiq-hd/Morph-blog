<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // يمكنك تنفيذ السلوك الخاص بصفحة اللوحة الرئيسية للمسؤول هنا
        return view('admin-dashboard');
    }
}

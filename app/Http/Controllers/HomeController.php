<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // يمكنك هنا إعادة العرض (View) الخاص بصفحة الرئيسية
        return view('home');
    }
}

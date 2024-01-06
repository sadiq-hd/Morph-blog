<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // استدعاء صفحة التسجيل
    }

    public function createNewUser(Request $request)
    {
        try {
            // التحقق من صحة البيانات المدخلة
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed', // يتطابق مع الحقل 'password_confirmation'
            ]);

            // إنشاء حساب مستخدم جديد
            $userData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), // تشفير كلمة المرور
            ];

            $user = User::create($userData); // إنشاء المستخدم

            return redirect('/login')->with('success', 'تم إنشاء المستخدم بنجاح!'); // إعادة التوجيه بعد إنشاء الحساب
        } catch (\Exception $e) {
            // في حالة وجود أي خطأ، يتم طباعته لتحليله
            dd($e->getMessage());
            // أو يمكنك استخدام return back()->withInput()->with('error', $e->getMessage());
        }
    }
}

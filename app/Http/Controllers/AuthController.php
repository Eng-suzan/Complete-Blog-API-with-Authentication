<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Rules\StrongPassword;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
            'name'     => ['required', 'string', 'min:6', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', new StrongPassword],
            'avatar'   => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

            // معالجة رفع الصورة (File Upload)
            if ($request->hasFile('avatar')) {
                // تخزين الصورة في مجلد storage/app/public/avatars
                $path = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $path;
            }

            // تشفير كلمة المرور وحفظ المستخدم
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'تم التسجيل بنجاح!');

        } catch (Exception $e) {
            //dd($e->getMessage());
            // Error Handling في حال حدوث أي خطأ غير متوقع أثناء الحفظ
         return back()->withInput()->withErrors(['error' => 'حدث خطأ غير متوقع، يرجى المحاولة لاحقاً.']);
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Error Handling لفشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'بيانات الاعتماد المدخلة غير متطابقة مع سجلاتنا.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Rules\StrongPassword;
use Illuminate\View\View;

//use App\Events\UserRegistered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
   
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255',"min:6"],
            'email' => ['required', 'string','lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', new StrongPassword],
            'avatar'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        );
        $avatarPath = null;
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar'   => $avatarPath
        ]);
//event(new UserRegistered($user));
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.home')) ;
    }
}
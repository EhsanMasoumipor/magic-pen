<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'password' => ['required', 'min:4']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:' . User::class],
        ]);

        if (!$this->attemtLogin($request)) {
            session()->regenerate();
            return back();
        }
        return redirect()->intended();
    }

    private function attemtLogin(Request $request)
    {
        return Auth::attempt($request->only('email', 'password'));
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect(RouteServiceProvider::HOME);
    }
}

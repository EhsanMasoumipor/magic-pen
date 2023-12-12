<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:' . User::class],
            'password' => ['required', 'min:4']
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $validated = $validator->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::dashboard)->with('toast_success', 'Registeration was Successfully');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:' . User::class],
        ]);

        if (!$this->attemtLogin($request)) {
            session()->regenerate();
            toast('Login failed', 'error');
            return back();
        }
        return redirect()->intended()->with('toast_success', 'You logged in successfully');
    }

    private function attemtLogin(Request $request)
    {
        return Auth::attempt($request->only('email', 'password'));
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect(RouteServiceProvider::HOME)->with('toast_success', 'You logged out');
    }
}

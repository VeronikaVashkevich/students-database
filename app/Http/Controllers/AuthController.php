<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function signUp(RegisterRequest $request) {
        User::query()->create(array_merge(
            $request->validated(), 
            ['password' => Hash::make($request->password)]
        ));

        return redirect('/login');
    }

    public function signIn(LoginRequest $request) {
        $validated = $request->validated();
        if (Auth::attempt([
            'login' => $validated['login'],
            'password' => $validated['password']
        ])) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['login' => Lang::get('auth.failed')]);
    }
}

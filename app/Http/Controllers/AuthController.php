<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return redirect(route('posts.index'));
    }

    public function loginForm()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $isLogin = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

        if ($isLogin) {
            return redirect(route('posts.index'));
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }

    public function dologin(LoginRequest $request){
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('blog.index'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'The email address you entered is invalid.',
            'password' => 'The password you entered is invalid.',
        ])->onlyInput('email', 'password');

    }
}

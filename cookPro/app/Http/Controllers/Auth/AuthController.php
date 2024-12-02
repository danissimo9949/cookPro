<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.auth');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'Успішний вхід в систему!');
        }

        return redirect()->back()->withErrors(['email' => 'Неправильна пошта або пароль'])->withInput();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('Login.Login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/home');
        } else {
            return redirect('/index');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/index');
    }
}

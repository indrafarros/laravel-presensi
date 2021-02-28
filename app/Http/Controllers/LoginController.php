<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('Login.Login');
    }

    public function login(Request $request)
    {

        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect('/home');
        } else {
            Session::flash('message', 'Email atau password salah');
            return redirect('/index');
        }
    }

    public function viewRegister()
    {
        return view('Login.Registrasi');
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'role' => 'Admin',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('/index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/index');
    }
}

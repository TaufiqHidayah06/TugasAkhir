<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login_perpus()
    {
        if (Auth::check()) 
        {
            return redirect('/');
        }
        else
        {
            return view('login/login');
        }
        
    }
    public function actionlogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' =>  ['required'],
        ]);

        if (Auth::Attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-admin');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Wrong !');
        return redirect('/login-perpus');
        
    }

    public function actionlogout()
    {
        
    }
}
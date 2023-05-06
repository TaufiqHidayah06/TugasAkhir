<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register()
    {
        return view('login/register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'nip' => 'required',
        ]);

        $user = new User([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }
    public function login()
    {
        return view('login/login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard-admin');
        }

        return redirect()->intended('login-perpus');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
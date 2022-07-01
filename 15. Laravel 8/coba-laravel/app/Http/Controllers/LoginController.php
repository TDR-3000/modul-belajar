<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            "title" => "Login",
            "active" => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        // Jika percobaan login yang dilakukan itu berhasi maka pindahkan ke halaman
        if (Auth::attempt($credentials)) {
            // generate lagi sessionnya
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        };

        // Jika gagal kemabalikan lagi ke halaman login dengan pesan error
        return back()->with("errorLogin", "Login faild!");
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

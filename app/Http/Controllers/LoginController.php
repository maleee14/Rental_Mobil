<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Tidak Boleh Kosong !!',
            'email.email' => 'Email Tidak Valid !!',
            'password.required' => 'Password Tidak Boleh Kosong !!',
        ]);

        if (FacadesAuth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::route('home');
        }

        return back()->withErrors([
            'email' => 'Autentikasi Gagal !!'
        ])->onlyInput('email');
    }

    public function keluar(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('home');
    }
}

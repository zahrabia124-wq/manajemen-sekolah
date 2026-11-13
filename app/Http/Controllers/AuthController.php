<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
       return view('login');
    }

    public function authenticate(Request $request){
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        // Proses Autentikasi
        if (Auth::attempt($request->only(['email', 'password']), $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'Guru') {
                return redirect()->route('guru.table')->with([
                    'success' => 'Login berhasil, selamat datang ' . Auth::user()->name
                ]);
            } elseif (Auth::user()->role === 'Siswa') {
                return redirect()->route('siswa.table')->with([
                    'success' => 'Login berhasil, selamat datang ' . Auth::user()->name
                ]);
            }

            return redirect()->route('guru.table');
        }

        // Jika kombinasi email & password tidak cocok
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }
}

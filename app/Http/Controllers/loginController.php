<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function masuk(Request $request){
        if (Auth::guard('petugasG')->attempt($request->only('username', 'password'))) {
            return redirect('/admin');
        } 
        
        elseif(Auth::guard('web')->attempt($request->only('username', 'password'))) {
            return redirect('/');
        }


        return redirect('/login');
    }


    public function register(){
        return view('register');
    }

    // Register
    public function buatAkun(Request $request){
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }
}

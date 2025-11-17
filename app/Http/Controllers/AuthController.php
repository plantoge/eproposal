<?php

namespace App\Http\Controllers;

// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {   
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        
        return view('layout.dashboard.v2.auth.loginv2');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/dashboard');
        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Data yang dimasukkan salah!');
            return redirect('/');
        }
        
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/');
    }

    public function register()
    {
        return view('layout.dashboard.v2.auth.register');
    }

    public function store(Request $request)
    {
        $user = New \App\User;
        // $user->tanggal_input = date('Y-m-d'); 
        $user->name = $request->name; 
        $user->role = '-'; 
        $user->username = $request->username; 
        $user->password = bcrypt($request->password); 
        $user->email = $request->email;
        $user->save(); 

        // $user = \App\Benpen::create($request->all());
        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Register Berhasil');
        return redirect('/');
    }
}

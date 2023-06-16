<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('master.login.register');
    }

  
    public function store(Request $request)
    {
        User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
      
        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }
}
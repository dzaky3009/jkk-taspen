<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class RegisterController extends Controller
{
    public function index()
    {
        return view('buat_akun.index'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:255|min:3',
            'role' => 'required|max:255',
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
    
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
    
}

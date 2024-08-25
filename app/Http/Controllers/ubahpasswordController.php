<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index()
    {
        // Mengambil pengguna yang sedang login
        $user = auth()->user();
    
        // Mengirimkan pengguna ke view
        return view('ubah-password.index', ['user' => $user]); 
    }

    public function upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required', 
        ]);


        $user = auth()->user();

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'BERHASIL MENGGANTI PASSWORD !!!');
    }
}

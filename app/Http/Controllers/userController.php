<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user.index', ['user' => $user]);
    }

    public function detail($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'User tidak ditemukan.');
        }

        return view('user.detail', ['user' => $user]);
    }

    public function updatePassword(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Mencari user berdasarkan ID
        $user = User::find($id);
    
        if (!$user) {
            abort(404, 'User tidak ditemukan.');
        }
    
        // Update password
        $user->password = Hash::make($request->input('password'));
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('user_detail', $user->id)->with('success', 'Password berhasil diupdate.');
    }
    
}

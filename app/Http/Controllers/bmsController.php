<?php

namespace App\Http\Controllers;
use App\Models\Claim;
use Illuminate\Http\Request;

class bmsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            // Jika role adalah admin, ambil semua data claim dengan status bukan draft
            $proses = Claim::where('status', '=', 'belum memenuhi syarat')->get();
        } else {
            // Jika role adalah user, ambil hanya data claim yang user_id-nya sama dengan ID user yang sedang auth dan status bukan draft
            $proses = Claim::where('status', '=', 'belum memenuhi syarat')
                          ->where('id_user', $user->id)
                          ->get();
        }
    
        return view('proses.index', ['proses' => $proses]);
    }
}

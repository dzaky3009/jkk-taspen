<?php

namespace App\Http\Controllers;
use App\Models\Claim;
use Illuminate\Http\Request;

class mscontroller extends Controller
{
    public function index()
    {
       
        $user = auth()->user();
        $judul = ' Memenuhi Syarat';
        if ($user->role === 'admin') {
            $proses = Claim::where('status', '=', 'memenuhi syarat')->get();
        } else {
            $proses = Claim::where('status', '=', 'memenuhi syarat')
                          ->where('id_user', $user->id)
                          ->get();
        }
    
  
        return view('proses.index', ['proses' => $proses, 'judul' => $judul]);

    }
}

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
            
            $proses = Claim::where('status', '=', 'belum memenuhi syarat')->get();
        } else {
            
            $proses = Claim::where('status', '=', 'belum memenuhi syarat')
                          ->where('id_user', $user->id)
                          ->get();
        }
    
        return view('proses.index', ['proses' => $proses]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Claim;
use Illuminate\Http\Request;

class mscontroller extends Controller
{
    public function index()
    {
        $proses = Claim::where('status', '=', 'memenuhi syarat')->get();
        return view('proses.index', ['proses' => $proses]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $claim = Claim::get();
        return view('claim.index', ['claim' => $claim]);
    }
}

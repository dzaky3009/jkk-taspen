<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        $pelaporan = Pelaporan::get();
        return view('pelaporan.index', ['pelaporan' => $pelaporan]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'no_hp' => 'required',
            'diagnosa' => 'required',
            'kronologi' => 'required',
        ]);

        $pelaporan = new Pelaporan();
        $pelaporan->nip = $request->input('nip');
        $pelaporan->nama = $request->input('nama');
        $pelaporan->instansi = $request->input('instansi');
        $pelaporan->no_hp = $request->input('no_hp');
        $pelaporan->diagnosa = $request->input('diagnosa');
        $pelaporan->kronologi = $request->input('kronologi');

        // $pelaporan->user_id = auth()->user()->id;
        $pelaporan->save();

        return redirect()->back();
    }
}

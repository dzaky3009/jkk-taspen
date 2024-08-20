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
        ],[
            'nip.required'=>'NIP tidak boleh kosong',
            'nama.required'=>'Nama tidak boleh kosong',
            'instansi.required'=>'Instansi tidak boleh kosong',
            'no_hp.required'=>'NO HP tidak boleh kosong',
            'diagnosa.required'=>'Diagnosa tidak boleh kosong',
            'kronologi.required'=>'Kronologi tidak boleh kosong',
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

        return redirect()->back()->with('success', 'Laporan Berhasil Ditambahkan');
    }
}

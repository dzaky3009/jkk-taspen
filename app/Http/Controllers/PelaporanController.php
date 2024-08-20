<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            $pelaporan = Pelaporan::all();
        } else {
            $pelaporan = Pelaporan::where('id_user', $user->id)->get();
        }
    
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
        'surat_jaminan_file' => 'nullable|file|mimes:pdf,jpeg,png',
    ]);

    // Jika ID ada, cari data yang akan diupdate, jika tidak buat baru
    $pelaporan = $request->id ? Pelaporan::find($request->id) : new Pelaporan();

    // Set field yang harus diupdate
    $pelaporan->nip = $request->input('nip');
    $pelaporan->nama = $request->input('nama');
    $pelaporan->instansi = $request->input('instansi');
    $pelaporan->no_hp = $request->input('no_hp');
    $pelaporan->diagnosa = $request->input('diagnosa');
    $pelaporan->kronologi = $request->input('kronologi');

    // Jangan ubah id_user jika data sudah ada
    if (!$request->id) {
        $pelaporan->id_user = auth()->id();
    }

    // Jika ada file yang diupload, encode dan simpan
    if ($request->hasFile('surat_jaminan_file')) {
        $pelaporan->surat_jaminan = base64_encode(file_get_contents($request->file('surat_jaminan_file')->path()));
    }

    $pelaporan->save();

    return redirect()->back()->with('success', 'Laporan Berhasil Ditambahkan');
}

    public function download($id, $fileType)
    {
        $pelaporan = Pelaporan::find($id);
        
        if (!$pelaporan) {
            return abort(404);
        }
        
        $fileContent = $pelaporan->{$fileType}; // Ambil konten file base64
        
        if (!$fileContent) {
            return abort(404);
        }
        
        $fileContent = base64_decode($fileContent);
        $fileName = $this->getFileName($fileType);
        $fileExtension = $this->getFileExtension($fileType);
        
        return response($fileContent, 200)
            ->header('Content-Type', 'application/pdf') // Sesuaikan Content-Type jika bukan PDF
            ->header('Content-Disposition', "inline; filename=\"$fileName\"")
            ->header('Content-Transfer-Encoding', 'binary');
    }
    private function getFileName($fileType)
{
    $fileNames = [
        'pelaporan' => 'pelaporan.pdf',
        
    ];
    
    return $fileNames[$fileType] ?? 'file.pdf';
}

private function getFileExtension($fileType)
{
    return 'pdf'; // Sesuaikan jika perlu
}

}

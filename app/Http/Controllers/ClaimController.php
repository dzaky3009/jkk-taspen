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

    public function upload(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'no_hp' => 'required',
            'diagnosa' => 'required',
            'tgl_kejadian' => 'required',
            'status' => 'required',
            // Validasi file jika ada, tidak diwajibkan
            'fpp' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'kwitansi' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'taspen_3' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'rincian_tagihan' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'resume_medis' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'pemeriksaan_labor' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'bacaan_pemeriksaan_radiologi' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'salinan_laporan_operasi' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'surat_jaminan_jasa_raharja' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'surat_keterangan_platform_jasa_raharja' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            'dokumen_pendukung_lainnya' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->input('claim_id')) {
            // Jika ada claim_id, maka update data yang ada
            $claim = Claim::find($request->input('claim_id'));
        } else {
            // Jika tidak ada claim_id, maka buat data baru
            $claim = new Claim();
        }

        $claim->nip = $request->input('nip');
        $claim->nama = $request->input('nama');
        $claim->instansi = $request->input('instansi');
        $claim->no_hp = $request->input('no_hp');
        $claim->diagnosa = $request->input('diagnosa');
        $claim->tgl_kejadian = $request->input('tgl_kejadian');
        $claim->status = $request->input('status');

        // Simpan file yang diupload jika ada
        $files = ['fpp', 'kwitansi', 'taspen_3', 'rincian_tagihan', 'resume_medis', 'pemeriksaan_labor', 'bacaan_pemeriksaan_radiologi', 'salinan_laporan_operasi', 'surat_jaminan_jasa_raharja', 'surat_keterangan_platform_jasa_raharja', 'dokumen_pendukung_lainnya'];

        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $uploadedFile = $request->file($file);
                $base64File = base64_encode(file_get_contents($uploadedFile->getRealPath()));
                $claim->{$file} = $base64File;
            } else {
                // Set field ke null jika tidak ada file yang diupload
                $claim->{$file} = $claim->{$file} ?? null;
            }
        }

        $claim->save();

        return redirect()->back();
    }
}

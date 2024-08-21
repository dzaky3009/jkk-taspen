<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Claim;
use Illuminate\Http\Request;

class prosesController extends Controller
{

    public function index()
    {
       
        $user = auth()->user();
        if ($user->role === 'admin') {
            $proses = Claim::where('status', '!=', 'draft')->get();
        } else {
            $proses = Claim::where('status', '!=', 'draft')
                          ->where('id_user', $user->id)
                          ->get();
        }
    
        return view('proses.index', ['proses' => $proses]);
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'no_hp' => 'required',
            'diagnosa' => 'required',
            'note' => 'nullable|string',
            'tgl_kejadian' => 'required',
            'status' => 'required',
            'fpp_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'kwitansi_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'taspen_3_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'rincian_tagihan_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'resume_medis_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'bacaan_pemeriksaan_radiologi_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'salinan_laporan_operasi_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'surat_jaminan_jasa_raharja_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'surat_keterangan_platform_jasa_raharja_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'dokumen_pendukung_lainnya_file' => 'nullable|file|mimes:pdf,jpeg,png',
            
    
            
            
        ]);

        $claim = $request->id ? Claim::find($request->id) : new Claim();
        $claim->nip = $request->nip;
        $claim->nama = $request->nama;
        $claim->instansi = $request->instansi;
        $claim->no_hp = $request->no_hp;
        $claim->diagnosa = $request->diagnosa;
        $claim->tgl_kejadian = $request->tgl_kejadian;
        $claim->status = $request->status;
        $claim->note = $request->note;

        // Handle file uploads
        if ($request->hasFile('fpp_file')) {
            $claim->fpp = base64_encode(file_get_contents($request->file('fpp_file')->path()));
        }
        if ($request->hasFile('kwitansi_file')) {
            $claim->kwitansi = base64_encode(file_get_contents($request->file('kwitansi_file')->path()));
        }
        if ($request->hasFile('taspen_3_file')) {
            $claim->taspen_3 = base64_encode(file_get_contents($request->file('taspen_3_file')->path()));
        }

        if ($request->hasFile('rincian_tagihan_file')) {
            $claim->rincian_tagihan = base64_encode(file_get_contents($request->file('rincian_tagihan_file')->path()));
        }
        if ($request->hasFile('resume_medis_file')) {
            $claim->resume_medis = base64_encode(file_get_contents($request->file('resume_medis_file')->path()));
        }
        if ($request->hasFile('bacaan_pemeriksaan_radiologi_file')) {
            $claim->bacaan_pemeriksaan_radiologi = base64_encode(file_get_contents($request->file('bacaan_pemeriksaan_radiologi_file')->path()));
        }
        if ($request->hasFile('salinan_laporan_operasi_file')) {
            $claim->salinan_laporan_operasi = base64_encode(file_get_contents($request->file('salinan_laporan_operasi_file')->path()));
        }
        if ($request->hasFile('surat_jaminan_jasa_raharja_file')) {
            $claim->surat_jaminan_jasa_raharja = base64_encode(file_get_contents($request->file('surat_jaminan_jasa_raharja_file')->path()));
        }
        if ($request->hasFile('surat_keterangan_platform_jasa_raharja_file')) {
            $claim->surat_keterangan_platform_jasa_raharja = base64_encode(file_get_contents($request->file('surat_keterangan_platform_jasa_raharja_file')->path()));
        }
        if ($request->hasFile('dokumen_pendukung_lainnya_file')) {
            $claim->dokumen_pendukung_lainnya = base64_encode(file_get_contents($request->file('dokumen_pendukung_lainnya_file')->path()));
        }

        

        $claim->save();
        if (auth()->user()->role === 'admin') {
            $users = User::where('role', 'user')->get();
            foreach ($users as $user) {
                if ($claim->status === 'memenuhi syarat') {
                    $user->notify(new \App\Notifications\ClaimApprovedNotification($claim));
                } elseif ($claim->status === 'belum memenuhi syarat') {
                    $user->notify(new \App\Notifications\ClaimRejectedNotification($claim));
                } else {
                    $user->notify(new \App\Notifications\ClaimReupload($claim));
                }
            }
        } else {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                $admin->notify(new \App\Notifications\ClaimReupload($claim));
            }
        }
       
        
        

        return redirect()->back()->with('success', 'Claim successfully saved.');
    }

}

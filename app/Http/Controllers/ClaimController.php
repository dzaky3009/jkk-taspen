<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Claim;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Notification;

class ClaimController extends Controller
{
    public function index()
    {
        
        $user = auth()->user();
    
        
        if ($user->role === 'admin') {
            
            $claim = Claim::all();
        } else {
            
            $claim = Claim::where('id_user', $user->id)->get();
        }
    
        return view('claim.index', ['claim' => $claim]);
    }
    
    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'no_hp' => 'required',
            'diagnosa' => 'required',
            'tgl_kejadian' => 'required',
            'status' => 'required',
            'note' => 'nullable|string',
            'surat_jaminan_file' => $request->id ? 'nullable|file|mimes:pdf,jpeg,png' : 'required|file|mimes:pdf,jpeg,png',
            'fpp_file' => $request->id ? 'nullable|file|mimes:pdf,jpeg,png' : 'required|file|mimes:pdf,jpeg,png',
            'kwitansi_file' => $request->id ? 'nullable|file|mimes:pdf,jpeg,png' : 'required|file|mimes:pdf,jpeg,png',
            'taspen_3_file' => $request->id ? 'nullable|file|mimes:pdf,jpeg,png' : 'required|file|mimes:pdf,jpeg,png',
            'rincian_tagihan_file' => $request->id ? 'nullable|file|mimes:pdf,jpeg,png' : 'required|file|mimes:pdf,jpeg,png',
            'resume_medis_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'bacaan_pemeriksaan_radiologi_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'salinan_laporan_operasi_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'surat_jaminan_jasa_raharja_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'surat_keterangan_platform_jasa_raharja_file' => 'nullable|file|mimes:pdf,jpeg,png',
            'dokumen_pendukung_lainnya_file' => 'nullable|file|mimes:pdf,jpeg,png',
        ],[
            'nip.required'=>'* NIP tidak boleh kosong',
            'nama.required'=>'* Nama tidak boleh kosong',
            'instansi.required'=>'* Instansi tidak boleh kosong',
            'no_hp.required'=>'* NO HP tidak boleh kosong',
            'diagnosa.required'=>'* Diagnosa tidak boleh kosong',
            'tgl_kejadian.required'=>'* Tanggal tidak boleh kosong', 
            'status.required'=>'* Status tidak boleh kosong', 
            'surat_jaminan_file.required'=>'* Status tidak boleh kosong', 
            'fpp_file.required'=>'* Status tidak boleh kosong', 
            'kwitansi_file.required'=>'* Status tidak boleh kosong', 
            'taspen_3_file.required'=>'* Status tidak boleh kosong', 
            'rincian_tagihan_file.required'=>'* Status tidak boleh kosong', 
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'LAPORAN GAGAL DITAMBAHKAN !!!');
        }
        $claim = $request->id ? Claim::find($request->id) : new Claim();
        $claim->nip = $request->nip;
        $claim->nama = $request->nama;
        $claim->instansi = $request->instansi;
        $claim->no_hp = $request->no_hp;
        $claim->diagnosa = $request->diagnosa;
        $claim->tgl_kejadian = $request->tgl_kejadian;
        $claim->status = $request->status;
        $claim->note = $request->note;

        if (!$request->id) {
            $claim->id_user = auth()->id();
        }

        
        if ($request->hasFile('surat_jaminan_file')) {
            $claim->surat_jaminan = base64_encode(file_get_contents($request->file('surat_jaminan_file')->path()));
        }
    
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


        
        try {
            $claim->save();

            if ($claim->status != 'draft') {
                $admins = User::where('role', 'admin')->get();
                Notification::send($admins, new \App\Notifications\ClaimNotification($claim));
    
                return redirect()->back()->with('success', 'CLAIM BERHASIL DITAMBAHKAN !!!');
            } else {

                return redirect()->back()->with('info', 'CLAIM BERHASIL DISIMPAN SEBAGAI DRAFT !!!');
            }
            // return redirect()->back()->with('success', 'CLAIM BERHASIL DITAMBAHKAN !!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'CLAIM GAGAL DITAMBAHKAN !!!');
        }

        // $claim->save();
        // if ($claim->status != 'draft') {
        //     $admins = User::where('role', 'admin')->get();
        //     Notification::send($admins, new \App\Notifications\ClaimNotification($claim));
        // }

        // return redirect()->back()->with('success', 'CLAIM BERHASIL DITAMBAHKAN !!!');
    }

    public function showFile($id, $type)
    {
        $claim = Claim::find($id);
        $fileContent = '';
        
        switch ($type) {
            case 'fpp':
                $fileContent = $claim->fpp;
                break;
            case 'kwitansi':
                $fileContent = $claim->kwitansi;
                break;
            case 'taspen_3':
                $fileContent = $claim->taspen_3;
                break;
            case 'rincian_tagihan':
                $fileContent = $claim->rincian_tagihan;
                break;
            case 'resume_medis':
                $fileContent = $claim->resume_medis;
                break;
            case 'bacaan_pemeriksaan_radiologi':
                $fileContent = $claim->bacaan_pemeriksaan_radiologi;
                break;
            case 'salinan_laporan_operasi':
                $fileContent = $claim->salinan_laporan_operasi;
                break;
            case 'surat_jaminan_jasa_raharja':
                $fileContent = $claim->surat_jaminan_jasa_raharja;
                break;
            case 'surat_keterangan_platform_jasa_raharja':
                $fileContent = $claim->surat_keterangan_platform_jasa_raharja;
                break;
            case 'dokumen_pendukung_lainnya':
                $fileContent = $claim->dokumen_pendukung_lainnya;
                break;
         
                
        }

        if ($fileContent) {
            $fileData = base64_decode($fileContent);
            return response($fileData)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="file.pdf"');
        }

        return abort(404);
    }
    public function download($id, $fileType)
{
    $claim = Claim::find($id);
    
    if (!$claim) {
        return abort(404);
    }
    
    $fileContent = $claim->{$fileType}; 
    
    if (!$fileContent) {
        return abort(404);
    }
    
    $fileContent = base64_decode($fileContent);
    $fileName = $this->getFileName($fileType);
    $fileExtension = $this->getFileExtension($fileType);
    
    return response($fileContent, 200)
        ->header('Content-Type', 'application/pdf') 
        ->header('Content-Disposition', "inline; filename=\"$fileName\"")
        ->header('Content-Transfer-Encoding', 'binary');
}

private function getFileName($fileType)
{
    $fileNames = [
        'fpp' => 'FPP.pdf',
        'kwitansi' => 'Kwitansi.pdf',
        'taspen_3' => 'Taspen 3.pdf',
        'rincian_tagihan' => 'rincian tagihan.pdf',
       'resume_medis_file' => 'resume_medis_file.pdf',
            'bacaan_pemeriksaan_radiologi' => 'bacaan_pemeriksaan_radiologi.pdf',
            'salinan_laporan_operasi' => 'salinan_laporan_operasi.pdf',
            'surat_jaminan_jasa_raharja' => 'salinan_laporan_operasi.pdf',
            'surat_keterangan_platform_jasa_raharja' => 'salinan_laporan_operasi.pdf',
            'dokumen_pendukung_lainnya' => 'salinan_laporan_operasi.pdf',
    ];
    
    return $fileNames[$fileType] ?? 'file.pdf';
}

private function getFileExtension($fileType)
{
    return 'pdf'; 
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claim';

    protected $fillable = [
        'nip',
        'nama',
        'instansi',
        'no_hp',
        'diagnosa',
        'tgl_kejadian',
        'status',
        'fpp',
        'kwitansi',
        'taspen_3',
        'rincian_tagihan',
        'resume_medis',
        'pemeriksaan_labor',
        'bacaan_pemeriksaan_radiologi',
        'salinan_laporan_operasi',
        'surat_jaminan_jasa_raharja',
        'surat_keterangan_platform_jasa_raharja',
        'dokumen_pendukung_lainnya'
    ];
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('claim', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('nama')->nullable();
            $table->string('instansi')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('diagnosa')->nullable();
            $table->date('tgl_kejadian')->nullable();
            $table->string('status')->nullable();
            $table->string('id_user')->nullable();
            $table->text('note')->nullable();
            // Kolom untuk file dalam format base64, menggunakan binary
            $table->longText('surat_jaminan')->charset('binary')->nullable();
            $table->longText('fpp')->charset('binary')->nullable();
            $table->longText('kwitansi')->charset('binary')->nullable();
            $table->longText('taspen_3')->charset('binary')->nullable();
            $table->longText('rincian_tagihan')->charset('binary')->nullable();
            $table->longText('resume_medis')->charset('binary')->nullable();
            $table->longText('pemeriksaan_labor')->charset('binary')->nullable();
            $table->longText('bacaan_pemeriksaan_radiologi')->charset('binary')->nullable();
            $table->longText('salinan_laporan_operasi')->charset('binary')->nullable();
            $table->longText('surat_jaminan_jasa_raharja')->charset('binary')->nullable();
            $table->longText('surat_keterangan_platform_jasa_raharja')->charset('binary')->nullable();
            $table->longText('dokumen_pendukung_lainnya')->charset('binary')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim');
    }
};

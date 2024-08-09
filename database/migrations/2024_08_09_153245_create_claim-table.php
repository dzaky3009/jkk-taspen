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
            
            // Kolom untuk file dalam format base64, menggunakan binary
            $table->binary('fpp')->nullable();
            $table->binary('kwitansi')->nullable();
            $table->binary('taspen_3')->nullable();
            $table->binary('rincian_tagihan')->nullable();
            $table->binary('resume_medis')->nullable();
            $table->binary('pemeriksaan_labor')->nullable();
            $table->binary('bacaan_pemeriksaan_radiologi')->nullable();
            $table->binary('salinan_laporan_operasi')->nullable();
            $table->binary('surat_jaminan_jasa_raharja')->nullable();
            $table->binary('surat_keterangan_platform_jasa_raharja')->nullable();
            $table->binary('dokumen_pendukung_lainnya')->nullable();

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

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
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id();
            $table->text('nip')->nullable();
            $table->string('nama')->nullable();
            $table->string('instansi')->nullable();
            $table->text('no_hp')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('kronologi')->nullable();
            $table->string('id_user')->nullable();
            $table->binary('surat_jaminan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};

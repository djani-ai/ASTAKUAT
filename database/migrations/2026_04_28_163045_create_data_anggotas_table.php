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
        Schema::create('data_anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama orang
            $table->string('t_lahir'); // Tempat lahir
            $table->date('tgl_lahir'); // Tanggal lahir
            $table->string('pekerjaan');
            $table->string('p_kaderisasi');
            $table->string('foto')->nullable(); // Path gambar
            $table->string('ktp')->nullable();
            $table->string('kta')->nullable();
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_anggotas');
    }
};

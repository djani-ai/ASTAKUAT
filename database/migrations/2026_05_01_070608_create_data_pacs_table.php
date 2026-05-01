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
        Schema::create('data_pacs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pac');
            $table->string('ketua');
            $table->string('ket_mds');
            $table->string('satkoryon');
            $table->string('sk_upload')->nullable();
            $table->string('ms_khidmad')->nullable();
            $table->date('sk_berakhir')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pacs');
    }
};

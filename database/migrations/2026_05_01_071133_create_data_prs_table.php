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
        Schema::create('data_prs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pr');
            $table->string('ketua')->nullable();
            $table->string('ket_mds')->nullable();
            $table->string('satkorkel')->nullable();
            $table->string('sk_upload')->nullable();
            $table->string('ms_khidmad')->nullable(); // Contoh: "2021-2024"
            $table->date('sk_berakhir')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->foreignId('pac_id')->nullable()->constrained('data_pacs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_prs');
    }
};

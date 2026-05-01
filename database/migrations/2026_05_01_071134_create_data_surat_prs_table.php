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
        Schema::create('data_surat_prs', function (Blueprint $table) {
            $table->id();
            $table->string('jns_surat');
            $table->string('no_surat');
            $table->string('upload');
            $table->foreignId('pr_id')->constrained('data_prs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_surat_prs');
    }
};

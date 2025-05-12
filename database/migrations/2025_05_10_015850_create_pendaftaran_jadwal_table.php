<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_jadwal', function (Blueprint $table) {
            $table->id();
            $table->char('id_pendaftaran', 13);
            $table->foreignId('id_jadwal')
                ->references('id')
                ->on('jadwal')
                ->onDelete('cascade');

            $table->foreign('id_pendaftaran')
                ->references('id')
                ->on('pendaftaran')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_jadwal');
    }
};

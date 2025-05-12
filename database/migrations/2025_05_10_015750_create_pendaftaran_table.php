<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->char('id', 13)->primary();
            $table->foreignId('id_siswa')->constrained('siswa')->onDelete('cascade');
            $table->boolean('daftar_ulang')->default(false);
            $table->enum('metode_pembayaran', ['Dana', 'Transfer', 'QRIS']);
            $table->string('bukti_pembayaran', 100)->nullable();
            $table->string('surat_cuti', 100)->nullable();
            $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->dateTime('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('info', ['Teman', 'Media Sosial', 'Brosur', 'Lainnya'])->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};

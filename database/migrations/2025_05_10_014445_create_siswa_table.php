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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 20);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('kelas', 15);
            $table->string('sekolah', 50);
            $table->string('nama_orang_tua', 50);
            $table->text('alamat');
            $table->string('no_wa', 15);
            $table->string('email', 50);
            $table->enum('status', ['Aktif', 'Non Aktif'])->default('Non Aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};

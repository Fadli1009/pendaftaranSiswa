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
        Schema::create('peserta_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_gelombang');
            $table->string('nama_lengkap', 100);
            $table->string('nik', 20);
            $table->string('kartu_keluarga', 20);
            $table->string('jenis_kelamin', 20);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('pendidikan_terakhir', 100);
            $table->string('nama_sekolah', 100);
            $table->string('kejuruan', 100);
            $table->string('nomorHp', 15);
            $table->string('email', 100)->unique();
            $table->string('aktivasi_saat_ini', 100);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('id_jurusan')->references('id')->on('jurusan');
            $table->foreign('id_gelombang')->references('id')->on('gelombang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};

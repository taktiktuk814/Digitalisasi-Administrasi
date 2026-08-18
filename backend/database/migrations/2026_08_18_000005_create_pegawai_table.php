<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30)->unique();
            $table->string('nama', 150);
            $table->string('gelar_depan', 30)->nullable();
            $table->string('gelar_belakang', 50)->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('pangkat_golongan', 50)->nullable();
            $table->string('jabatan', 150)->nullable();
            $table->string('unit_kerja', 150)->nullable();
            $table->string('status_kepegawaian', 50)->nullable();
            $table->string('nomor_hp', 30)->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 100)->unique();
            $table->string('nama_barang');
            $table->string('kib', 10)->nullable();
            $table->string('kategori')->nullable();
            $table->string('merk_type')->nullable();
            $table->string('nomor_register')->nullable();
            $table->unsignedSmallInteger('tahun_perolehan')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->unsignedInteger('jumlah')->default(1);
            $table->string('satuan', 30)->default('unit');
            $table->decimal('harga_perolehan', 18, 2)->default(0);
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->default('Baik');
            $table->string('lokasi')->nullable();
            $table->string('pengguna_barang')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('asets'); }
};

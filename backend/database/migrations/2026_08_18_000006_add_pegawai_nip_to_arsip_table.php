<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('arsip', function (Blueprint $table) {
            $table->string('pegawai_nip', 30)->nullable()->after('kategori')->index();
            $table->foreign('pegawai_nip')->references('nip')->on('pegawai')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('arsip', function (Blueprint $table) {
            $table->dropForeign(['pegawai_nip']);
            $table->dropColumn('pegawai_nip');
        });
    }
};

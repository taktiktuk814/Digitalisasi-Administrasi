<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(){Schema::create('surat_keluar',function(Blueprint $t){$t->id();$t->string('nomor')->index();$t->date('tanggal');$t->string('tujuan');$t->string('perihal');$t->text('keterangan')->nullable();$t->timestamps();});} public function down(){Schema::dropIfExists('surat_keluar');} };

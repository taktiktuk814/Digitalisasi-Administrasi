<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(){Schema::create('arsip',function(Blueprint $t){$t->id();$t->string('kode')->index();$t->string('nama');$t->string('kategori')->nullable();$t->date('tanggal')->nullable();$t->string('lokasi')->nullable();$t->string('file_path')->nullable();$t->text('keterangan')->nullable();$t->timestamps();});} public function down(){Schema::dropIfExists('arsip');} };

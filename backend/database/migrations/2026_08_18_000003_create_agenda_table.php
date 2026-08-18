<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(){Schema::create('agenda',function(Blueprint $t){$t->id();$t->date('tanggal');$t->time('waktu')->nullable();$t->string('kegiatan');$t->string('tempat')->nullable();$t->string('penanggung_jawab')->nullable();$t->text('keterangan')->nullable();$t->timestamps();});} public function down(){Schema::dropIfExists('agenda');} };

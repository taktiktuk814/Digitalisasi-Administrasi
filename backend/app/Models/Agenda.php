<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Agenda extends Model { protected $fillable=['tanggal','waktu','kegiatan','tempat','penanggung_jawab','keterangan']; protected $casts=['tanggal'=>'date']; }

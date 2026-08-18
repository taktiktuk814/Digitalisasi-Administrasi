<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Arsip extends Model { protected $table='arsip'; protected $fillable=['kode','nama','kategori','tanggal','lokasi','file_path','keterangan']; protected $casts=['tanggal'=>'date']; }

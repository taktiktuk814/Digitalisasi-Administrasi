<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SuratKeluar extends Model { protected $fillable=['nomor','tanggal','tujuan','perihal','keterangan']; protected $casts=['tanggal'=>'date']; }

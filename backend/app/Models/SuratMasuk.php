<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SuratMasuk extends Model { protected $fillable=['nomor','tanggal','asal','perihal','disposisi','status']; protected $casts=['tanggal'=>'date']; }

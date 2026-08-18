<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $fillable = [
        'kode_barang','nama_barang','kib','kategori','merk_type','nomor_register',
        'tahun_perolehan','sumber_dana','jumlah','satuan','harga_perolehan','kondisi',
        'lokasi','pengguna_barang','penanggung_jawab','nomor_dokumen','keterangan'
    ];

    protected $casts = ['harga_perolehan' => 'decimal:2'];
}

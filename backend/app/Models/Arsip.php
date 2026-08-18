<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arsip extends Model
{
    protected $table='arsip';
    protected $fillable=['kode','nama','kategori','pegawai_nip','tanggal','lokasi','file_path','keterangan'];
    protected $casts=['tanggal'=>'date'];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_nip', 'nip');
    }
}

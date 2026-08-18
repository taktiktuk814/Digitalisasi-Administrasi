<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip','nama','gelar_depan','gelar_belakang','jenis_kelamin','tempat_lahir',
        'tanggal_lahir','pangkat_golongan','jabatan','unit_kerja','status_kepegawaian',
        'nomor_hp','email','alamat','keterangan'
    ];

    protected $casts = ['tanggal_lahir' => 'date'];

    public function arsip(): HasMany
    {
        return $this->hasMany(Arsip::class, 'pegawai_nip', 'nip');
    }

    public function getNamaLengkapAttribute(): string
    {
        return trim(($this->gelar_depan ? $this->gelar_depan.' ' : '').$this->nama.($this->gelar_belakang ? ', '.$this->gelar_belakang : ''));
    }
}

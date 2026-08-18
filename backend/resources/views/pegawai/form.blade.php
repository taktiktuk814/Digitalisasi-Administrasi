@extends('layouts.app') @section('content')
<div class="card"><h2>{{ $pegawai->exists?'Edit':'Tambah' }} Pegawai</h2>
<form method="post" action="{{ $pegawai->exists?route('pegawai.update',$pegawai):route('pegawai.store') }}">@csrf @if($pegawai->exists) @method('PUT') @endif
<div class="grid">
<div><label>NIP</label><input name="nip" required maxlength="30" value="{{ old('nip',$pegawai->nip) }}"></div>
<div><label>Nama Lengkap</label><input name="nama" required value="{{ old('nama',$pegawai->nama) }}"></div>
<div><label>Gelar Depan</label><input name="gelar_depan" value="{{ old('gelar_depan',$pegawai->gelar_depan) }}"></div>
<div><label>Gelar Belakang</label><input name="gelar_belakang" value="{{ old('gelar_belakang',$pegawai->gelar_belakang) }}"></div>
<div><label>Jenis Kelamin</label><select name="jenis_kelamin"><option value="">-- Pilih --</option><option value="L" @selected(old('jenis_kelamin',$pegawai->jenis_kelamin)==='L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin',$pegawai->jenis_kelamin)==='P')>Perempuan</option></select></div>
<div><label>Tempat Lahir</label><input name="tempat_lahir" value="{{ old('tempat_lahir',$pegawai->tempat_lahir) }}"></div>
<div><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir',$pegawai->tanggal_lahir?->format('Y-m-d')) }}"></div>
<div><label>Pangkat/Golongan</label><input name="pangkat_golongan" value="{{ old('pangkat_golongan',$pegawai->pangkat_golongan) }}"></div>
<div><label>Jabatan</label><input name="jabatan" value="{{ old('jabatan',$pegawai->jabatan) }}"></div>
<div><label>Unit Kerja</label><input name="unit_kerja" value="{{ old('unit_kerja',$pegawai->unit_kerja) }}"></div>
<div><label>Status Kepegawaian</label><input name="status_kepegawaian" value="{{ old('status_kepegawaian',$pegawai->status_kepegawaian) }}"></div>
<div><label>Nomor HP</label><input name="nomor_hp" value="{{ old('nomor_hp',$pegawai->nomor_hp) }}"></div>
<div><label>Email</label><input type="email" name="email" value="{{ old('email',$pegawai->email) }}"></div>
</div><label>Alamat</label><textarea name="alamat">{{ old('alamat',$pegawai->alamat) }}</textarea><label>Keterangan</label><textarea name="keterangan">{{ old('keterangan',$pegawai->keterangan) }}</textarea><br><button class="btn primary">Simpan</button></form></div>@endsection

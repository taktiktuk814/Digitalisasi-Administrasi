@extends('layouts.app') @section('content')
<div class="card"><h2>{{ $item->exists?'Edit':'Tambah' }} Arsip Dokumen</h2>
<form method="post" enctype="multipart/form-data" action="{{ $item->exists?route('arsip.update',$item):route('arsip.store') }}">
@csrf @if($item->exists) @method('PUT') @endif
<div class="grid">
<div><label>Kode Arsip</label><input name="kode" required value="{{ old('kode',$item->kode) }}"></div>
<div><label>Nama Dokumen</label><input name="nama" required value="{{ old('nama',$item->nama) }}"></div>
<div><label>Kategori</label><input name="kategori" value="{{ old('kategori',$item->kategori) }}"></div>
<div><label>Pegawai / NIP</label><select name="pegawai_nip"><option value="">-- Arsip Umum --</option>@foreach($pegawai as $p)<option value="{{ $p->nip }}" @selected(old('pegawai_nip',$item->pegawai_nip)===$p->nip)>{{ $p->nip }} - {{ $p->nama_lengkap }}</option>@endforeach</select><small>Data NIP diambil dari menu Daftar Pegawai.</small></div>
<div><label>Tanggal</label><input type="date" name="tanggal" value="{{ old('tanggal',$item->tanggal?->format('Y-m-d')) }}"></div>
<div><label>Lokasi Penyimpanan</label><input name="lokasi" value="{{ old('lokasi',$item->lokasi) }}"></div>
<div><label>Upload Dokumen</label><input type="file" name="file"></div>
</div><label>Keterangan</label><textarea name="keterangan">{{ old('keterangan',$item->keterangan) }}</textarea><br><button class="btn primary">Simpan</button></form></div>@endsection

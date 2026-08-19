<?php
require __DIR__.'/config.php';
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
  $rows=$pdo->query("SELECT b.*, b.stok_awal + COALESCE(SUM(CASE WHEN m.jenis='masuk' THEN m.jumlah ELSE -m.jumlah END),0) stok FROM barang_habis_pakai b LEFT JOIN mutasi_barang m ON m.barang_id=b.id GROUP BY b.id ORDER BY b.nama")->fetchAll();
  ok($rows);
}
if($method==='POST'){
  $d=body(); foreach(['kode','nama','kategori','satuan','stokAwal','stokMinimum','lokasi'] as $k) if(!isset($d[$k])||$d[$k]==='') fail("Field $k wajib diisi");
  try{$s=$pdo->prepare('INSERT INTO barang_habis_pakai(kode,nama,kategori,satuan,stok_awal,stok_minimum,lokasi,keterangan) VALUES(?,?,?,?,?,?,?,?)');$s->execute([$d['kode'],$d['nama'],$d['kategori'],$d['satuan'],(int)$d['stokAwal'],(int)$d['stokMinimum'],$d['lokasi'],$d['keterangan']??null]);ok(['id'=>$pdo->lastInsertId()]);}catch(PDOException $e){fail($e->getCode()==='23000'?'Kode barang sudah digunakan.':$e->getMessage(),409);}
}
if($method==='DELETE'){$id=(int)($_GET['id']??0);if(!$id)fail('ID tidak valid');$s=$pdo->prepare('DELETE FROM barang_habis_pakai WHERE id=?');$s->execute([$id]);ok();}
fail('Metode tidak didukung',405);

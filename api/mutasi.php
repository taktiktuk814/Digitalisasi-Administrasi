<?php
require __DIR__.'/config.php';
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
 $rows=$pdo->query("SELECT m.*,b.kode,b.nama,b.satuan FROM mutasi_barang m JOIN barang_habis_pakai b ON b.id=m.barang_id ORDER BY m.tanggal DESC,m.id DESC")->fetchAll(); ok($rows);
}
if($method==='POST'){
 $d=body(); foreach(['barangId','jenis','tanggal','jumlah','dokumen','petugas'] as $k) if(!isset($d[$k])||$d[$k]==='') fail("Field $k wajib diisi");
 if(!in_array($d['jenis'],['masuk','keluar'],true)) fail('Jenis mutasi tidak valid');
 $jumlah=(int)$d['jumlah']; if($jumlah<1) fail('Jumlah harus lebih dari 0');
 try{$pdo->beginTransaction();$s=$pdo->prepare("SELECT b.stok_awal + COALESCE(SUM(CASE WHEN m.jenis='masuk' THEN m.jumlah ELSE -m.jumlah END),0) stok FROM barang_habis_pakai b LEFT JOIN mutasi_barang m ON m.barang_id=b.id WHERE b.id=? GROUP BY b.id FOR UPDATE");$s->execute([(int)$d['barangId']]);$b=$s->fetch();if(!$b) throw new Exception('Barang tidak ditemukan');if($d['jenis']==='keluar' && $jumlah>(int)$b['stok']) throw new Exception('Stok tidak mencukupi. Stok tersedia: '.$b['stok']);$s=$pdo->prepare('INSERT INTO mutasi_barang(barang_id,jenis,tanggal,jumlah,dokumen,petugas,keterangan) VALUES(?,?,?,?,?,?,?)');$s->execute([(int)$d['barangId'],$d['jenis'],$d['tanggal'],$jumlah,$d['dokumen'],$d['petugas'],$d['keterangan']??null]);$pdo->commit();ok(['id'=>$pdo->lastInsertId()]);}catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();fail($e->getMessage(),400);}
}
fail('Metode tidak didukung',405);

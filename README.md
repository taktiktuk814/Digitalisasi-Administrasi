# SIMAD – Administrasi Perkantoran

Aplikasi sederhana untuk digitalisasi administrasi perkantoran. Dibuat sebagai aplikasi web statis sehingga dapat dijalankan langsung melalui GitHub Pages tanpa XAMPP atau database server.

## Fitur
- Dashboard ringkasan jumlah data
- Surat Masuk: nomor, tanggal, asal, perihal, disposisi
- Surat Keluar: nomor, tanggal, tujuan, perihal, keterangan
- Arsip Dokumen: kode, nama dokumen, kategori, tanggal, lokasi penyimpanan
- Agenda Kegiatan: tanggal, waktu, kegiatan, tempat, penanggung jawab
- Tambah dan hapus data
- Pencarian data
- Ekspor setiap modul ke CSV
- Penyimpanan data menggunakan `localStorage` browser
- Tampilan responsif untuk komputer dan perangkat mobile

## Menjalankan
Buka `index.html` pada browser atau aktifkan GitHub Pages pada repository ini.

### GitHub Pages
1. Buka **Settings** repository.
2. Pilih **Pages**.
3. Pada **Build and deployment**, pilih **Deploy from a branch**.
4. Branch: `main`, folder: `/ (root)`.
5. Klik **Save**.
6. Tunggu proses deployment selesai, kemudian buka alamat Pages yang diberikan GitHub.

## Catatan data
Versi awal ini menggunakan `localStorage`, sehingga data tersimpan pada browser/perangkat masing-masing. Data belum tersimpan ke server dan belum memiliki login multi-user. Untuk penggunaan kantor secara bersama-sama, tahap berikutnya dapat dikembangkan menjadi Laravel + MySQL dengan autentikasi, database, upload dokumen PDF, disposisi, laporan, dan hak akses pengguna.

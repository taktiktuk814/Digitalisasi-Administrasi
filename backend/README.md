# SIMAD Backend - Laravel + MySQL

Backend tahap awal aplikasi administrasi perkantoran SIMAD.

## Kebutuhan
- PHP 8.2+
- Composer
- MySQL/MariaDB
- Laravel 11

## Instalasi lokal

```bash
cd backend
composer install
copy .env.example .env
php artisan key:generate
```

Buat database MySQL bernama `simad`, lalu sesuaikan `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simad
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan:

```bash
php artisan migrate
php artisan serve
```

Buka `http://127.0.0.1:8000/aset`.

## Modul awal
- Inventarisasi Aset
- CRUD aset
- Pencarian aset
- Pagination
- MySQL migration

Modul surat, arsip, agenda, pengguna, autentikasi, dan dashboard akan ditambahkan pada tahap berikutnya.

<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('simad:status', function () {
    $this->info('SIMAD Laravel aktif.');
})->purpose('Menampilkan status aplikasi SIMAD');

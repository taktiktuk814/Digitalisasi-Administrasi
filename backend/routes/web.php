<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::resource('aset',AsetController::class)->except(['show']);
Route::resource('surat-masuk',SuratMasukController::class)->except(['show']);
Route::resource('surat-keluar',SuratKeluarController::class)->except(['show']);
Route::resource('agenda',AgendaController::class)->except(['show']);
Route::resource('arsip',ArsipController::class)->except(['show']);
Route::resource('pegawai',PegawaiController::class);

<?php

use App\Http\Controllers\AsetController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('aset.index'));
Route::resource('aset', AsetController::class)->except(['show']);

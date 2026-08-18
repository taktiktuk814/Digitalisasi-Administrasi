<?php
namespace App\Http\Controllers;
use App\Models\Aset; use App\Models\SuratMasuk; use App\Models\SuratKeluar; use App\Models\Agenda; use App\Models\Arsip;
class DashboardController extends Controller { public function index(){return view('dashboard',['stats'=>['Surat Masuk'=>SuratMasuk::count(),'Surat Keluar'=>SuratKeluar::count(),'Arsip Dokumen'=>Arsip::count(),'Agenda'=>Agenda::count(),'Inventaris Aset'=>Aset::count()]]);}}

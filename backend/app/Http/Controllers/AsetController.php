<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();
        $asets = Aset::when($q, fn($query) => $query->where('kode_barang','like',"%$q%")
            ->orWhere('nama_barang','like',"%$q%")
            ->orWhere('lokasi','like',"%$q%"))->latest()->paginate(20)->withQueryString();
        return view('aset.index', compact('asets', 'q'));
    }

    public function create() { return view('aset.form', ['aset' => new Aset()]); }

    public function store(Request $request)
    {
        Aset::create($this->validated($request));
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil disimpan.');
    }

    public function edit(Aset $aset) { return view('aset.form', compact('aset')); }

    public function update(Request $request, Aset $aset)
    {
        $aset->update($this->validated($request, $aset->id));
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui.');
    }

    public function destroy(Aset $aset)
    {
        $aset->delete();
        return back()->with('success', 'Data aset berhasil dihapus.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'kode_barang' => 'required|max:100|unique:asets,kode_barang,'.($id ?? 'NULL').',id',
            'nama_barang' => 'required|max:255', 'kib' => 'nullable|max:10', 'kategori' => 'nullable|max:255',
            'merk_type' => 'nullable|max:255', 'nomor_register' => 'nullable|max:255',
            'tahun_perolehan' => 'nullable|integer|min:1900|max:2100', 'sumber_dana' => 'nullable|max:255',
            'jumlah' => 'required|integer|min:1', 'satuan' => 'required|max:30',
            'harga_perolehan' => 'required|numeric|min:0', 'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'nullable|max:255', 'pengguna_barang' => 'nullable|max:255',
            'penanggung_jawab' => 'nullable|max:255', 'nomor_dokumen' => 'nullable|max:255', 'keterangan' => 'nullable'
        ]);
    }
}

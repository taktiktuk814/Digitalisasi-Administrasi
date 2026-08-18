<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();
        $pegawai = Pegawai::when($q, fn($query) => $query->where('nip','like',"%$q%")
            ->orWhere('nama','like',"%$q%")
            ->orWhere('jabatan','like',"%$q%")
            ->orWhere('unit_kerja','like',"%$q%"))
            ->latest()->paginate(20)->withQueryString();
        return view('pegawai.index', compact('pegawai', 'q'));
    }

    public function create()
    {
        return view('pegawai.form', ['pegawai' => new Pegawai()]);
    }

    public function store(Request $request)
    {
        Pegawai::create($this->validated($request));
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil disimpan.');
    }

    public function show(Pegawai $pegawai)
    {
        $pegawai->load(['arsip' => fn($q) => $q->latest('tanggal')]);
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.form', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->update($this->validated($request, $pegawai));
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('success', 'Data pegawai berhasil dihapus.');
    }

    private function validated(Request $request, ?Pegawai $pegawai = null): array
    {
        return $request->validate([
            'nip' => ['required','max:30', Rule::unique('pegawai','nip')->ignore($pegawai?->id)],
            'nama' => 'required|max:150',
            'gelar_depan' => 'nullable|max:30',
            'gelar_belakang' => 'nullable|max:50',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tempat_lahir' => 'nullable|max:100',
            'tanggal_lahir' => 'nullable|date',
            'pangkat_golongan' => 'nullable|max:50',
            'jabatan' => 'nullable|max:150',
            'unit_kerja' => 'nullable|max:150',
            'status_kepegawaian' => 'nullable|max:50',
            'nomor_hp' => 'nullable|max:30',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable',
            'keterangan' => 'nullable',
        ]);
    }
}

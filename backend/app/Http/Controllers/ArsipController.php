<?php
namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $r)
    {
        $q=$r->string('q')->toString();
        $data=Arsip::with('pegawai')->when($q,fn($x)=>$x->where('kode','like',"%$q%")
            ->orWhere('nama','like',"%$q%")
            ->orWhere('kategori','like',"%$q%")
            ->orWhere('pegawai_nip','like',"%$q%"))
            ->latest('tanggal')->paginate(15)->withQueryString();
        return view('arsip.index',compact('data','q'));
    }

    public function create(){return view('arsip.form',['item'=>new Arsip,'pegawai'=>Pegawai::orderBy('nama')->get()]);}

    public function store(Request $r)
    {
        $d=$this->validated($r);
        if($r->hasFile('file'))$d['file_path']=$r->file('file')->store('arsip','public');
        unset($d['file']); Arsip::create($d);
        return redirect()->route('arsip.index')->with('success','Arsip berhasil disimpan.');
    }

    public function edit(Arsip $arsip){return view('arsip.form',['item'=>$arsip,'pegawai'=>Pegawai::orderBy('nama')->get()]);}

    public function update(Request $r,Arsip $arsip)
    {
        $d=$this->validated($r);
        if($r->hasFile('file')){if($arsip->file_path)Storage::disk('public')->delete($arsip->file_path);$d['file_path']=$r->file('file')->store('arsip','public');}
        unset($d['file']); $arsip->update($d);
        return redirect()->route('arsip.index')->with('success','Arsip diperbarui.');
    }

    public function destroy(Arsip $arsip){if($arsip->file_path)Storage::disk('public')->delete($arsip->file_path);$arsip->delete();return back()->with('success','Arsip dihapus.');}

    private function validated(Request $r): array
    {
        return $r->validate(['kode'=>'required','nama'=>'required','kategori'=>'nullable','pegawai_nip'=>'nullable|exists:pegawai,nip','tanggal'=>'nullable|date','lokasi'=>'nullable','keterangan'=>'nullable','file'=>'nullable|file|max:10240']);
    }
}

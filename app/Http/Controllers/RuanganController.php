<?php

namespace App\Http\Controllers;

use App\Models\Dataruangan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Dataruangan::latest()->get();
        return view('ruangan.tampildata', compact('ruangan'));
    }

    public function tambahbaru()
    {
        return view('ruangan.buat-baru');
    }
    
    public function delete($id)
    {
        $ruangan = Dataruangan::find($id);
        if ($ruangan->delete()) {
            # code...
            return redirect()->back()->with('success', 'Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'ruangan' => 'required',
            'keterangan_ruangan' => 'required',
        ]);

        $ruangan = Dataruangan::create([
            'ruangan' => $request['ruangan'],
            'keterangan_ruangan' => $request['keterangan_ruangan'],
        ]);
        if ($ruangan) {
            # code...
            return redirect()->route('ruangan.index')->with('success', 'Data berhasil di tambahkan');
        } else {
            # code...
            return redirect()->route('ruangan.index')->with('error', 'Data gagal di tambahkan');
        }
        // return redirect('/datapasien')->with('status', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $ruangan = Dataruangan::find($id);
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ruangan' => 'required',
            'keterangan_ruangan' => 'required',
        ]);

        $ruangan = Dataruangan::find($id);
        $ruangan->ruangan = $request->ruangan;
        $ruangan->keterangan_ruangan = $request->keterangan_ruangan;
        // $ruangan->save();


        if ($ruangan->save()) {
            # code...
            return redirect()->route('ruangan.index')->with('success', 'Data berhasil di ubah');
        } else {
            # code...
            return redirect()->route('ruangan.index')->with('error', 'Data gagal di ubah');
        }
    }
}

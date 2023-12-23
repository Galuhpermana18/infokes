<?php

namespace App\Http\Controllers;

use App\Models\Dataobat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Dataobat::latest()->get();
        return view('obat.tampildata', compact('obat'));
    }

    public function tambahbaru()
    {
        return view('obat.buat-baru');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'keluhan' => 'required',
            'keterangan_obat' => 'required',
        ]);

        $obat = Dataobat::create([
            'kode_obat' => $request['kode_obat'],
            'nama_obat' => $request['nama_obat'],
            'keluhan' => $request['keluhan'],
            'keterangan_obat' => $request['keterangan_obat'],
        ]);
        if ($obat) {
            # code...
            return redirect()->route('obat.index')->with('success', 'Data berhasil di tambahkan');
        } else {
            # code...
            return redirect()->route('obat.index')->with('error', 'Data gagal di tambahkan');
        }
        // return redirect('/datapasien')->with('status', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $obat = Dataobat::find($id);
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'keluhan' => 'required',
            'keterangan_obat' => 'required',
        ]);

        $obat = Dataobat::find($id);
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->keluhan = $request->keluhan;
        $obat->keterangan_obat = $request->keterangan_obat;


        if ($obat->save()) {
            # code...
            return redirect()->route('obat.index')->with('success', 'Data berhasil di ubah');
        } else {
            # code...
            return redirect()->route('obat.index')->with('error', 'Data gagal di ubah');
        }
    }

    public function delete($id)
    {
        $obat = Dataobat::find($id);
        if ($obat->delete()) {
            # code...
            return redirect()->back()->with('success', 'Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
}

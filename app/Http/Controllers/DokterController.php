<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Datadokter::latest()->get();
        // dd($dokter);
        return view('dokter.tampildata', compact('dokter'));
    }

    public function tambahbaru()
    {
        return view('dokter.buat-baru');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'foto_dokter' => 'required|file|image|mimes:jpeg,png,jpg',
            'jenis_kelamin' => 'required',
            'spesialis' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $file = $request->file('foto_dokter');
        $nama_file = time() . '-' . $file->getClientOriginalName();
        $tujuan = 'foto_dokter';
        $file->move($tujuan, $nama_file);
        $dokter = Datadokter::create([
            'namadokter' => $request['nama_dokter'],
            'foto' => $nama_file,
            'jenis_kelamin' => $request['jenis_kelamin'],
            'spesialis' => $request['spesialis'],
            'jam_mulai' => $request['jam_mulai'],
            'jam_selesai' => $request['jam_selesai'],
        ]);
        if ($dokter) {
            # code...
            return redirect()->route('dokter.index')->with('success', 'Data berhasil di tambahkan');
        } else {
            # code...
            return redirect()->route('dokter.index')->with('error', 'Data gagal di tambahkan');
        }
        // return redirect('/datapasien')->with('status', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dokter = Datadokter::find($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'foto_dokter' => 'nullable|file|image|mimes:jpeg,png,jpg',
            'jenis_kelamin' => 'required',
            'spesialis' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);


        $dokter = Datadokter::find($id);
        $file_path = public_path() . '/foto_dokter/' . $dokter->foto;
        if ($request->hasFile('foto_dokter')) {
            if (!file_exists($file_path)) {
                // unlink($file_path);
                unlink($file_path);
            }
            # code...
            $file = $request->file('foto_dokter');
            $nama_file = time() . '-' . $file->getClientOriginalName();
            $tujuan = 'foto_dokter';
            $file->move($tujuan, $nama_file);
        }
        $dokter->namadokter = $request->nama_dokter;
        $dokter->foto = $nama_file;
        $dokter->jenis_kelamin = $request->jenis_kelamin;
        $dokter->spesialis = $request->spesialis;
        $dokter->jam_mulai = $request->jam_mulai;
        $dokter->jam_selesai = $request->jam_selesai;


        if ($dokter->save()) {
            # code...
            return redirect()->route('dokter.index')->with('success', 'Data berhasil di ubah');
        } else {
            # code...
            return redirect()->route('dokter.index')->with('error', 'Data gagal di ubah');
        }
    }

    public function delete($id)
    {
        $dokter = Datadokter::find($id);
        if ($dokter->delete()) {
            # code...
            return redirect()->back()->with('success', 'Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use App\Models\Dataobat;
use App\Models\Datapasien;
use App\Models\Dataruangan;
use App\Models\Rekammedis;
use Illuminate\Http\Request;

class RekammedisController extends Controller
{
    public function index()
    {
        $rekammedis = Rekammedis::latest()->get();
        if (auth()->user()->role == 'pasien') {
            # code...
            $pasien = Datapasien::where('user_id', auth()->user()->id)->first();
            $rekammedis = Rekammedis::where('pasien_id','=',$pasien->id)->latest()->get();
        }
        return view('rekammedis.tampildata', compact('rekammedis'));
    }

    public function tambahbaru()
    {
        $pasien = Datapasien::all();
        $dokter = Datadokter::all();
        $obat = Dataobat::all();
        $ruangan = Dataruangan::all();
        return view('rekammedis.buat-baru', compact('pasien', 'dokter', 'obat','ruangan'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'tanggalperiksa' => 'required',
            'pasien_id' => 'required',
            'keluhan' => 'required',
            'dokter_id' => 'required',
            'diagnosa' => 'required',
            'obat_id' => 'required',
            'ruangan_id' => 'required',
            'status' => 'required',
        ]);

        $rekammedis = Rekammedis::create([
            'tanggalperiksa' => $request['tanggalperiksa'],
            'pasien_id' => $request['pasien_id'],
            'keluhan' => $request['keluhan'],
            'dokter_id' => $request['dokter_id'],
            'diagnosa' => $request['diagnosa'],
            'obat_id' => $request['obat_id'],
            'ruangan_id' => $request['ruangan_id'],
            'status' => $request['status'],

        ]);
        if ($rekammedis) {
            # code...
            return redirect()->route('rekammedis.index')->with('success', 'Data berhasil di tambahkan');
        } else {
            # code...
            return redirect()->route('rekammedis.index')->with('error', 'Data gagal di tambahkan');
        }
        // return redirect('/datapasien')->with('status', 'Data Berhasil Ditambah');
    }

    public function delete($id)
    {
        $rekammedis = Rekammedis::find($id);
        if ($rekammedis->forceDelete()) {
            # code...
            return redirect()->back()->with('success', 'Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
}

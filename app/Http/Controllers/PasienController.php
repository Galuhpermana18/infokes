<?php

namespace App\Http\Controllers;

use App\Models\Datapasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function dashboard()
    {
        return view('sb-user/dashboardpasien');
    }

    public function index()
    {
        $Datapasien = Datapasien::latest()->paginate(1000);
        return view('sb-user/datapasien', compact('Datapasien'));
    }

    public function tambah()
    {
        return view('sb-user/formtambahpasien');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'namapasien' => 'required',
            'no_telp_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'keluhan' => 'required',
            // 'tanggal' => 'required',
        ]);


        $datapasien = Datapasien::create([
            'namapasien' => $request['namapasien'],
            'no_telp_pasien' => $request['no_telp_pasien'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'keluhan' => $request['keluhan'],
            // 'tanggal' => $request['tanggal'],
            'tanggal' => now(),
        ]);
        return redirect('/datapasien')->with('status', 'Data Berhasil Ditambah');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Datapasien;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $pasien = Datapasien::latest()->get();
        return view('pasien.tampildata', compact('pasien'));
    }

    public function tambahbaru()
    {
        return view('pasien.buat-baru');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp_pasien' => 'required',
            'alamat' => 'required',
        ]);
        $email = str($request['nama_pasien'])->slug().'-'.$request['no_telp_pasien']."@".env('APP_NAME');
        if (User::where('email','=',$email)->exists()) {
            # code...
            return redirect()->route('pasien.index')->with('error', 'Data gagal di tambahkan, email sama.!');
        }
        $user_pasien = new User();
        $user_pasien->name = $request['nama_pasien'];
        $user_pasien->email = $email;
        $user_pasien->role = 'pasien';
        $user_pasien->password = bcrypt($request['no_telp_pasien']);
        $user_pasien->save();
        $pasien = Datapasien::create([
            'namapasien' => $request['nama_pasien'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'no_telp_pasien' => $request['no_telp_pasien'],
            'alamat' => $request['alamat'],
            'tanggal'=>now(),
            'user_id'=>$user_pasien->id,

        ]);
        if ($pasien) {
            # code...
            return redirect()->route('pasien.index')->with('success', 'Data berhasil di tambahkan');
        } else {
            # code...
            return redirect()->route('pasien.index')->with('error', 'Data gagal di tambahkan');
        }
    }

    public function delete($id)
    {
        $pasien = Datapasien::find($id);
        if ($pasien->forceDelete()) {
            # code...
            return redirect()->back()->with('success', 'Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
}

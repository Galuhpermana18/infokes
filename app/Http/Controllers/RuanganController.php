<?php

namespace App\Http\Controllers;

use App\Models\Dataruangan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $ruangan = Dataruangan::latest()->get();
        return view('ruangan.tampildata',compact('ruangan'));
    }
    public function tambahbaru(){
        return view('ruangan.buat-baru');
    }
    public function delete($id) {
        $ruangan = Dataruangan::find($id);
        if ($ruangan->delete()) {
            # code...
            return redirect()->back()->with('success','Data berhasil di hapus');
        } else {
            # code...
            return redirect()->back()->with('error','Data gagal di hapus');
        }
        
    }
}

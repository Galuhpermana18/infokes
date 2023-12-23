<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use App\Models\Datapasien;
use App\Models\Rekammedis;
use Illuminate\Http\Request;

class RekammedisController extends Controller
{
    public function index()
    {
        $rekammedis = Rekammedis::latest()->get();
        return view('rekammedis.tampildata', compact('rekammedis'));
    }

    public function tambahbaru()
    {
        $pasien = Datapasien::all();
        $dokter = Datadokter::all();
        return view('rekammedis.buat-baru', compact('pasien', 'dokter'));
    }
}

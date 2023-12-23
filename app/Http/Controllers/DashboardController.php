<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use App\Models\Dataobat;
use App\Models\Datapasien;
use App\Models\Dataruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            # code...
            $dokter = Datadokter::all();
            $pasien = Datapasien::all();
            $obat = Dataobat::all();
            $ruangan = Dataruangan::all();
            return view('dashboard.index', compact('dokter', 'pasien', 'obat', 'ruangan'));
        }
        return view('dashboard.index');
    }
}

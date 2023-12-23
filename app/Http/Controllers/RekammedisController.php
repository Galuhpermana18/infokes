<?php

namespace App\Http\Controllers;

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
        return view('rekammedis.buat-baru');    
    }
}

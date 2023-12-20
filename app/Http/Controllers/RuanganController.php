<?php

namespace App\Http\Controllers;

use App\Models\Dataruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $Ruangan = Dataruangan::latest()->paginate(1000);
        return view('ruangan.tampildata');
    }
}

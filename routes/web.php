<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekammedisController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});


// user
// Route::get('/', [PasienController::class, 'dashboard'])->name('dashboardpasien');
// Route::get('/datapasien', [PasienController::class, 'index'])->name('datapasien');
// Route::get('/formtambahpasien', [PasienController::class, 'tambah'])->name('formtambahpasien');
// Route::get('/datapasien', [App\Http\Controllers\PasienController::class, 'index'])->name('datapasien');
// Route::post('/simpan', [PasienController::class, 'simpan'])->name('simpan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    // Ruangan
    Route::name('ruangan.')->prefix('ruangan')->group(function () {
        Route::get("/", [RuanganController::class, 'index'])->name('index')->middleware('checkRole:admin');
        Route::delete("/hapus/{id}", [RuanganController::class, 'delete'])->name('hapus')->middleware('checkRole:admin');
        Route::get("/tambah-ruangan", [RuanganController::class, 'tambahbaru'])->name('tambah')->middleware('checkRole:admin');
        Route::post("/simpan", [RuanganController::class, 'simpan'])->name('simpan')->middleware('checkRole:admin');
        Route::get("/edit-ruangan/{id}", [RuanganController::class, 'edit'])->name('edit')->middleware('checkRole:admin');
        Route::put("/update-ruangan/{id}", [RuanganController::class, 'update'])->name('update')->middleware('checkRole:admin');
    });

    //Obat
    Route::name('obat.')->prefix('obat')->group(function () {
        Route::get("/", [ObatController::class, 'index'])->name('index')->middleware('checkRole:admin');
        Route::get("/tambah-obat", [ObatController::class, 'tambahbaru'])->name('tambah')->middleware('checkRole:admin');
        Route::post("/simpan", [ObatController::class, 'simpan'])->name('simpan')->middleware('checkRole:admin');
        Route::get("/edit-obat/{id}", [ObatController::class, 'edit'])->name('edit')->middleware('checkRole:admin');
        Route::put("/update-obat/{id}", [ObatController::class, 'update'])->name('update')->middleware('checkRole:admin');
        Route::delete("/hapus/{id}", [ObatController::class, 'delete'])->name('hapus')->middleware('checkRole:admin');
    });
    //Dokter
    Route::name('dokter.')->prefix('dokter')->group(function () {
        Route::get("/", [DokterController::class, 'index'])->name('index')->middleware('checkRole:admin');
        Route::get("/tambah-dokter", [DokterController::class, 'tambahbaru'])->name('tambah')->middleware('checkRole:admin');
        Route::post("/simpan", [DokterController::class, 'simpan'])->name('simpan')->middleware('checkRole:admin');
        Route::get("/edit-dokter/{id}", [DokterController::class, 'edit'])->name('edit')->middleware('checkRole:admin');
        Route::put("/update-dokter/{id}", [DokterController::class, 'update'])->name('update')->middleware('checkRole:admin');
        Route::delete("/delete/{id}", [DokterController::class, 'delete'])->name('delete')->middleware('checkRole:admin');
    });
    //Rekammedis
    Route::name('rekammedis.')->prefix('rekammedis')->group(function () {
        Route::get("/", [RekammedisController::class, 'index'])->name('index')->middleware('checkRole:admin');
        Route::get("/tambah-rekammedis", [RekammedisController::class, 'tambahbaru'])->name('tambah')->middleware('checkRole:admin');

    });

    //pasien
    Route::name('pasien.')->prefix('pasien')->group(function () {
        Route::get("/", [PasienController::class, 'index'])->name('index')->middleware('checkRole:admin');
        Route::get("/tambah-pasien", [PasienController::class, 'tambahbaru'])->name('tambah')->middleware('checkRole:admin');
        Route::post("/simpan", [PasienController::class, 'simpan'])->name('simpan')->middleware('checkRole:admin');
        Route::delete("/delete/{id}", [PasienController::class, 'delete'])->name('delete')->middleware('checkRole:admin');
    });
});
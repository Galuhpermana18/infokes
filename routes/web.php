<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

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
    return view('sb-user/dashboardpasien');
});


// user
Route::get('/', [PasienController::class, 'dashboard'])->name('dashboardpasien');
Route::get('/datapasien', [PasienController::class, 'index'])->name('datapasien');
Route::get('/formtambahpasien', [PasienController::class, 'tambah'])->name('formtambahpasien');
// Route::get('/datapasien', [App\Http\Controllers\PasienController::class, 'index'])->name('datapasien');
Route::post('/simpan', [PasienController::class, 'simpan'])->name('simpan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\DashboardController;
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

Route::prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

    Route::name('ruangan.')->prefix('ruangan')->group(function(){
        Route::get("/",function(){
            return "Halaman ruangan";
        })->name('index');

        Route::get("buat-baru",function(){
            return "Halaman buat baru ruangan";
        })->name('index')->middleware('checkRole:admin');
    });
    
});
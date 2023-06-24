<?php

// Panggil controller

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Bikin routing untuk dashboard pake controller
Route::get('/dashboard', [DashboardController::class, 'index']);
// Bikin routing untuk produk pake controller
Route::get('/produk', [ProdukController::class, 'index']);
// Bikin routing untuk create
Route::get('/produk/create', [ProdukController::class, 'create']);
// Bikin routing untuk kirim data menggunakan store
Route::post('/produk/store', [ProdukController::class, 'store']);
// Bikin routing untuk form edit
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
// Bikin routing untuk edit data menggunakan update
Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
// Bikin routing untuk delete data menggunakan destroy
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    // bikin ruting grup berdasrkan role 
    Route::group(['middleware' => ['auth', 'peran:admin-manager']], function () {
        // pindah ruting yang bisa terhubung 
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Buat Routing Produk
        Route::get('/produk', [ProdukController::class, 'index']);
        Route::get('/produk/create', [ProdukController::class, 'create']);
        Route::post('/produk/store', [ProdukController::class, 'store']);
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);
        Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
        Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    
    // Buat route untuk after_registrasi
    Route::get('/after_register', function () {
        return view('after_register');
    });
});
    
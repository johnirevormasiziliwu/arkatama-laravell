<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerModalController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/testing', function () {
    return view('template.start');
});

// Practice Route

Route::get('/hello', function() {
    return 'Nama Saya Apli!';
});

Route::redirect('/nama', '/hello');

Route::fallback(function() {
    return 'Halaman ini tidak ada!';
});

Route::get('/conflict/nokia', function() {
    return 'Nama barang saya nokia';
});

Route::get('/items/{merk}', function($id) {
    return $id;
});

Route::get('/conflict/{nama}', function($namaitem) {
    return 'Nama Barang : ' . $namaitem;
});

// Route::get('/produk', [ItemController::class, 'item']);

// View



// Route Home
Route::get('/', [LandingController::class, 'index']);

// Route Produk
Route::get('/produk', [ProdukController::class, 'index'])->middleware('auth');
Route::get('/produk-create', [ProdukController::class, 'create'])->middleware('auth');
Route::post('/produk-store', [ProdukController::class, 'store'])->middleware('auth');
Route::put('/produk-update', [ProdukController::class, 'update'])->middleware('auth');
Route::get('/produk-edit/{id}', [ProdukController::class, 'edit'])->middleware('auth');
Route::get('/produk-delete/{id}', [ProdukController::class, 'destroy'])->middleware('auth');

// Route Customer
Route::get('/customer', [CustomerController::class, 'index'])->middleware('auth');
Route::get('/customer-create', [CustomerController::class, 'create'])->middleware('auth');
Route::post('/customer-store', [CustomerController::class, 'store'])->middleware('auth');
Route::put('/customer-update', [CustomerController::class, 'update'])->middleware('auth');
Route::get('/customer-edit/{id}', [CustomerController::class, 'edit'])->middleware('auth');
Route::get('/customer-delete/{id}', [CustomerController::class, 'delete'])->middleware('auth');

// Route Customer Modal
Route::get('/modal/customer', [CustomerModalController::class, 'index'])->middleware('auth');
Route::get('/modal/customer-create', [CustomerModalController::class, 'create'])->middleware('auth');
Route::post('/modal/customer-store', [CustomerModalController::class, 'store'])->middleware('auth');
Route::put('/modal/customer-update', [CustomerModalController::class, 'update'])->middleware('auth');
Route::get('/modal/customer-edit/{id}', [CustomerModalController::class, 'edit'])->middleware('auth');
Route::get('/modal/customer-delete/{id}', [CustomerModalController::class, 'delete'])->middleware('auth');

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Registrasi
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

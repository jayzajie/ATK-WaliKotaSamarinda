<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\StokOpnameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('templates.index');
    })->name('dashboard');

    // Barang Masuk Routes
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk');
    Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');
    Route::get('/barang-masuk/{id}', [BarangMasukController::class, 'show'])->name('barang-masuk.show');
    Route::put('/barang-masuk/{id}', [BarangMasukController::class, 'update'])->name('barang-masuk.update');
    Route::delete('/barang-masuk/{id}', [BarangMasukController::class, 'destroy'])->name('barang-masuk.destroy');

    // Barang Keluar Routes
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar');
    Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');
    Route::get('/barang-keluar/{id}', [BarangKeluarController::class, 'show'])->name('barang-keluar.show');
    Route::put('/barang-keluar/{id}', [BarangKeluarController::class, 'update'])->name('barang-keluar.update');
    Route::delete('/barang-keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barang-keluar.destroy');

    // Stok Opname Routes
    Route::get('/stok-opname', [StokOpnameController::class, 'index'])->name('stok-opname');
    Route::get('/stok-opname/export', [StokOpnameController::class, 'export'])->name('stok-opname.export');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
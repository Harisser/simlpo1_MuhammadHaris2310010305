<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BatchObatController;
use App\Http\Controllers\StokObatController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/profil', function () {
    return view('profile.show');
})->name('profile.show');

Route::middleware('auth')->group(function () {

    Route::resource('apotek', ApotekController::class);
    Route::resource('user', UserController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('batch', BatchObatController::class);
    Route::get('/stok-obat', [StokObatController::class, 'index'])
        ->name('stok.index');
    Route::get('/penjualan', [TransaksiPenjualanController::class, 'index'])
        ->name('penjualan.index');
    Route::get('/penjualan/create', [TransaksiPenjualanController::class, 'create'])
        ->name('penjualan.create');
    Route::post('/penjualan', [TransaksiPenjualanController::class, 'store'])
        ->name('penjualan.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/laporan/stok', [LaporanController::class, 'stok'])
        ->name('laporan.stok');
    Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan'])
        ->name('laporan.penjualan');
    Route::get('/laporan/penjualan/print', [LaporanController::class, 'penjualanPrint'])
        ->name('laporan.penjualan.print');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

require __DIR__.'/auth.php';


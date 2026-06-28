<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Anggota\DashboardController as AnggotaDashboard;
use App\Http\Controllers\Departemen\DashboardController as DepartemenDashboard;
use App\Http\Controllers\Keuangan\DashboardController as KeuanganDashboard;
use Illuminate\Support\Facades\Route;


// AUTH ROUTES
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ADMIN ROUTES (role:admin) Adminn disini jangan sampai salah yaaa.
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::resource('manage-admin', \App\Http\Controllers\Admin\AdminCrudController::class)->names('manage-admin');
    
    #crud anggota
    Route::get('/crud_anggota', [App\Http\Controllers\Admin\AnggotaController::class, 'index'])->name('crud_anggota.index');
    Route::get('/crud_anggota/create', [App\Http\Controllers\Admin\AnggotaController::class, 'create'])->name('crud_anggota.create');
    Route::post('/crud_anggota', [App\Http\Controllers\Admin\AnggotaController::class, 'store'])->name('crud_anggota.store');
    Route::get('/crud_anggota/{id}', [App\Http\Controllers\Admin\AnggotaController::class, 'show'])->name('crud_anggota.show');
    Route::get('/crud_anggota/{id}/edit', [App\Http\Controllers\Admin\AnggotaController::class, 'edit'])->name('crud_anggota.edit');
    Route::put('/crud_anggota/{id}', [App\Http\Controllers\Admin\AnggotaController::class, 'update'])->name('crud_anggota.update');
    Route::delete('/crud_anggota/{id}', [App\Http\Controllers\Admin\AnggotaController::class, 'destroy'])->name('crud_anggota.destroy');
    
    Route::resource('crud_departemen', \App\Http\Controllers\Admin\DepartemenController::class)->names('crud_departemen');
    // Tempat untuk menambahkan route admin di sini yaaaa!, Tambah sesuai kebutuhan fitur yang dikerjakan, jangan aneh-aneh biar mudah!
});


// ANGGOTA ROUTES (role:anggota) Anggota disini jangan sampai salah yaaa.
Route::middleware(['auth', 'role:anggota'])->prefix('anggota')->group(function () {
    Route::get('/dashboard', [AnggotaDashboard::class, 'index'])->name('anggota.dashboard');
    // tempat untuk menambahkan route anggota di sini yaaaa!, Tambahkan sesuai kebutuhan fitur yang dikerjakan, jangan aneh-aneh biar mudah!
});


// DEPARTEMEN ROUTES (role:departemen) Departemen disini jangan sampai salah yaaa.
Route::middleware(['auth', 'role:departemen'])->prefix('departemen')->group(function () {
    Route::get('/dashboard', [DepartemenDashboard::class, 'index'])->name('departemen.dashboard');
    // tempat untuk menambahkan route departemen di sini yaaaa!, Tambahkan sesuai kebutuhan fitur yang dikerjakan, jangan aneh-aneh biar mudah!
});


// KEUANGAN ROUTES (role:keuangan) Keuangan disini jangan sampai salah yaaa.
Route::middleware(['auth', 'role:keuangan'])->prefix('keuangan')->group(function () {
    Route::get('/dashboard', [KeuanganDashboard::class, 'index'])->name('keuangan.dashboard');
    // tempat untuk menambahkan route keuangan di sini yaaaa!,  Tambahkan sesuai kebutuhan fitur yang dikerjakan, jangan aneh-aneh biar mudah!
});


Route::get('/', function () {
    return redirect('/login');
});

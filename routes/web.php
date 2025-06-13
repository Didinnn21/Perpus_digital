<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanbukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\MemberController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    Route::get('/pustakawan/dashboard', [PustakawanController::class, 'index']);
});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/daftar_buku', [DaftarbukuController::class, 'index'])->name('daftar.buku');
Route::get('/peminjaman_buku',[PeminjamanbukuController::class, 'index'])->name('peminjaman.buku');


Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index');

// Form untuk tambah buku
Route::get('/bukus/create', [BukuController::class, 'create'])->name('bukus.create');

// Menyimpan buku baru
Route::post('/bukus', [BukuController::class, 'store'])->name('bukus.store');
Route::get('/bukus/{buku}/edit', [BukuController::class, 'edit'])->name('bukus.edit');
Route::put('/bukus/{buku}', [BukuController::class, 'update'])->name('bukus.update');
Route::delete('/bukus/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy');


Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');


require __DIR__.'/auth.php';

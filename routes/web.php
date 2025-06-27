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
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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
    return redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses',[LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => ['auth:member'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/daftar_buku', [DaftarbukuController::class, 'index'])->name('daftar.buku');
    //Route::get('/peminjaman_buku', [PeminjamanbukuController::class, 'index'])->name('peminjaman.buku');

    Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index');
    Route::get('/bukus/create', [BukuController::class, 'create'])->name('bukus.create');
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

});

Route::middleware(['auth:member', 'role.member:member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/peminjamanbuku', [PeminjamanbukuController::class, 'index'])->name('peminjamanbuku.index');
    Route::get('/peminjamanbuku/create', [PeminjamanbukuController::class, 'create'])->name('peminjamanbuku.create');
    Route::post('/peminjamanbuku', [PeminjamanbukuController::class, 'store'])->name('peminjamanbuku.store');

    Route::get('/pengembalianbuku', [PeminjamanbukuController::class, 'pengembalianIndex'])->name('pengembalianbuku.index');
    Route::get('/pengembalianbuku/{id}/form', [PeminjamanbukuController::class, 'formPengembalian'])->name('pengembalianbuku.form');
    Route::post('/pengembalianbuku/{id}/kembalikan', [PeminjamanbukuController::class, 'kembalikan'])->name('pengembalianbuku.kembalikan');

});

Route::get('/home', function () {
    $user = Auth::guard('member')->user();

    if ($user) {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('member')) {
            return redirect()->route('member.dashboard');
        }
    }

    return redirect()->route('login')->with('failed', 'Role tidak dikenali atau belum login.');
})->middleware('auth:member')->name('home');


//Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/admin/dashboard', [AdminController::class, 'index']);
//});

//Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    //Route::get('/pustakawan/dashboard', [PustakawanController::class, 'index']);
//});

//Route::middleware(['auth', 'role:member'])->group(function () {
   // Route::get('/member/dashboard', [MemberController::class, 'index']);
//});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function daftarPeminjam()
    {
    $peminjamans = Peminjaman::with(['member', 'buku'])
        ->whereNull('tanggal_pengembalian')
        ->get();

    return view('admin.daftar_member_peminjam', compact('peminjamans'));
    }
}

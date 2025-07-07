<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Member;

class AdminController extends Controller
{
    public function index()
{
    $totalBuku = Buku::count();
    $totalAnggota = Member::count();
    $anggotaMeminjam = Peminjaman::whereNull('tanggal_pengembalian')
                          ->distinct('member_id')
                          ->count('member_id');

    return view('admin.dashboard', compact('totalBuku', 'totalAnggota', 'anggotaMeminjam'));
}
    public function daftarPeminjam(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort', 'asc');

    $peminjamans = \App\Models\Peminjaman::with(['member', 'buku'])
        ->whereNull('tanggal_pengembalian')
        ->when($search, function ($query) use ($search) {
            $query->whereHas('member', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        })
        ->join('members', 'peminjamans.member_id', '=', 'members.id')
        ->orderBy('members.nama', $sort)
        ->select('peminjamans.*')
        ->get();

    return view('admin.daftar_member_peminjam', compact('peminjamans'));
}

}

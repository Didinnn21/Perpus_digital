<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Member;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $totalBuku = Buku::count();
        $totalAnggota = Member::count();
        $anggotaMeminjam = Peminjaman::whereNull('tanggal_pengembalian')
            ->distinct('member_id')
            ->count('member_id');

        $tahunList = Peminjaman::selectRaw('YEAR(tanggal_pinjam) as tahun')
            ->distinct()
            ->pluck('tahun');

        $peminjamanPerBulan = Peminjaman::selectRaw('MONTH(tanggal_pinjam) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_pinjam', $tahun)
            ->groupByRaw('MONTH(tanggal_pinjam)')
            ->pluck('total', 'bulan')
            ->toArray();

        // Normalize semua bulan agar tidak kosong
        $grafikData = [];
        for ($i = 1; $i <= 12; $i++) {
            $grafikData[] = $peminjamanPerBulan[$i] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'anggotaMeminjam',
            'grafikData',
            'tahun',
            'tahunList'
        ));
    
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

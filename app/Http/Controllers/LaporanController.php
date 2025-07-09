<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Carbon\Carbon;


class LaporanController extends Controller
{
 public function index(Request $request)
{
    $bulan = $request->input('bulan', now()->month);
    $tahun = $request->input('tahun', now()->year);

    // Total buku berdasarkan bulan dan tahun
    $totalBuku = Buku::whereMonth('created_at', $bulan)
                     ->whereYear('created_at', $tahun)
                     ->count();

    $totalAnggota = Member::count();

    // Jumlah anggota yang sedang meminjam pada bulan & tahun
    $anggotaMeminjam = Peminjaman::whereNull('tanggal_pengembalian')
                                 ->whereMonth('tanggal_pinjam', $bulan)
                                 ->whereYear('tanggal_pinjam', $tahun)
                                 ->distinct('member_id')
                                 ->count('member_id');

    // Jumlah buku yang sedang dipinjam bulan & tahun
    $bukuDipinjam = Peminjaman::whereNull('tanggal_pengembalian')
                              ->whereMonth('tanggal_pinjam', $bulan)
                              ->whereYear('tanggal_pinjam', $tahun)
                              ->count();

    return view('admin.laporan.index', compact(
        'totalBuku',
        'totalAnggota',
        'anggotaMeminjam',
        'bukuDipinjam',
        'bulan',
        'tahun'
    ));
}

    public function cetak(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);

        // Ubah angka ke nama bulan
        $namaBulan = Carbon::createFromDate($tahun, $bulan)->translatedFormat('F');

        $jumlahBukuBulanIni = Buku::whereMonth('created_at', $bulan)
                                  ->whereYear('created_at', $tahun)
                                  ->count();

        $anggotaAktif = Peminjaman::whereMonth('tanggal_pinjam', $bulan)
                                  ->whereYear('tanggal_pinjam', $tahun)
                                  ->distinct('member_id')
                                  ->count('member_id');

        // Hanya buku yang belum dikembalikan (masih dipinjam)
        $jumlahBukuDipinjam = Peminjaman::whereNull('tanggal_pengembalian')->count();

        return view('admin.laporan.cetak', compact(
            'jumlahBukuBulanIni',
            'anggotaAktif',
            'jumlahBukuDipinjam',
            'bulan',
            'namaBulan',
            'tahun'
        ));
    }
}

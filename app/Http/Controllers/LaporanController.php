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

        $totalBuku = Buku::whereMonth('created_at', $bulan)
                         ->whereYear('created_at', $tahun)
                         ->count();

        $totalAnggota = Member::count();

        $anggotaMeminjam = Peminjaman::whereNull('tanggal_pengembalian')
                                     ->whereMonth('tanggal_pinjam', $bulan)
                                     ->whereYear('tanggal_pinjam', $tahun)
                                     ->distinct('member_id')
                                     ->count('member_id');

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
        $namaBulan = Carbon::createFromDate($tahun, $bulan)->translatedFormat('F');

        $jumlahBukuBulanIni = Buku::whereMonth('created_at', $bulan)
                                  ->whereYear('created_at', $tahun)
                                  ->count();

        $anggotaAktif = Peminjaman::whereMonth('tanggal_pinjam', $bulan)
                                  ->whereYear('tanggal_pinjam', $tahun)
                                  ->distinct('member_id')
                                  ->count('member_id');

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

    public function denda()
{
    // Ambil semua member yang punya peminjaman dengan denda > 0
    $members = Member::whereHas('peminjamans', function ($query) {
        $query->where('denda', '>', 0); // HAPUS whereNull('tanggal_pengembalian')
    })->with(['peminjamans' => function ($query) {
        $query->where('denda', '>', 0); // HAPUS whereNull('tanggal_pengembalian')
    }, 'peminjamans.buku'])->get();

    return view('admin.laporan.denda', compact('members'));
}

    public function formBayarDenda($id)
{
    $member = Member::where('id', $id)
        ->with(['peminjamans' => function ($query) {
            $query->where('denda', '>', 0); // Tampilkan semua yang punya denda, baik sudah atau belum dikembalikan
        }, 'peminjamans.buku'])->firstOrFail();

    return view('admin.laporan.form_bayar_denda', compact('member'));
}

   public function prosesBayarDenda(Request $request, $id)
{
    $member = Member::findOrFail($id);

    // Lunasi semua denda, termasuk yang sudah dikembalikan
    Peminjaman::where('member_id', $member->id)
        ->where('denda', '>', 0)
        ->update(['denda' => 0]);

    return redirect()->route('admin.laporan.denda')->with('success', 'Denda berhasil dilunasi.');
}
}

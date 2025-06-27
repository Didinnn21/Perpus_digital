<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanbukuController extends Controller
{
    // Menampilkan daftar buku yang bisa dipinjam
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bukus = Buku::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('penulis', 'like', '%' . $search . '%');
        })->get();

        return view('peminjamanbuku.index', compact('bukus'));
    }

    // Menampilkan form peminjaman
    public function create(Request $request)
    {
        $buku_id = $request->input('buku_id');
        $buku = Buku::find($buku_id);

        if (!$buku || $buku->status === 'dipinjam') {
            return redirect()->route('peminjamanbuku.index')->with('failed', 'Buku tidak tersedia.');
        }

        $member = Member::where('email', Auth::user()->email)->first();

        return view('peminjamanbuku.create', compact('buku', 'member'));
    }

    // Menyimpan data peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'member_id' => 'required|exists:members,id',
            'tanggal_kembali' => 'required|date',
        ]);

        $buku = Buku::find($request->buku_id);

        if ($buku->status === 'dipinjam') {
            return redirect()->back()->with('failed', 'Buku sedang dipinjam.');
        }

        Peminjaman::create([
            'buku_id' => $buku->id,
            'member_id' => $request->member_id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $buku->update(['status' => 'dipinjam']);

        return redirect()->route('peminjamanbuku.index')->with('success', 'Buku berhasil dipinjam.');
    }

    // Menampilkan daftar buku yang sedang dipinjam
    public function pengembalianIndex()
    {
        $member = Member::where('email', Auth::user()->email)->first();

        $peminjamans = Peminjaman::with('buku')
            ->where('member_id', $member->id)
            ->whereNull('tanggal_pengembalian')
            ->get();

        return view('pengembalianbuku.index', compact('peminjamans'));
    }

    // Menampilkan form pengembalian
    public function formPengembalian($id)
    {
        $peminjaman = Peminjaman::with('buku', 'member')->findOrFail($id);

        if ($peminjaman->tanggal_pengembalian !== null) {
            return redirect()->back()->with('failed', 'Buku sudah dikembalikan.');
        }

        return view('pengembalianbuku.from', compact('peminjaman'));
    }

    // Mengembalikan buku
    public function kembalikan(Request $request, $id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        if ($peminjaman->tanggal_pengembalian !== null) {
            return redirect()->back()->with('failed', 'Buku sudah dikembalikan.');
        }

        $jatuhTempo = Carbon::parse($peminjaman->tanggal_kembali);
        $hariTerlambat = now()->diffInDays($jatuhTempo, false);
        $denda = $hariTerlambat < 0 ? abs($hariTerlambat) * 1000 : 0;

        $peminjaman->update([
            'tanggal_pengembalian' => now(),
            'denda' => $denda
        ]);

        $peminjaman->buku->update(['status' => 'tersedia']);

        return redirect()->route('peminjamanbuku.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanbukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bukus = Buku::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('penulis', 'like', '%' . $search . '%');
        })->get();

        return view('peminjamanbuku.index', compact('bukus'));
    }

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

    // Ganti status dan simpan
    $buku->status = 'dipinjam';
    $buku->save();

    return redirect()->route('peminjamanbuku.index')->with('success', 'Buku berhasil dipinjam.');
}
}

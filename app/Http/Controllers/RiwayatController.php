<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'desc'); // default: terbaru

        // Ambil member yang sedang login
        $member = Member::where('email', Auth::user()->email)->first();

        // Ambil data riwayat peminjaman
        $riwayats = Peminjaman::with('buku')
            ->where('member_id', $member->id)
            ->when($search, function ($query, $search) {
                $query->whereHas('buku', function ($q) use ($search) {
                    $q->where('judul', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('tanggal_pinjam', $sort)
            ->get();

        return view('riwayat.index', compact('riwayats'));
    }
}

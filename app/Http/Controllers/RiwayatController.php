<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil member yang sedang login
        $member = Member::where('email', Auth::user()->email)->first();

        // Ambil data riwayat peminjaman (yang sudah dikembalikan)
        $riwayats = Peminjaman::with('buku')
            ->where('member_id', $member->id)
            ->whereNotNull('tanggal_pengembalian')
            ->orderByDesc('tanggal_pengembalian')
            ->get();

        return view('riwayat.index', compact('riwayats'));
    }
}

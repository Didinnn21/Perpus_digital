@extends('layouts.main')

@section('main-banner')
{{-- <div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Form Pengembalian Buku</p>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('features')
<div class="container bg-white p-4 rounded shadow-sm mt-4 mb-5">
    <h3 class="mb-4 text-dark">Form Pengembalian Buku</h3>

    @if(session('failed'))
        <div class="alert alert-danger">{{ session('failed') }}</div>
    @endif

    <form action="{{ route('pengembalianbuku.kembalikan', $peminjaman->id) }}" method="POST">
        @csrf

        {{-- Informasi Buku --}}
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" value="{{ $peminjaman->buku->judul }}" readonly>
        </div>

        {{-- Informasi Member --}}
        <div class="form-group">
            <label>Nama Member</label>
            <input type="text" class="form-control" value="{{ $peminjaman->member->nama }}" readonly>
        </div>

        {{-- Tanggal Pinjam & Kembali --}}
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="text" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Kembali (Jatuh Tempo)</label>
            <input type="text" class="form-control" value="{{ $peminjaman->tanggal_kembali }}" readonly>
        </div>

        {{-- Tanggal Pengembalian Hari Ini --}}
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="text" class="form-control" value="{{ now()->toDateString() }}" readonly>
        </div>

        {{-- Denda --}}
        @php
            $today = \Carbon\Carbon::now();
            $kembali = \Carbon\Carbon::parse($peminjaman->tanggal_kembali);
            $selisih = $today->diffInDays($kembali, false);
            $dendaPerHari = 1000;
            $denda = $selisih > 0 ? 0 : abs($selisih) * $dendaPerHari;
        @endphp

        <div class="form-group">
            <label>Denda</label>
            <input type="text" class="form-control" value="Rp {{ number_format($denda, 0, ',', '.') }}" readonly>
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('pengembalianbuku.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Konfirmasi Pengembalian</button>
        </div>
    </form>
</div>
@endsection

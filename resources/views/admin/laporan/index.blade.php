@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Laporan Perpustakaan</h2>

    {{-- Filter --}}
    <form method="GET" action="{{ route('admin.laporan.index') }}" class="mb-4 text-center">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <select name="bulan" class="form-control">
                    @foreach (range(1, 12) as $bln)
                        <option value="{{ $bln }}" {{ $bln == $bulan ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $bln)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="tahun" class="form-control">
                    @for ($i = now()->year; $i >= 2020; $i--)
                        <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>
        </div>
    </form>

    {{-- Laporan Statistik --}}
    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Total Buku</h5>
                    <h2>{{ $totalBuku }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Total Anggota</h5>
                    <h2>{{ $totalAnggota }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Anggota Meminjam</h5>
                    <h2>{{ $anggotaMeminjam }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Buku Sedang Dipinjam</h5>
                    <h2>{{ $bukuDipinjam }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol Cetak --}}
    <div class="text-center mt-4">
        <a href="{{ route('admin.laporan.cetak', ['bulan' => $bulan, 'tahun' => $tahun]) }}" target="_blank" class="btn btn-danger">
            Cetak Laporan
        </a>
    </div>
</div>
@endsection

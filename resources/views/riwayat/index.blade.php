@extends('layouts.main')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Riwayat Peminjaman Buku</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
<div class="container bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-dark">Riwayat Peminjaman Buku Anda</h3>

    @if($riwayats->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $riwayat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $riwayat->buku->judul }}</td>
                            <td>{{ $riwayat->tanggal_pinjam }}</td>
                            <td>{{ $riwayat->tanggal_kembali }}</td>
                            <td>{{ $riwayat->tanggal_pengembalian }}</td>
                            <td>Rp {{ number_format($riwayat->denda, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Belum ada riwayat peminjaman.</div>
    @endif
</div>
@endsection

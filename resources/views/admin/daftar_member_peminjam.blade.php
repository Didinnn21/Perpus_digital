@extends('layouts.main')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Daftar Member yang Sedang Meminjam Buku</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
<div class="container bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-dark">Daftar Member yang Sedang Meminjam Buku</h3>

    @if($peminjamans->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Email</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamans as $index => $peminjaman)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $peminjaman->member->nama }}</td>
                            <td>{{ $peminjaman->member->email }}</td>
                            <td>{{ $peminjaman->buku->judul }}</td>
                            <td>{{ $peminjaman->tanggal_pinjam }}</td>
                            <td>{{ $peminjaman->tanggal_kembali }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Tidak ada member yang sedang meminjam buku.</div>
    @endif
</div>
@endsection

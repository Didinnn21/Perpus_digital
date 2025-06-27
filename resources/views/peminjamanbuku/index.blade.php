@extends('layouts.main')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Daftar Peminjaman Buku</p>

                <div class="search-input">
                    <form id="search" action="{{ route('peminjamanbuku.index') }}" method="GET">
                        <input type="text" placeholder="Cari berdasarkan judul" id="searchText" name="search" value="{{ request('search') }}" />
                        <button type="submit">Search Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
<div class="container bg-white p-4 rounded shadow-sm">
    <h3 class="mb-3 text-dark">Daftar Buku untuk Dipinjam</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bukus->count())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukus as $buku)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $buku->id }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>
                                @if($buku->status === 'tersedia')
                                    <span class="badge bg-success text-white">Tersedia</span>
                                @else
                                    <span class="badge bg-secondary text-white">Dipinjam</span>
                                @endif
                            </td>
                            <td>
                                @if($buku->status === 'tersedia')
                                   <a href="{{ route('peminjamanbuku.create', ['buku_id' => $buku->id]) }}" class="btn btn-success btn-sm">
                                        Pinjam Sekarang
                                   </a>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Dipinjam</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Tidak ada buku tersedia untuk dipinjam.</div>
    @endif
</div>
@endsection

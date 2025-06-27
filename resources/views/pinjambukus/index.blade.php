@extends('layouts.main')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Daftar Buku</p>
                <div class="search-input">
                    <form id="search" action="{{ route('admin.bukus.index') }}" method="GET">
                        <input type="text" placeholder="Cari judul atau penulis" id="searchText" name="search" value="{{ request('search') }}" />
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
    <h3 class="mb-3 text-dark">Daftar Buku</h3>

    @if(request('search'))
        <p class="text-muted">Hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
    @endif

    @if($bukus->count())
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
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
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->kategori }}</td>
                            <td>
                                @php
                                    $isDipinjam = $buku->peminjamans()->where('status', 'dipinjam')->exists();
                                @endphp
                                <span class="badge {{ $isDipinjam ? 'bg-danger' : 'bg-success' }}">
                                    {{ $isDipinjam ? 'Dipinjam' : 'Tersedia' }}
                                </span>
                            </td>
                           // <td>//
                                <form action="{{ route('peminjaman.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                    <input type="hidden" name="member_id" value="{{ Auth::id() }}">
                                    <button type="submit" class="btn btn-sm btn-primary" {{ $isDipinjam ? 'disabled' : '' }}>
                                        Pinjam
                                    </button>
                                </form>
                            //</td>//
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            @if(request('search'))
                Tidak ada hasil untuk pencarian "<strong>{{ request('search') }}</strong>".
            @else
                Tidak ada buku yang tersedia.
            @endif
        </div>
    @endif
</div>
@endsection

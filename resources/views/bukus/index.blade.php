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
                            <input type="text" placeholder="Type Something" id="searchText" name="search" value="{{ request('search') }}" />
                            <button type="submit">Search Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('features')
    {{-- Tombol Tambah Buku --}}

    {{-- Kotak daftar buku --}}
    <div class="container bg-white p-4 rounded shadow-sm">
        <h3 class="mb-3 text-dark">Daftar Buku</h3>

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
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $index => $buku)
                            <tr>
                                <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                                <td>{{ $buku->id }}</td>        {{-- ID asli dari database --}}
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                                <td>{{ $buku->kategori }}</td>
                                <td>
                                    <a href="{{ route('admin.bukus.edit', $buku->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.bukus.destroy', $buku->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Tidak ada buku yang tersedia.</p>
        @endif
    </div>
    <div class="container mt-4 mb-2">
        <a href="{{ route('admin.bukus.create') }}"
           class="btn"
           style="background-color: blue; color: white; border: 2px solid green;">
            + Tambah Buku
        </a>
    </div>
@endsection

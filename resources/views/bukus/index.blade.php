@extends('layouts.main')

@include('layouts.header')

@section('main-banner')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Welcome In</h6>
                    <h2>LIBRARY!</h2>
                    <p>Daftar Buku</p>
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" />
                            <button role="button">Search Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('features')
    {{-- Tombol Tambah Buku --}}
    <div class="container mt-4 mb-2">
        <a href="{{ route('bukus.create') }}"
           class="btn"
           style="background-color: green; color: white; border: 2px solid green;">
            + Tambah Buku
        </a>
    </div>

    {{-- Kotak daftar buku --}}
    <div class="container bg-white p-4 rounded shadow-sm">
        <h3 class="mb-3 text-dark">Daftar Buku</h3>

        @if($bukus->count())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukus as $buku)
                            <tr>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Tidak ada buku yang tersedia.</p>
        @endif
    </div>
@endsection

@extends('layouts.main')

@section('main-banner')
<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Welcome In</h6>
                    <h2>LIBRARY!</h2>
                    <p>Form Tambah Buku</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
    <div class="container bg-white p-4 rounded shadow-sm mt-4 mb-5">
        <h3 class="mb-4 text-dark">Form Tambah Buku</h3>

        <form action="{{ route('admin.bukus.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku">
                @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan nama penulis">
                @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit">
                @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori buku">
                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan tahun terbit">
                @error('tahun_terbit') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.bukus.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection

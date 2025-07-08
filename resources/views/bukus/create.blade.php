@extends('layouts.main')

@section('features')
    <div class="container bg-white p-4 rounded shadow-sm mt-5 mb-5">
        <h3 class="mb-4 text-dark">Form Tambah Buku</h3>

        {{-- PERUBAHAN 1: Menambahkan enctype untuk upload file --}}
        <form action="{{ route('admin.bukus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                    placeholder="Masukkan judul buku" required>
                @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}"
                    placeholder="Masukkan nama penulis" required>
                @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}"
                    placeholder="Masukkan nama penerbit" required>
                @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}"
                    placeholder="Masukkan kategori buku" required>
                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit"
                    value="{{ old('tahun_terbit') }}" placeholder="Masukkan tahun terbit" required>
                @error('tahun_terbit') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- PERUBAHAN 2: Menambahkan input untuk unggah gambar --}}
            <div class="form-group mt-3">
                <label for="gambar" class="form-label">Gambar Sampul</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
                @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            {{-- AKHIR BAGIAN GAMBAR --}}


            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.bukus.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.main')
@include('layouts.header')

@section('main-banner')
<div class="container">
  <div class="row">
    <div class="col-lg-6 align-self-center">
      <div class="caption header-text">
        <h6>Welcome In</h6>
        <h2>LIBRARY!</h2>
        <p>Edit Buku</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="content-wrapper" style="margin-top: 40px">
  <section class="content">
    <div class="container-fluid">
      <h4 class="mb-4 text-center">Edit Data Buku</h4>

      <form action="{{ route('admin.bukus.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card card-primary">
              <div class="card-header bg-success">
                <h3 class="card-title text-white">Form Edit Buku</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
                  @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <label for="penulis">Penulis</label>
                  <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                  @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <label for="penerbit">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                  @error('penerbit') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <label for="penerbit">Kategori</label>
                  <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $buku->kategori) }}" required>
                  @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <label for="tahun_terbit">Tahun Terbit</label>
                  <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                  @error('tahun_terbit') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              </div>

              <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.bukus.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn" style="background-color: green; color: white;">Update</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection

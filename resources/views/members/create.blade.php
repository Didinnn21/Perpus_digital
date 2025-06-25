@extends('layouts.main')

@include('layouts.header')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Form Tambah Member</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content-wrapper" style="margin-top: 40px">
    <section class="content">
        <div class="container-fluid">
            <h4 class="mb-4 text-center">Tambah Data Member</h4>

            <form action="{{ route('admin.members.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header bg-success">
                                <h3 class="card-title text-white">Form Tambah Member</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap">
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomer_telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomer_telepon" name="nomer_telepon" placeholder="08xxxxxxxxxx">
                                    @error('nomer_telepon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="role">Pilih Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="">-- Pilih Role --</option>
                                        <option value="admin">Admin</option>
                                        <option value="member">Member</option>
                                        <option value="guest">Guest</option>
                                    </select>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn" style="background-color: green; color: white;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

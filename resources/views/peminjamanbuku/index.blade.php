@extends('layouts.main')

@section('main-banner')
<div class="container">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="caption header-text">
                <h6>Welcome In</h6>
                <h2>LIBRARY!</h2>
                <p>Daftar Buku yang Tersedia untuk Dipinjam</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('features')
<div class="container bg-white p-4 rounded shadow-sm">
    <h3 class="mb-3 text-dark">Daftar Buku</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter & Search -->
    <form action="{{ route('peminjamanbuku.index') }}" method="GET" class="row mb-3 g-2">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari judul, penulis, tahun..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="">Urutkan Judul</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A - Z</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z - A</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Terapkan</button>
        </div>
        <div class="col-md-3">
            @if(request('search') || request('sort'))
                <a href="{{ route('peminjamanbuku.index') }}" class="btn btn-secondary w-100">Reset Filter</a>
            @endif
        </div>
    </form>

    <!-- Tabel Buku -->
    @if($bukus->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Buku</th>
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
                            <td>{{ ($bukus->currentPage() - 1) * $bukus->perPage() + $loop->iteration }}</td>
                            <td>{{ $buku->id }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->kategori }}</td>
                            <td>
                                <span class="badge {{ $buku->status === 'tersedia' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($buku->status) }}
                                </span>
                            </td>
                            <td>
                                @if($buku->status === 'tersedia')
                                    <a href="{{ route('peminjamanbuku.create', ['buku_id' => $buku->id]) }}" class="btn btn-sm btn-primary">Pinjam</a>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Dipinjam</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- PAGINATION TANPA PANAH -->
        <div class="d-flex justify-content-center mt-4">
            @if ($bukus->lastPage() > 1)
                <nav>
                    <ul class="pagination">
                        @for ($i = 1; $i <= $bukus->lastPage(); $i++)
                            <li class="page-item {{ $i == $bukus->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </nav>
            @endif
        </div>
    @else
        <div class="alert alert-info">
            Tidak ada buku yang tersedia{{ request('search') ? ' untuk "' . request('search') . '"' : '' }}.
        </div>
    @endif
</div>
@endsection

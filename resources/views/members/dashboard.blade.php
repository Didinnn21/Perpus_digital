@extends('layouts.main')

@section('main-banner')
@endsection

@section('statistik')
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2 h-100">
                <div class="card-body">
                    <h5>Total Koleksi Buku</h5>
                    <h2>{{ $totalBuku }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2 h-100">
                <div class="card-body">
                    <h5>Buku Sedang Anda Pinjam</h5>
                    <h2>{{ $bukuDipinjam }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2 h-100">
                <div class="card-body">
                    <h5>Total Denda Anda</h5>
                    <h2>Rp {{ number_format($dendaUser, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container my-5">
    <h4 class="text-center mb-4">Buku yang Sedang Anda Pinjam</h4>

    @if(isset($bukuDipinjamList) && $bukuDipinjamList->count() > 0)
        <div class="row">
            @foreach($bukuDipinjamList as $peminjaman)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="position-relative">
                            @if($peminjaman->buku->gambar)
                                <img src="{{ asset('storage/' . $peminjaman->buku->gambar) }}"
                                     class="card-img-top"
                                     alt="{{ $peminjaman->buku->judul }}"
                                     style="width: 100%; height: auto; object-fit: contain; aspect-ratio: 3/4; background-color: #f8f9fa;">
                            @else
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="fas fa-book text-white fa-3x"></i>
                                </div>
                            @endif

                            @if($peminjaman->status == 'dipinjam')
                                <span class="badge bg-warning position-absolute top-0 end-0 m-2">Dipinjam</span>
                            @elseif($peminjaman->status == 'terlambat')
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Terlambat</span>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $peminjaman->buku->judul }}</h5>
                            <div class="mt-auto">
                                <small class="text-muted">
                                    <strong>Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d/m/Y') }}<br>
                                    <strong>Batas Kembali:</strong> {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d/m/Y') }}
                                </small>

                                @if($peminjaman->denda > 0)
                                    <div class="alert alert-danger mt-2 p-2">
                                        <small><strong>Denda:</strong> Rp {{ number_format($peminjaman->denda, 0, ',', '.') }}</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Anda tidak sedang meminjam buku apapun.
            </div>
        </div>
    @endif
</div>

@endsection

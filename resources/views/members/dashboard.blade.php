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
        <h3 class="text-center mb-2">Pilih dan Pinjam Buku</h3>
        <p class="text-center text-muted mb-4">Jelajahi koleksi buku yang tersedia di perpustakaan kami.</p>

        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form method="GET" action="{{ url('/member/dashboard') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul atau penulis..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        @if($daftarBuku->count() > 0)
            <div class="row">
                @foreach($daftarBuku as $buku)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card shadow-sm h-100">
                            @if($buku->gambar)
                                <img src="{{ asset('storage/' . $buku->gambar) }}"
                                     class="card-img-top"
                                     alt="{{ $buku->judul }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center"
                                     style="height: 200px;">
                                    <i class="fas fa-book-open text-white fa-3x"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-bold">{{ Str::limit($buku->judul, 45) }}</h6>
                                <p class="card-text small text-muted">{{ $buku->penulis }}</p>
                                <div class="mt-auto text-center">
                                    <a href="{{ route('peminjamanbuku.create', ['buku_id' => $buku->id]) }}" class="btn btn-sm btn-primary w-100">Lihat
                                        Detail & Pinjam</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $daftarBuku->links() }}
            </div>
        @else
            <div class="text-center">
                <div class="alert alert-warning">
                    <i class="fas fa-search me-2"></i>
                    Buku yang Anda cari tidak ditemukan.
                </div>
            </div>
        @endif
    </div>


    <div class="container my-5">
        <h4 class="text-center mb-4">Buku yang Sedang Anda Pinjam</h4>

        @if(isset($bukuDipinjamList) && $bukuDipinjamList->count() > 0)
            <div class="row">
                @foreach($bukuDipinjamList as $peminjaman)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="position-relative">
                                @if($peminjaman->buku->gambar)
                                    <img src="{{ asset('storage/' . $peminjaman->buku->gambar) }}" class="card-img-top" alt="{{ $peminjaman->buku->judul }}" style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;"><i class="fas fa-book text-white fa-3x"></i></div>
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
                                        <div class="alert alert-danger mt-2 p-2"><small><strong>Denda:</strong> Rp {{ number_format($peminjaman->denda, 0, ',', '.') }}</small></div>
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

@section('scripts')

@endsection

@extends('layouts.main')

@section('main-banner')
@endsection

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-2">Pilih dan Pinjam Buku</h3>
    <p class="text-center text-muted mb-4">Jelajahi koleksi buku yang tersedia di perpustakaan kami.</p>

    <!-- Form pencarian -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('peminjamanbuku.index') }}">
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
                            <img src="{{ asset('storage/' . $buku->gambar) }}" class="card-img-top" alt="{{ $buku->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-book-open text-white fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold">{{ Str::limit($buku->judul, 45) }}</h6>
                            <p class="card-text small text-muted">{{ $buku->penulis }}</p>
                            <p class="small"><span class="badge bg-info text-dark">{{ $buku->kategori }}</span></p>
                            <div class="mt-auto text-center">
                                <a href="{{ route('peminjamanbuku.create', ['buku_id' => $buku->id]) }}" class="btn btn-sm btn-primary w-100">Pinjam</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $daftarBuku->links() }}
        </div>
    @else
        <div class="text-center">
            <div class="alert alert-warning">
                Buku yang Anda cari tidak ditemukan.
            </div>
        </div>
    @endif
</div>
@endsection

@extends('layouts.main')

@section('main-banner')

@section('statistik')
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Total Buku</h5>
                    <h2>{{ $totalBuku }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Buku Dipinjam</h5>
                    <h2>{{ $bukuDipinjam }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Total Denda</h5>
                    <h2>Rp {{ number_format($dendaUser, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Daftar Buku yang Dipinjam -->
<div class="container my-5">
    <h4 class="text-center mb-4">Buku yang Sedang Dipinjam</h4>

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
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center"
                                     style="height: 200px;">
                                    <i class="fas fa-book text-white fa-3x"></i>
                                </div>
                            @endif

                            <!-- Status Badge -->
                            @if($peminjaman->status == 'dipinjam')
                                <span class="badge bg-warning position-absolute top-0 end-0 m-2">Dipinjam</span>
                            @elseif($peminjaman->status == 'terlambat')
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Terlambat</span>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $peminjaman->buku->judul }}</h5>
                            <p class="card-text">
                                <strong>Penulis:</strong> {{ $peminjaman->buku->penulis }}<br>
                                <strong>Penerbit:</strong> {{ $peminjaman->buku->penerbit }}<br>
                                <strong>Tahun:</strong> {{ $peminjaman->buku->tahun_terbit }}<br>
                                <strong>ISBN:</strong> {{ $peminjaman->buku->isbn }}
                            </p>

                            <div class="mt-auto">
                                <small class="text-muted">
                                    <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_peminjaman->format('d/m/Y') }}<br>
                                    <strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_pengembalian->format('d/m/Y') }}
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
                Anda belum meminjam buku apapun.
            </div>
        </div>
    @endif
</div>

<!-- Riwayat Peminjaman -->
<div class="container my-5">
    <h4 class="text-center mb-4">Riwayat Peminjaman</h4>

    @if(isset($riwayatPeminjaman) && $riwayatPeminjaman->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayatPeminjaman as $riwayat)
                        <tr>
                            <td>
                                @if($riwayat->buku->gambar)
                                    <img src="{{ asset('storage/' . $riwayat->buku->gambar) }}"
                                         alt="{{ $riwayat->buku->judul }}"
                                         class="img-thumbnail"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary d-flex align-items-center justify-content-center"
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-book text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $riwayat->buku->judul }}</td>
                            <td>{{ $riwayat->buku->penulis }}</td>
                            <td>{{ $riwayat->tanggal_peminjaman->format('d/m/Y') }}</td>
                            <td>{{ $riwayat->tanggal_pengembalian->format('d/m/Y') }}</td>
                            <td>
                                @if($riwayat->status == 'dikembalikan')
                                    <span class="badge bg-success">Dikembalikan</span>
                                @elseif($riwayat->status == 'dipinjam')
                                    <span class="badge bg-warning">Dipinjam</span>
                                @else
                                    <span class="badge bg-danger">Terlambat</span>
                                @endif
                            </td>
                            <td>
                                @if($riwayat->denda > 0)
                                    <span class="text-danger">Rp {{ number_format($riwayat->denda, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-success">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(method_exists($riwayatPeminjaman, 'links'))
            <div class="d-flex justify-content-center">
                {{ $riwayatPeminjaman->links() }}
            </div>
        @endif
    @else
        <div class="text-center">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada riwayat peminjaman.
            </div>
        </div>
    @endif
</div>

<!-- Grafik Peminjaman -->
<div class="container my-5">
    <h4 class="text-center mb-4">Grafik Peminjaman Buku per Bulan ({{ $tahun }})</h4>

    <form method="GET" class="mb-4 d-flex justify-content-center">
        <select name="tahun" class="form-select w-auto me-2" onchange="this.form.submit()">
            @foreach ($tahunList as $thn)
                <option value="{{ $thn }}" {{ $thn == $tahun ? 'selected' : '' }}>{{ $thn }}</option>
            @endforeach
        </select>
    </form>

    <canvas id="grafikPeminjaman" height="100"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPeminjaman').getContext('2d');
    const grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Buku Dipinjam',
                data: @json($grafikData),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection

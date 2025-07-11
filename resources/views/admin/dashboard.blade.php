@extends('layouts.main')

@section('statistik')
<div class="container mb-5" style="margin-top: 150px;"> {{-- <--- Jarak dari navbar --}}
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow border border-2">
                <div class="card-body">
                    <h5>Total Anggota</h5>
                    <h2>{{ $totalAnggota }}</h2>
                </div>
            </div>
        </div>
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
                    <h5>Sedang Meminjam</h5>
                    <h2>{{ $anggotaMeminjam }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
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
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ],
            datasets: [{
                label: 'Jumlah Peminjaman',
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
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection

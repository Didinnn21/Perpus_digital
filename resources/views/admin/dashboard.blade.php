@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Sidebar -->
                            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                                <div class="position-sticky pt-3">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('images/admin-avatar.png') }}" class="rounded-circle" width="80" height="80"
                                            alt="Admin">
                                        <h6 class="mt-2">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">Administrator</small>
                                    </div>

                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-tachometer-alt"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.books') }}">
                                                <i class="fas fa-book"></i> Kelola Buku
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.members') }}">
                                                <i class="fas fa-users"></i> Kelola Member
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.transactions') }}">
                                                <i class="fas fa-exchange-alt"></i> Transaksi Peminjaman
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.categories') }}">
                                                <i class="fas fa-tags"></i> Kategori
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.reports') }}">
                                                <i class="fas fa-chart-bar"></i> Laporan
                                            </a>
                                        </li>
                                    </ul>

                                    <hr>
                                    <ul class="nav flex-column mb-2">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.settings') }}">
                                                <i class="fas fa-cog"></i> Pengaturan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main content -->
                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                                <div
                                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2">Dashboard Admin</h1>
                                    <div class="btn-toolbar mb-2 mb-md-0">
                                        <div class="btn-group me-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            <!-- Statistics Cards -->
                            <div class="row mb-4">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Buku
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks ?? 0 }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Member
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMembers ?? 0 }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Buku Dipinjam
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $borrowedBooks ?? 0 }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-hand-holding fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Terlambat
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $overdueBooks ?? 0 }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activity & Quick Actions -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <th>Member</th>
                                                            <th>Buku</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($recentActivities ?? [] as $activity)
                                                            <tr>
                                                                <td>{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                                                                <td>{{ $activity->member->name }}</td>
                                                                <td>{{ $activity->book->title }}</td>
                                                                <td>
                                                                    @if($activity->type == 'borrow')
                                                                        <span class="badge bg-success">Dipinjam</span>
                                                                    @else
                                                                        <span class="badge bg-info">Dikembalikan</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center text-muted">Belum ada aktivitas</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Tambah Buku Baru
                                            </a>
                                            <a href="{{ route('admin.members.create') }}" class="btn btn-success">
                                                <i class="fas fa-user-plus"></i> Daftar Member Baru
                                            </a>
                                            <a href="{{ route('admin.transactions.create') }}" class="btn btn-info">
                                                <i class="fas fa-book-reader"></i> Proses Peminjaman
                                            </a>
                                            <a href="{{ route('admin.returns.create') }}" class="btn btn-warning">
                                                <i class="fas fa-undo"></i> Proses Pengembalian
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Buku Populer</h6>
                                    </div>
                                    <div class="card-body">
                                        @forelse($popularBooks ?? [] as $book)
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ $book->cover_image ?? asset('images/default-book.png') }}" class="rounded" width="40"
                                                    height="60" alt="Book Cover">
                                                <div class="ms-3">
                                                    <h6 class="mb-0">{{ $book->title }}</h6>
                                                    <small class="text-muted">{{ $book->author }}</small>
                                                    <div>
                                                        <small class="text-success">{{ $book->borrow_count }} kali dipinjam</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted text-center">Belum ada data</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <style>
                .border-left-primary {
                    border-left: 0.25rem solid #4e73df !important;
                }
                .border-left-success {
                    border-left: 0.25rem solid #1cc88a !important;
                }
                .border-left-info {
                    border-left: 0.25rem solid #36b9cc !important;
                }
                .border-left-warning {
                    border-left: 0.25rem solid #f6c23e !important;
                }

                .sidebar {
                    position: fixed;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 100;
                    padding: 48px 0 0;
                    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
                }
                .sidebar .nav-link{
                    font-weight: 500;
                    color: #333;
                    padding: 10px 15px;
                }
                .sidebar .nav-link.active {
                    color: #007bff;
                    background-color: rgba(0, 123, 255, .1);
                }
                .sidebar .nav-link:hover {
                    color: #007bff;
                }
            </style>
@endsection

@php
    $user = Auth::guard('member')->user();
@endphp

<style>
    /* Reset margin dan padding untuk body */
    body {
        margin: 0;
        padding: 0;
        padding-top: 120px;
        /* Sesuaikan dengan tinggi navbar */
    }

    @media (max-width: 768px) {
        body {
            padding-top: 100px;
            /* Sesuaikan dengan tinggi navbar mobile */
        }
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        /* Tambahkan ini */
        width: 100%;
        z-index: 1030;
        padding: 10px 40px;
        background-color: #007bff;
<<<<<<< HEAD
        height: 120px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        /* Tambahkan ini */
=======
        height: 100px; /* Tinggi tetap navbar */
>>>>>>> b4a2826c571e866431bf2dbc837bd4efa3d4c9df
    }

    @media (max-width: 768px) {
        .navbar {
            height: 100px;
            padding: 20px;
        }
    }

    .logo img {
        width: 158px;
        transition: transform 0.3s ease;
        /* Perbaiki typo */
    }

    .logo img:hover {
        transform: scale(1.05);
        /* Perbaiki syntax */
    }

    .nav-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 500;
<<<<<<< HEAD
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
=======
        position: relative;
        padding-bottom: 4px;
>>>>>>> b4a2826c571e866431bf2dbc837bd4efa3d4c9df
    }

    .nav-links a:hover {
        text-decoration: underline;
    }

    .nav-links a.active {
        font-weight: bold;
        border-bottom: 2px solid white;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        background-color: #555;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
    }

    .username {
        color: white;
        font-weight: 500;
    }

    .logout-link {
        color: white;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
        border: 1px solid white;
        padding: 5px 10px;
        border-radius: 5px;
        transition: 0.2s ease-in-out;
    }

    .logout-link:hover {
        background-color: white;
        color: #007bff;
    }

    /* Pastikan konten utama tidak tertimpa navbar */
    .main-content {
        position: relative;
        z-index: 1;
    }
</style>

<header>
    <nav class="navbar">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ $user && $user->hasRole('admin') ? route('admin.dashboard') : route('member.dashboard') }}">
                <img src="{{ asset('template/images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Menu -->
        <div class="nav-links">
            @if ($user && $user->hasRole('admin'))
<<<<<<< HEAD
                <a href="{{ route('admin.dashboard') }}">Beranda</a>
                <a href="{{ route('admin.bukus.index') }}">Manajemen Buku</a>
                <a href="{{ route('admin.members.index') }}">Manajemen Anggota</a>
                <a href="{{ route('admin.daftar.peminjam') }}">Daftar Peminjaman</a>
=======
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('admin.bukus.index') }}" class="{{ Request::routeIs('admin.bukus.*') ? 'active' : '' }}">Kelola Buku</a>
                <a href="{{ route('admin.members.index') }}" class="{{ Request::routeIs('admin.members.*') ? 'active' : '' }}">Kelola Anggota</a>
                <a href="{{ route('admin.daftar.peminjam') }}" class="{{ Request::routeIs('admin.daftar.peminjam') ? 'active' : '' }}">Daftar Peminjaman</a>
>>>>>>> b4a2826c571e866431bf2dbc837bd4efa3d4c9df
            @elseif ($user && $user->hasRole('member'))
                <a href="{{ route('member.dashboard') }}" class="{{ Request::routeIs('member.dashboard') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('peminjamanbuku.index') }}" class="{{ Request::routeIs('peminjamanbuku.*') ? 'active' : '' }}">Peminjaman Buku</a>
                <a href="{{ route('pengembalianbuku.index') }}" class="{{ Request::routeIs('pengembalianbuku.*') ? 'active' : '' }}">Pengembalian Buku</a>
                <a href="{{ route('riwayat.peminjaman') }}" class="{{ Request::routeIs('riwayat.peminjaman') ? 'active' : '' }}">Riwayat</a>
            @endif
        </div>

        <!-- Profile & Logout -->
        @if ($user)
            <div class="user-profile">
                <div class="user-avatar">
                    {{ strtoupper(substr($user->nama ?? 'GU', 0, 2)) }}
                </div>
                <span class="username">{{ $user->nama }}</span>

                <a href="#" class="logout-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </nav>
</header>

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
        height: 120px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        /* Tambahkan ini */
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
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .nav-links a:hover {
        text-decoration: underline;
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
                <a href="{{ route('admin.dashboard') }}">Beranda</a>
                <a href="{{ route('admin.bukus.index') }}">Manajemen Buku</a>
                <a href="{{ route('admin.members.index') }}">Manajemen Anggota</a>
                <a href="{{ route('admin.daftar.peminjam') }}">Daftar Peminjaman</a>
            @elseif ($user && $user->hasRole('member'))
                <a href="{{ route('member.dashboard') }}">Beranda</a>
                <a href="{{ route('peminjamanbuku.index') }}">Peminjaman Buku</a>
                <a href="{{ route('pengembalianbuku.index') }}">Pengembalian Buku</a>
                <a href="{{ route('riwayat.peminjaman') }}">Riwayat</a>
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

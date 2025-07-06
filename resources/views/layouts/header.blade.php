@php
$user = Auth::guard('member')->user();
@endphp

<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1030;
        padding: 10px 40px;
        background-color: #007bff;
        scroll-behavior: smooth;

    }

    .logo img {
        width: 158px;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 500;
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
                <a href="{{ route('admin.bukus.index') }}">Tambah Buku</a>
                <a href="{{ route('admin.members.index') }}">Tambah Anggota</a>
                <a href="{{ route('admin.daftar.peminjam') }}">Daftar Peminjaman</a>
            @elseif ($user && $user->hasRole('member'))
                <a href="{{ route('member.dashboard') }}">Beranda</a>
                <a href="{{ route('peminjamanbuku.index') }}">Peminjaman Buku</a>
                <a href="{{ route('pengembalianbuku.index') }}">Pengembalian Buku</a>
                <a href="{{ route('riwayat.peminjaman') }}">Riwayat</a>
            @endif
        </div>

        <!-- Profile & Logout -->
        @if($user)
        <div class="user-profile">
            <div class="user-avatar">
                {{ strtoupper(substr($user->nama ?? 'GU', 0, 2)) }}
            </div>
            <span class="username">{{ $user->nama }}</span>

            <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endif
    </nav>
</header>

@php
    $user = Auth::guard('member')->user();
@endphp

<style>
    body {
        margin: 0;
        padding: 0;
        padding-top: 100px; /* Sesuaikan dengan tinggi navbar */
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        padding: 0 40px;
        background-color: #007bff;
        height: 100px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }

    .logo {
        flex: 0 0 auto;
    }

    .logo img {
        height: 55px;
        width: auto;
        transition: transform 0.3s ease;
    }

    .logo img:hover {
        transform: scale(1.05);
    }

    .nav-links {
        display: flex;
        justify-content: center;
        flex: 1;
        gap: 30px;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .nav-links a:hover {
        text-decoration: underline;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-links a.active {
        font-weight: bold;
        border-bottom: 2px solid white;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .user-profile {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        background-color: #444;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
    }

    .username {
        color: white;
        font-weight: 600;
        white-space: nowrap;
    }

    .logout-link {
        border: 1px solid white;
        padding: 6px 14px;
        border-radius: 6px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.2s ease;
    }

    .logout-link:hover {
        background-color: white;
        color: #007bff;
    }

    @media (max-width: 768px) {
        .navbar {
            flex-direction: column;
            height: auto;
            padding: 15px 20px;
        }

        .nav-links {
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
        }

        .user-profile {
            flex-direction: column;
            margin-top: 10px;
        }
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
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('admin.bukus.index') }}" class="{{ Request::routeIs('admin.bukus.*') ? 'active' : '' }}">Manajemen Buku</a>
                <a href="{{ route('admin.members.index') }}" class="{{ Request::routeIs('admin.members.*') ? 'active' : '' }}">Manajemen Anggota</a>
                <a href="{{ route('admin.daftar.peminjam') }}" class="{{ Request::routeIs('admin.daftar.peminjam') ? 'active' : '' }}">Daftar Peminjaman</a>
                <a href="{{ route('admin.laporan.index') }}" class="{{ Request::routeIs('admin.laporan.index') ? 'active' : '' }}">Laporan</a>
                <a href="{{ route('admin.laporan.denda') }}" class="{{ Request::routeIs('admin.laporan.denda') ? 'active' : '' }}">Daftar Denda</a>

            @elseif ($user && $user->hasRole('member'))
                <a href="{{ route('member.dashboard') }}" class="{{ Request::routeIs('member.dashboard') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('peminjamanbuku.index') }}" class="{{ Request::routeIs('peminjamanbuku.*') ? 'active' : '' }}">Peminjaman Buku</a>
                <a href="{{ route('pengembalianbuku.index') }}" class="{{ Request::routeIs('pengembalianbuku.*') ? 'active' : '' }}">Pengembalian Buku</a>
                <a href="{{ route('riwayat.peminjaman') }}" class="{{ Request::routeIs('riwayat.peminjaman') ? 'active' : '' }}">Riwayat</a>
            @endif
        </div>

        <!-- Profil & Logout -->
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

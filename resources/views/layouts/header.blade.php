@php
    $user = Auth::guard('member')->user();
@endphp

<style>
    :root {
        --primary-color: #007bff;
        --primary-hover: #0056b3;
        --navbar-height: 80px;
        --shadow-light: 0 2px 15px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    body {
        margin: 0;
        padding: 0;
        padding-top: var(--navbar-height);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .custom-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
        height: var(--navbar-height);
        box-shadow: var(--shadow-light);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .custom-navbar.scrolled {
        box-shadow: var(--shadow-medium);
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.95) 0%, rgba(0, 86, 179, 0.95) 100%);
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Logo Section */
    .logo-section {
        flex: 0 0 auto;
    }

    .logo-section img {
        height: 45px;
        width: auto;
        transition: all 0.3s ease;
        filter: brightness(1.1);
    }

    .logo-section img:hover {
        transform: scale(1.05) rotate(2deg);
        filter: brightness(1.2);
    }

    /* Navigation Links */
    .nav-menu {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex: 1;
        justify-content: center;
        margin: 0 2rem;
    }

    .nav-item {
        position: relative;
        margin: 0 0.25rem;
    }

    .nav-link {
        color: white;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        display: block;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: white;
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.2);
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background: white;
        border-radius: 2px;
    }

    /* User Profile Section */
    .user-section {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .user-avatar {
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        color: var(--primary-color);
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .user-name {
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    .logout-btn {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .logout-btn:hover {
        background: white;
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* Mobile Menu Toggle */
    .mobile-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .mobile-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .navbar-container {
            padding: 0 1rem;
        }

        .nav-menu {
            gap: 0.25rem;
            margin: 0 1rem;
        }

        .nav-link {
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
        }

        .user-name {
            display: none;
        }
    }

    @media (max-width: 768px) {
        :root {
            --navbar-height: 70px;
        }

        .mobile-toggle {
            display: block;
        }

        .nav-menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--primary-color);
            flex-direction: column;
            padding: 1rem;
            box-shadow: var(--shadow-medium);
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .nav-menu.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .nav-item {
            width: 100%;
            margin: 0;
        }

        .nav-link {
            width: 100%;
            text-align: center;
            margin: 0.25rem 0;
        }

        .user-section {
            gap: 0.5rem;
        }

        .user-info {
            padding: 0.4rem 0.8rem;
        }

        .logout-btn {
            padding: 0.4rem 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-container {
            padding: 0 0.5rem;
        }

        .logo-section img {
            height: 35px;
        }

        .user-info {
            display: none;
        }
    }
</style>

<nav class="custom-navbar" id="mainNavbar">
    <div class="navbar-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <a href="{{ $user && $user->hasRole('admin') ? route('admin.dashboard') : route('member.dashboard') }}">
                <img src="{{ asset('template/images/logo.png') }}" alt="LUGX Logo">
            </a>
        </div>

        <!-- Navigation Menu -->
        <div class="nav-menu" id="navMenu">
            @if ($user && $user->hasRole('admin'))
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        Beranda
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.bukus.index') }}"
                       class="nav-link {{ Request::routeIs('admin.bukus.*') ? 'active' : '' }}">
                        Manajemen Buku
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.members.index') }}"
                       class="nav-link {{ Request::routeIs('admin.members.*') ? 'active' : '' }}">
                        Manajemen Anggota
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.daftar.peminjam') }}"
                       class="nav-link {{ Request::routeIs('admin.daftar.peminjam') ? 'active' : '' }}">
                        Daftar Peminjaman
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.laporan.index') }}"
                       class="nav-link {{ Request::routeIs('admin.laporan.index') ? 'active' : '' }}">
                        Laporan
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.laporan.denda') }}"
                       class="nav-link {{ Request::routeIs('admin.laporan.denda') ? 'active' : '' }}">
                        Daftar Denda
                    </a>
                </div>
            @elseif ($user && $user->hasRole('member'))
                <div class="nav-item">
                    <a href="{{ route('member.dashboard') }}"
                       class="nav-link {{ Request::routeIs('member.dashboard') ? 'active' : '' }}">
                        Beranda
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('peminjamanbuku.index') }}"
                       class="nav-link {{ Request::routeIs('peminjamanbuku.*') ? 'active' : '' }}">
                        Peminjaman Buku
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('pengembalianbuku.index') }}"
                       class="nav-link {{ Request::routeIs('pengembalianbuku.*') ? 'active' : '' }}">
                        Pengembalian Buku
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('riwayat.peminjaman') }}"
                       class="nav-link {{ Request::routeIs('riwayat.peminjaman') ? 'active' : '' }}">
                        Riwayat
                    </a>
                </div>
            @endif
        </div>


        <button class="mobile-toggle" id="mobileToggle">
            <i class="fas fa-bars"></i>
        </button>

        
        @if ($user)
            <div class="user-section">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr($user->nama ?? 'GU', 0, 2)) }}
                    </div>
                    <span class="user-name">{{ $user->nama }}</span>
                </div>

                <a href="#" class="logout-btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('mainNavbar');
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');


    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });


    mobileToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');


        const icon = mobileToggle.querySelector('i');
        if (navMenu.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });


    document.addEventListener('click', function(event) {
        if (!navbar.contains(event.target)) {
            navMenu.classList.remove('active');
            const icon = mobileToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });


    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
            const icon = mobileToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        });
    });
});
</script>

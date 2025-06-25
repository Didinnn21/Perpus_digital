@php
    $user = Auth::guard('member')->user();
@endphp

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                  <a href="{{ $user->hasRole('admin') ? route('admin.dashboard') : route('member.dashboard') }}" class="logo">
                        <img src="{{ asset('template/images/logo.png') }}" alt="Logo" style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        {{-- Home menu sesuai role --}}
                        @if($user && $user->hasRole('admin'))
                            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('admin.bukus.index') }}">Daftar Buku</a></li>
                            <li><a href="{{ route('admin.members.index') }}">Tambah Anggota</a></li>
                        @elseif($user && $user->hasRole('member'))
                            <li><a href="{{ route('member.dashboard') }}" class="{{ request()->routeIs('member.dashboard') ? 'active' : '' }}">Home</a></li>
                            {{-- Tambahkan menu khusus member jika ada --}}
                        @else
                            <a href="{{ $user->hasRole('admin') ? route('admin.dashboard') : route('member.dashboard') }}" class="logo">
                        @endif

                        @auth
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Logout form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

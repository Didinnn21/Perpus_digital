@extends('layouts.main')
@section('main-banner')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Welcome In</h6>
                    <h2>LIBRARY!</h2>
                    @auth
                        <p>Halo, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai
                            <strong>{{ ucfirst(Auth::user()->role) }}</strong>MEMBER</p>
                    @endauth
                    <p>Selamat datang di Perpustakaan Online kami — pusat referensi digital yang dirancang untuk memudahkan Anda dalam mencari, membaca, dan meminjam berbagai koleksi buku secara praktis. Dengan sistem yang cepat dan user-friendly, kami hadir untuk mendukung kebutuhan literasi Anda di era digital.
                     Jelajahi ribuan judul buku, kelola peminjaman dengan mudah, dan nikmati kemudahan belajar di mana saja, kapan saja.</p>
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                onkeypress="handle" />
                            <button role="button">Search Buku</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="right-image">
                    <img src={{"template/images/perpus.jpg"  }} alt="">
                    <span class="price"></span>
                    <span class="offer">-</span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('statistik')
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border border-3 border-dark rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <h2 class="fw-bold">{{ $totalBuku }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border border-3 border-dark rounded">
                <div class="card-body">
                    <h5 class="card-title">Buku Dipinjam</h5>
                    <h2 class="fw-bold">{{ $bukuDipinjam }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border border-3 border-dark rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Denda</h5>
                    <h2 class="fw-bold">Rp {{ number_format($dendaUser, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('section-trending')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6>Trending</h6>
                    <h2>Trending Buku</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-button">
                    <a href="shop.html">View All</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Cerita_Rakyat/Maling_Kundang.jpg') }}"
                         alt="Maling Kundang"
                         class="card-img-top"
                         style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Cerita Rakyat</span>
                        <h5 class="card-title">Maling Kundang</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0 d-flex">
                    <img src="{{ asset('template/images/Cerita_Rakyat/Maling_Kundang.jpg') }}"
                         alt="Maling Kundang"
                         class="card-img-top"
                         style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Cerita Rakyat</span>
                        <h5 class="card-title">Maling Kundang</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Cerita_Rakyat/Maling_Kundang.jpg') }}"
                         alt="Maling Kundang"
                         class="card-img-top"
                         style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Cerita Rakyat</span>
                        <h5 class="card-title">Maling Kundang</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Cerita_Rakyat/Maling_Kundang.jpg') }}"
                         alt="Maling Kundang"
                         class="card-img-top"
                         style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Cerita Rakyat</span>
                        <h5 class="card-title">Maling Kundang</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Novel/Bumi_Manusia.jpg') }}" alt="Bumi Manusia" class="card-img-top"
                        style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Novel</span>
                        <h5 class="card-title">Bumi Manusia</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Novel/Bumi_Manusia.jpg') }}" alt="Bumi Manusia" class="card-img-top"
                        style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Novel</span>
                        <h5 class="card-title">Bumi Manusia</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Novel/Bumi_Manusia.jpg') }}" alt="Bumi Manusia" class="card-img-top"
                        style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Novel</span>
                        <h5 class="card-title">Bumi Manusia</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('template/images/Novel/Bumi_Manusia.jpg') }}" alt="Bumi Manusia" class="card-img-top"
                        style="width: 100%; object-fit: contain;">
                    <div class="card-body d-flex flex-column text-center">
                        <span class="text-muted mb-1">Novel</span>
                        <h5 class="card-title">Bumi Manusia</h5>
                        <a href="#" class="btn btn-primary mt-auto">Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('section-most-borrowed')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6>TOP BUKU</h6>
                    <h2>Most Borrowed</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-button">
                    <a href="shop.html">View All</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah</h4>
                        <a href="product-details.html">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('section-cta')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="shop">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h6>Our Shop</h6>
                                <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                            </div>
                            <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                            <div class="main-button">
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-2 align-self-end">
                <div class="subscribe">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h6>NEWSLETTER</h6>
                                <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                            </div>
                            <div class="search-input">
                                <form id="subscribe" action="#">
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Your email...">
                                    <button type="submit">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

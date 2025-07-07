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
                            <strong>{{ ucfirst(Auth::user()->role) }}</strong>ADMIN</p>
                    @endauth
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

{{-- Statistik Jumlah Anggota, Buku, Peminjam --}}
@section('statistik')
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border border-3 border-dark rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Anggota</h5>
                    <h2 class="fw-bold">{{ $totalAnggota }}</h2>
                </div>
            </div>
        </div>
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
                    <h5 class="card-title">Sedang Meminjam</h5>
                    <h2 class="fw-bold">{{ $anggotaMeminjam }}</h2>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Cerita_Rakyat/Maling_Kundang.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Cerita Rakyat</span>
                        <h4>Maling Kundang</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('section-most-played')
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
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Ipar_Adalah_Maut.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Ipar Adalah Maut</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Laut_Bercerita.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Laut Bercerita</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="item">
                    <div class="thumb">
                        <a href="product-details.html"><img src={{asset("template/images/Novel/Orang_Orang_Biasa.jpg") }} alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Novel</span>
                        <h4>Orang-Orang Biasa</h4>
                        <a href="product-details.html">Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


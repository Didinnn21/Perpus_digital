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
                    <p>Selamat datang di Perpustakaan Online kami — pusat referensi digital yang dirancang untuk memudahkan Anda dalam mencari, membaca, dan meminjam berbagai koleksi buku secara praktis. Dengan sistem yang cepat dan user-friendly, kami hadir untuk mendukung kebutuhan literasi Anda di era digital.
                     Jelajahi ribuan judul buku, kelola peminjaman dengan mudah, dan nikmati kemudahan belajar di mana saja, kapan saja.</p>
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                onkeypress="handle" />
                            <button role="button">Search Now</button>
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

@section('features')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image">
                            <img src={{"template/images/featured-01.png" }} alt="" style="max-width: 44px;">
                        </div>
                        <h4>Free Storage</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image">
                            <img src={{"template/images/featured-02.png" }} alt="" style="max-width: 44px;">
                        </div>
                        <h4>User More</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image">
                            <img src={{"template/images/featured-03.png" }} alt="" style="max-width: 44px;">
                        </div>
                        <h4>Reply Ready</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image">
                            <img src={{"template/images/featured-04.png"  }} alt="" style="max-width: 44px;">
                        </div>
                        <h4>Easy Layout</h4>
                    </div>
                </a>
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


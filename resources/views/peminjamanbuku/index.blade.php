@extends('layouts.main')

@include('layouts.header')

@section('main-banner')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Welcome In</h6>
                    <h2>LIBRARY!</h2>
                    <p>Peminjaman Buku</p>
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




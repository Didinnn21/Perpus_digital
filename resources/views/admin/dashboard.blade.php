@extends('layouts.main')

@include('layouts.header')

@section('main-banner')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="caption header-text">
                    <h6>Welcome In</h6>
                    <h2>LIBRARY!</h2>
                    @auth
                        <p>Halo, <strong>{{ Auth::user()->name }}</strong>! Anda login sebagai
                            <strong>{{ ucfirst(Auth::user()->role) }}</strong>.</p>
                    @endauth
                    <p>Selamat Admin</p>
                    <div class="search-input">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

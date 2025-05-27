@extends('layouts.header')

@section('content')
<div class="banner-area auto-height shadow dark text-light content-top-heading bg-fixed text-normal text-center" style="background-image: url(/perpus/img-1.jpg); height:100%;">

    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="content">
                        <h1>Perpustakaan LPKIA Bandung</h1>
                        <br><center><p>Repost by <a href='' title='' target='_blank'>Tama & Didin</a></p></center>

                        <form action="{{ route('home.cari') }}" method="get">
                            @csrf
                            <input type="text" placeholder="Cari Judul Buku" class="form-control" name="buku">
                            <button type="kirim">
                                <i class="fa fa-search" style="color: white"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

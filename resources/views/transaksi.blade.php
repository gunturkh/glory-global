@extends('layouts.importir')
@section('title', 'Cara Bertransaksi')
@include('header')
@section('content')
@include('sidemenu')
<div class="ubea-section mt-10" id="ubea-services" data-section="services">
    <div class="ubea-container">
        <div class="row">
            <div class="col-md-10">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Cara Bertransaksi</h2>
                    <p>Lakukan konsultasi secara GRATIS jika anda mengalami kesulitan dalam bertransaksi. Klik <a href="#" title="Kontak">disini</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-phone"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Kontak Marketing Kami</h3>
                        <p>Anda dapat mengirimkan foto produk dan nama produk ke TEAM MARKETING KAMI</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10  " data-animate-effect="fadeIn">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-magnifying-glass"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Proses Pencarian Produk</h3>
                        <p>Kami akan mencarikan produk yang anda kirimkan sesuai kriteria yang anda inginkan dan menanyakan ketersedian stok</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10  " data-animate-effect="fadeIn">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-new"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Negosiasi</h3>
                        <p>Jika anda sudah cocok dengan harga yang diberikan oleh kami, anda dapat membayar sesuai prosedur</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10  " data-animate-effect="fadeIn">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-cycle"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Proses Pemesanan dan Pengiriman</h3>
                        <p>Setelah pembayaran telah dikonfirmasi, kami akan memproses pemesanan ke pabrik dan kami akan mengatur pengiriman masuk ke Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10  " data-animate-effect="fadeIn">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-price-ribbon"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Konfirmasi Pelunasan dan Pengiriman Barang</h3>
                        <p>Setelah barang telah sampai di Indonesia, kami akan menginformasikan kepada Anda untuk pelunasan dan pengiriman barang sampai dengan alamat anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="container">
        <div class="row justify-content-center">
            <center><img src="{{ asset('images/how-to.jpg') }}" width="90%" title="Cara Bertransaksi" alt="Cara Bertransaksi"></center>
        </div>
    </div>
    -->
    <div class="container">
        <div class="row justify-content-center">
            <center style="width: 100%;"><img src="{{ asset('images/contact-us.jpg')}}" width="70%" title="Hubungi Kami" alt="Hubungi Kami" >
                <!-- <h1><a href="contact-us"><strong>Hubungi Kami Sekarang Juga!!</strong></a></h1> -->
            </center>
            <a href="{{route('contact-us')}}" style="margin-top: 20px"><button name="contact" class="btn btn-primary">HUBUNGI KAMI</button></a>
        </div>
    </div>
</div>

@endsection

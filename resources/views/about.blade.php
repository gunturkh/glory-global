@extends('layouts.importir')
@section('title', 'Tentang Kami')

@section('container')
<div id="ubea-blog" data-section="about" class="mt-10 mb-4" style="background-color: rgba(255,212,170,.2);">
    <div class="ubea-container mb-4">
        <div class="row">
            <div class="col-md-4 mb-2">
                <img src="{{ asset('images/about-company.png') }}" alt="Image Building" title="Image Building" style="max-height: 100%; max-width: 100%">
            </div>
            <div class="col-md-8 ubea-heading white">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Tentang Kami</h2>
                </div>
                <p class="white">PT Glori Global Sukses didirikan berdasarkan Akta No.661 tanggal 30 Agustus 2019 yang telah disetujui oleh Menteri Hukum dan Hak Asasi Manusia Republik Indonesia</p>
                <p>PT Glori Global Sukses adalah perusahan yang bergerak di Jasa Importir yang membantu pelanggan MENCARI, NEGOSIASI, MEMASUKKAN barang dari luar negeri ke Indonesia</p>
            </div>
        </div>
    </div>
    <div class="ubea-container mb-4">
        <div class="row">
            <div class="col-md-4 mb-2">
                <center><img src="{{ asset('images/about-vision.png') }}" alt="Image Vision" title="Image Vision" style="max-height: 100%; max-width: 100%"></center>
            </div>

            <div class="col-md-8 ubea-heading white">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Visi</h2>
                </div>
                <p>* Sebagai perusahaan yang menjadi jembatan importir bagi pelaku usaha<br />
                * Transaksi dilakukan secara hitam diatas putih<p>
            </div>
        </div>
    </div>
    <div class="ubea-container mb-4">
        <div class="row">
            <div class="col-md-4 mb-2">
                <center><img src="{{ asset('images/about-mission.png') }}" alt="Image Mission" title="Image Mission" style="max-height: 100%; max-width: 100%"></center>
            </div>
            <div class="col-md-8 ubea-heading white">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Misi</h2>
                </div>
                <p>Selalu berusaha memberikan pelayanan terbaik demi kepuasan pelanggan</p>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="mb-4 justify-content-center">
            <div class="ubea-heading">
                <h2 class="ubea-center text-center">Struktur Organisasi</h2>                    
            </div>
            <div class="justify-content-center">
                <img src="{{ asset('contact/struktur.PNG') }}" alt="Struktur Organisasi" title="Struktur Organisasi" width="100%" />
            </div>
        </div>
@endsection
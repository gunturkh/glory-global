@extends('layouts.importir')
@section('title', 'Layanan Jasa Kami')

@section('content')
<div class="ubea-section mt-10" id="ubea-services" data-section="services">
    <div class="ubea-container">
        <div class="row">
            <div class="col-md-10">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Layanan Kami</h2>
                    <p>Kami akan mengundang para pedagang yang baru mulai jualan dan ingin meng import produk yang di bawah harga pasaran.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-trophy"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Jasa Konsultasi</h3>
                        <p>Kami memberikan JASA KONSULTASI GRATIS bagi anda calon perusahaan yang ingin bekerja sama bersama kami</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-monitor"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Jasa Pembelian</h3>
                        <p>Kami memberikan jasa pembelian di China dengan perhitungan <strong>10% dari total harga barang</strong>  diluar biaya ongkos kirim </p>
                        <p>Harga tersebut sudah termasuk biaya ongkos kirim dari China ke Indonesia (Kota yang dipilih)</p>
                            <div class="image-container">
                                <img src="{{asset('images/layanan_product_example.jpg')}}" width="100%">
                            </div>
                            <!-- <span>* Harga beli = $1.01 * 50pcs = $50.50</span> <br />
                            <span>* Jasa Pembelian = $50.50 * 7% = $3.535</span> <br />
                            <strong>Harga Setelah Pembelian <br />= $54.035</strong> -->
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="feature-left">
                    <span class="icon">
                        <i class="icon-help"></i>
                    </span>
                    <div class="feature-copy">
                        <h3>Jasa Pengiriman</h3>
                        <div class="col">
                            <div class="h4">Pengiriman Via Laut</div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <table class="text-center table table-lg">
                                        <thead>
                                            <tr>
                                                <td><strong style="font-size: 18px">Jakarta</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr> --}}
                                            {{--     <td>Ukuran barang min 0,10 cbm</td> --}}
                                            {{-- </tr> --}}
                                            <tr>
                                                <td>Estimasi 4 - 5 minggu</td>
                                            </tr>
                                            <tr>
                                                <td><strong><h5>Rp 6.500.000,- / cbm</h5></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="text-center table table-lg">
                                        <tr>
                                            <td><strong style="font-size: 18px">Batam</strong></td>
                                        </tr>
                                        {{-- <tr> --}}
                                        {{--     <td>Ukuran barang min 0,20 cbm</td> --}}
                                        {{-- </tr> --}}
                                        <tr>
                                            <td>Estimasi 5 minggu</td>
                                        </tr>
                                        <tr>
                                            <td><strong><h5>Rp 1.500.000,- / cbm</h5></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="h4">Pengiriman Via Udara</div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <table class="text-center table table-lg">
                                        <thead>
                                            <tr>
                                                <td><strong style="font-size: 18px">Jakarta</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Berat min 5 kg</td>
                                            </tr>
                                            <tr>
                                                <td>Estimasi 14 hari</td>
                                            </tr>
                                            <tr>
                                                <td><strong><h5>Rp 300.000,- /kg</h5></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="col-md-6"> --}}
                                {{--     <table class="text-center table table-lg"> --}}
                                {{--         <tr> --}}
                                {{--             <td><strong style="font-size: 18px">Batam</strong></td> --}}
                                {{--         </tr> --}}
                                {{--         {{-1- <tr> -1-}} --}}
                                {{--         {{-1-     <td>Ukuran barang min 0,20 cbm</td> -1-}} --}}
                                {{--         {{-1- </tr> -1-}} --}}
                                {{--         <tr> --}}
                                {{--             <td>Estimasi 5 minggu</td> --}}
                                {{--         </tr> --}}
                                {{--         <tr> --}}
                                {{--             <td><strong><h5>Rp 1.500.000,- / cbm</h5></strong></td> --}}
                                {{--         </tr> --}}
                                {{--     </table> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

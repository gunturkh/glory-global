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
                        <p>Kami memberikan jasa pembelian di China dengan perhitungan <strong>7% dari total pembelian</strong> (Invoice x 7%) diluar biaya ongkos kirim dengan minimal pembelian 100 RMB atau 14 USD </p>
                        <p>Contoh: 
                            <br />1. Pembeli memberikan informasi supplier kepada penjual dengan contoh harga barang.
                            <div class="image-container">
                                <img src="{{asset('images/layanan_product_example.jpg')}}" width="100%">
                            </div>
                            <!-- <span>* Harga beli = $1.01 * 50pcs = $50.50</span> <br />
                            <span>* Jasa Pembelian = $50.50 * 7% = $3.535</span> <br />
                            <strong>Harga Setelah Pembelian <br />= $54.035</strong> -->
                            <div class="row mt-2">
                                <div class="col-md-6 mb-2">
                                    <table>
                                        <tr>
                                            <td><strong style="font-size: 18px">Jakarta</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran barang 0,20 cbm, maka <br />Rp 6.500.000,- * 0.20 = Rp 1.300.000,-</td>
                                        </tr>
                                        <tr>
                                            <td><strong style="font-size: 18px">Maka total keseluruhan: <br />Rp 806.490,- + Rp 1.300.000,- <br /> = <u>Rp 2.106.490,-</u></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </p>
                        <p>
                            2. Jika ukuran barang sebesar <strong>0.20 cbm</strong>, maka pembeli harus melakukan pembayaran sebesar:<br />
                            <span>* Harga Produk = Rp 756.490,-</span> <br />
                            <span>* Ongkos kirim dari Supplier ke gudang China = Rp 50.000,-</span> <br />
                        </p>
                        <p>
                            3. Jika Pembeli Memilih Pengiriman:
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <table>
                                        <tr>
                                            <td><strong style="font-size: 18px">Batam</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran barang 0,20 cbm, maka <br />Rp 1.500.000,- * 0.20 = Rp 300.000,-</td>
                                        </tr>
                                        <tr>
                                            <td><strong style="font-size: 18px">Maka total keseluruhan <br />Rp 806.490,- + Rp 300.000,- <br /> = <u>Rp 1.106.490,-</u></strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <table>
                                        <tr>
                                            <td><strong style="font-size: 18px">Jakarta</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran barang 0,20 cbm, maka <br />Rp 7.500.000,- * 0.20 = Rp 1.500.000,-</td>
                                        </tr>
                                        <tr>
                                            <td><strong style="font-size: 18px">Maka total keseluruhan: <br />Rp 806.490,- + Rp 1.500.000,- <br /> = <u>Rp 2.306.490,-</u></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 mb-2">
                <div class="alert alert-primary" role="alert">
                    * Memakai KURS USD dengan IDR 14.000,- <br />
                    * Dikenakan biaya pengiriman barang selain kota Jakarta dan kota Batam.<br />
                    * Harga kirim dibawah ini sudah termasuk pengiriman barang sampai alamat pembeli di kota Jakarta dan kota Batam.
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
                                            <tr>
                                                <td>Ukuran barang min 0,10 cbm</td>
                                            </tr>
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
                                        <tr>
                                            <td>Ukuran barang min 0,20 cbm</td>
                                        </tr>
                                        <tr>
                                            <td>Estimasi 3 - 5 minggu</td>
                                        </tr>
                                        <tr>
                                            <td><strong><h5>Rp 1.500.000,- / cbm</h5></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
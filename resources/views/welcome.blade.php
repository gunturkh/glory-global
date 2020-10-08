@extends('layouts.importir')
@section('title', 'Beranda')
@include('header-home')
@section('container')
    <div id="ubea-hero" class="js-fullheight"  data-section="home">
        <div class="row justify-content-center" style="background-image: linear-gradient(orange,firebrick);">
            <div class="col-md-8" style="padding: 0">
                <div class="row">
                    <div class="flexslider js-fullheight">
                        <ul class="slides">
                        <li style="background-image: url(images/bg-1.png);">
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="col text-center js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <p style="color:#fff; font-size: 30px">PT. Glori Global Sukses adalah perusahaan yang bergerak di jasa importir membantu pelanggan mencari, negosiasi, memasukkan barang dari luar negeri ke Indonesia.</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(images/bg-2.jpeg);">
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="col text-center js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <p style="color:#fff; font-size: 42px">Cita cita dan semangat harus dimiliki untuk memulai dan mengembangkan usaha</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(images/bg-3.jpeg);">
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="col text-center js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <p style="color:#fff; font-size: 42px">Mulailah dari tempatmu berada. Gunakan yang kau punya. Lakukan yang kau bisa <br /> - Arthur Ashe</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li style="background-image: url(images/img_bg_4.png);"> --}}
                        {{--     <div class="overlay"></div> --}}
                        {{--     <div class="container"> --}}
                        {{--         <div class="col text-center js-fullheight slider-text"> --}}
                        {{--             <div class="slider-text-inner"> --}}
                        {{--                 <p style="color:#fff; font-size: 42px">Visi tanpa  eksekusi adalah halusinasi <br /> - Henry ford</p> --}}
                        {{--             </div> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}
                        {{-- </li> --}}
                        {{-- <li style="background-image: url(images/img_bg_5.png);"> --}}
                        {{--     <div class="overlay"></div> --}}
                        {{--     <div class="container"> --}}
                        {{--         <div class="col text-center js-fullheight slider-text"> --}}
                        {{--             <div class="slider-text-inner"> --}}
                        {{--                 <p style="color:#fff; font-size: 42px">Modal bisa dicari, Keahlian bisa dibeli, Cita-cita dan semangat tidak bisa dibeli</p> --}}
                        {{--             </div> --}}
                        {{--         </div> --}}
                        {{--     </div> --}}
                        {{-- </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('content')
    <div class="col justify-content-center" style="padding: 50px; background: linear-gradient(-135deg,#e0e6ed,#e0e6ed,#fff7fa);">
        <div class="col mb-5">
            <div class="ubea-heading">
                <h2 class="ubea-left">Perbandingan Harga</h2>
                <p>Kami mengundang para pedagang yang baru memulai usaha dan ingin mengimport produk dari luar negeri.</p>
            </div>
            <div class="row" style="justify-content: center;">
                @foreach($top_items as $top_item)
                    <div class="col-md-2" style="margin: 10px;">
                        <div class="card" style="height: 100%; ">
                            <div style="max-height: 300px;">
                                <img src="{{url('products/'.$top_item->filename)}}" class="img-responsive mx-auto d-block" alt="icon-bag" title="{{$top_item->name}}" style="max-height: 245px; max-width: 245px; width: 100%; background-size: cover"; /> <p></p>
                            </div>
                            <h4 class="text-center font-weight-bold" style="flex-grow: 1;">{{ucfirst($top_item->name)}}</h3>
                            <p class="text-center">{{substr($top_item->description,0,65)}}...</p>
                            <hr />
                            <div style="display: grid; grid-template-columns: 1fr 1fr; justify-content: center;">
                                <h6 class="text-center">Harga Batam <br /><span style="color: #FF5126; font-weight: 300; font-size: 20px">@currency($top_item->price)</span></h5>
                                {{-- <hr /> --}}
                                <h6 class="text-center">Harga Jakarta <br /><span style="color: #FF5126; font-weight: 300; font-size: 20px">@currency($top_item->price2)</span></h5>
                            </div>
                            <center><a href="{{url('lihat-produk/'.$top_item->slug)}}" class="btn btn-primary">Lihat</a></center>
                        </div>
                    </div>
                @endforeach 
                
                <!-- <div class="col-md-4">
                    <div class="card">
                        <img src="{{url('images/nano_spray.png')}}" class="img-responsive mx-auto d-block" alt="icon-shoe" title="Perbandingan Harga Sepatu" style="max-height: 300px; max-width: 300px;" /> <p></p>
                        <h3 class="text-center font-weight-bold">NANO SPRAY 30ml Rechargeable</h3>
                        <p class="text-center">Harga Market place <br /> IDR 36.480,- <br/><i style="font-size: 12px">*setelah diskon</i></p>
                        <hr />
                        <h5 class="text-center">Harga Jasa Sampai Batam <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">HANYA 20.374 RIBU</span></h5>
                        <hr />
                        <h5 class="text-center">Harga Jasa Sampai Jakarta <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">HANYA 21.871 RIBU</span></h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{url('images/penyedot_komedo.png')}}" class="img-responsive mx-auto d-block" alt="icon-serba-serbi" title="Perbandingan Harga Serba-serbi" style="max-height: 300px; max-width: 300px;" /> <p></p>
                        <h3 class="text-center font-weight-bold">PENYEDOT KOMEDO CW666</h3>
                        <p class="text-center">Harga Market place <br /> IDR 99.900,- <br/><i style="font-size: 12px">*setelah diskon</i></p>
                        <hr />
                        <h5 class="text-center">Harga Jasa Sampai Batam <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">HANYA 46.410 RIBU</span></h5>
                        <hr />
                        <h5 class="text-center">Harga Jasa Sampai Jakarta <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">HANYA 59.490 RIBU</span></h5>
                    </div>
                </div> -->
            </div>

        </div>



        <!--
        <div class="row justify-content-center mt-3">
            <center><img src="{{ asset('images/how-to.jpg') }}" width="90%" title="Cara Bertransaksi" alt="Cara Bertransaksi"></center>
        </div> -->
        
    </div>
    @endsection

    @section('content_2')
        <div class="col mb-5" style="margin: auto; padding: 50px;">
            <div class="ubea-heading">
                <h2 class="ubea-left">Testimonial</h2>
                <p>Dibawah ini adalah beberapa pelanggan kami yang memberikan testimonial secara sukarela setelah menggunakan jasa PT. Glori Global Sukses</p>
                <!-- <span class="float-right"><i class="text-warning icon-star2"></i></span>
                <span class="float-right"><i class="text-warning icon-star2"></i></span>
                <span class="float-right"><i class="text-warning icon-star2"></i></span>
                <span class="float-right"><i class="text-warning icon-star2"></i></span> -->

                <div id="carouselExampleIndicators" class="carousel slide carousel-responsive" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  </ol>
                  <div class="carousel-inner">
                    @foreach($testimony as $testi) 
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{url('products/'.$testi->pictures)}}" alt="Testimonial">
                            </div>
                        @else
                            <div class="carousel-item">
                              <img class="d-block w-100" src="{{url('products/'.$testi->pictures)}}" alt="Testimonial">
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="carousel-item"> --}}
                    {{--   <img class="d-block w-100" src="{{url('images/testi_2.jpg')}}" alt="Testimonial"> --}}
                    {{-- </div> --}}
                    {{-- <div class="carousel-item"> --}}
                    {{--   <img class="d-block w-100" src="{{url('images/testi_3.jpg')}}" alt="Testimonial"> --}}
                    {{-- </div> --}}
                    {{-- <div class="carousel-item"> --}}
                    {{--   <img class="d-block w-100" src="{{url('images/testi_4.jpg')}}" alt="Testimonial"> --}}
                    {{-- </div> --}}
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <hr />
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span><br/>
                            "Alhamdullilah kak, udah sampai pesanan saya semuanya. Terus juga sudah saya cek semua, barang orderannya ada semua plus kuantitasnya engga kurang. Trima kasih banyak kak"
                            <p><i>&mdash; Kak Fitri, 2019 - Baju Wanita</i></p> 
                        </div>                        
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <hr />
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span><br/>
                            "Pelayanannya bagus, mulai dari pelanggan dilayan hingga diberi beberapa opsi dan pilihan yang menghemat uang, tidak membingungkan perhitungan biaya."
                            <p><i>&mdash; Pak Dayat, 2019 - Sparepart Mobil</i></p>
                        </div>                        
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <hr />
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span><br/>
                            "Terkadang setelah pemesanan berkala, ada beberapa item yang tidak diorder, digabung ke dalam. Ternyata setelah dijelaskan, rupanya diberikan SAMPLE mainan agar produknya berbeda-beda."
                            <p><i>&mdash; Kak Aya, 2019 - Mainan</i></p> 
                        </div>                        
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <hr />
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span>
                            <span><i class="text-warning icon-star2"></i></span><br/>
                            "Barang yang datang sesuai dengan apa yang saya pesan, spesifikasi, daya listrik, kapasitas, semuanya OKEE POLL."
                            <p><i>&mdash; Bro William, 2019 - Phone, Tablet, Gadget</i></p> 
                        </div>                        
                    </div>
                </div> -->
            </div>
        </div>
    @endsection

    @section('container_2')
    <div class="container-fluid mt-5" style="background-color: rgba(0,0,0,.1);">
        <div class="container">
            <div class="row" style="padding: 30px 0;">
                <img src="{{url('images/alarm.png')}}" class="img-responsive" alt="icon-alarm" title="Hubungi Kami" style="max-height: 400px; max-width: 400px;" />
                <div class="col order-first">
                    <div class="ubea-heading mt-7">
                        <h2 class="ubea-left">Hemat waktu, hemat biaya</h2>
                        <p>Serahkan kepada kami bagian yang merepotkan dalam bisnis anda, karna waktu anda jauh lebih berharga.</p>
                        <a href="{{route('contact-us')}}"><button name="contact" class="btn btn-primary">HUBUNGI KAMI</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@stop

<!DOCTYPE HTML>
<!--
    uBeasa by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com
-->
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - PT Glori Global Sukses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PT Glori Global Sukses adalah perusahan yang bergerak di Jasa Importir yang membantu pelanggan mencari, menegosiasi, memasukkan barang dari luar negeri ke Indonesia" />
    <meta name="keywords" content="importir, barang china, pt glori global sukses, jasa importir, jasa importir china ke batam, jasa importir china ke jakarta, barang china ke batam, barang china ke jakarta, impor barang" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <!-- Flexslider -->
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        
    <div class="ubea-loader"></div>
    
    <div id="page">
    @include('header')
    {{-- <nav class="ubea-nav" role="navigation"> --}}
    {{--     <div class="ubea-container"> --}}
    {{--         <div class="row justify-content-center"> --}}
    {{--             <div class="col-sm-6 col-xs-12"> --}}
    {{--                 <div id="ubea-logo"> --}}
    {{--                     <div class="row justify-content-center"> --}}
    {{--                         <img src="{{asset('images/logo.jpg')}}" alt="Logo" /> --}}
    {{--                         <a href="{{url('welcome')}}">PT Glori Global Sukses</a> --}}
    {{--                     </div> --}}
    {{--                 </div> --}}
    {{--             </div> --}}
    {{--         </div> --}}
    {{--         <div class="row justify-content-betwen"> --}}

    {{--             <div class="col-8 menu-1 main-nav"> --}}
    {{--                 <ul> --}}
    {{--                     <li class="active"><a href="{{route('welcome')}}" class="external">Beranda</a></li> --}}
    {{--                     <li><a href="{{route('about')}}" class="external">Tentang Kami</a></li> --}}
    {{--                     <li><a href="{{route('layanan')}}" class="external">Layanan</a></li> --}}
    {{--                     <li><a href="{{route('produk')}}" class="external">Produk</a></li> --}}
    {{--                     <li><a href="{{route('transaksi')}}" class="external">Cara Order</a></li> --}}
    {{--                     <li><a href="{{route('faq')}}" class="external">FAQ</a></li> --}}
    {{--                     <li><a href="{{route('contact-us')}}" class="external">Kontak</a></li> --}}
    {{--                 </ul> --}}
    {{--             </div> --}}
    {{--             <div class="menu-1 main-nav text-right"> --}}
    {{--                 <ul> --}}
    {{--                     <li> --}}
    {{--                         <form action="{{route('search')}}" method="get"> --}}
    {{--                             <div class="input-group"> --}}
    {{--                                 <input type="text" name="keyword" class="form-control" placeholder="Ex: tas wanita" aria-label="Ex: tas wanita" aria-describedby="keyword" required="required" style="height: auto; font-size: 14px"> --}}
    {{--                                 <div class="input-group-append"> --}}
    {{--                                     <button class="btn btn-outline-secondary" type="submit" style="margin-bottom: 0px; padding: 0px 10px"><i class="icon-search"></i></button> --}}
    {{--                                 </div> --}}
    {{--                             </div> --}}
    {{--                         </form> --}}
    {{--                     </li> --}}
    {{--                 </ul> --}}
                    
    {{--             </div> --}}
    {{--         </div> --}}
            
    {{--     </div> --}}
    {{-- </nav> --}}

    @yield('container')

    <div class="container">
        @yield('content')
    </div>

    @yield('container_2')

    <footer id="ubea-footer" role="contentinfo" style="background-color: black" class="mt-2">
        <div class="ubea-container">
            
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="float-left">
                        <small class="block" style="color: white">&copy; 2020 PT Glori Global Sukses. All Rights Reserved.</small> 
                        <small class="block"><a href="{{url('login')}}">Login</a></small> 
                    </p>
                    <p class="float-right">
                        <ul class="ubea-social-icons float-right">
                            <li><a href="https://instagram.com/gloglo.co.id?igshid=1adr2wokti7g" target="_blank" alt="PT Glori Global Sukses" title="PT Glori Global Sukses"><i class="icon-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com/PT-Glori-Global-Sukses-100629498187326/" target="_blank" alt="PT Glori Global Sukses" title="PT Glori Global Sukses"><i class="icon-facebook"></i></a></li>
                            <!-- <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google-with-circle"></i></a></li> -->
                        </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    </div>

    <div class="gototop js-top">
        @foreach($products as $product)
        <a href="{{ url('search-kategori/'.$product->slug)}}" alt="{{$product->slug}}" title="{{$product->name}}">
            <i class="icon {{$product->icon}}"></i>
        </a>
        @endforeach
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- jQuery Easing -->
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Waypoints -->
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <!-- Carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- countTo -->
    <script src="{{asset('js/jquery.countTo.js')}}"></script>
    <!-- Flexslider -->
    <script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup-options.js')}}"></script>
    <!-- Main -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/view-product.js')}}"></script>

    </body>
</html>


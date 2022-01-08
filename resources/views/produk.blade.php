@extends('layouts.importir')
@section('title', 'Produk')
@include('header')
@section('container')
    <div id="ubea-hero" class="js-fullheight"  data-section="home">
        <div class="row justify-content-end" style="background-image: linear-gradient(orange,firebrick);">
            
            <div class="col-md-3" style="padding: 0"></div>

            <div class="col-md-6" style="padding: 0">
                <div class="row ">
                    <div class="flexslider js-fullheight" style="display: flex; align-items: center; margin: auto;">
                        <ul class="slides">
                        <li style="background-image: url(images/BANNER1.jpg);">
                                <!-- <div class="overlay"></div> -->
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <!-- <p style="color:#fff; font-size: 30px">PT. Glori Global Sukses adalah perusahaan yang bergerak di jasa importir membantu pelanggan mencari, negosiasi, memasukkan barang dari luar negeri ke Indonesia.</p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <li style="background-image: url(images/BANNER2.jpg);">
                                <!-- <div class="overlay"></div> -->
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <!-- <p style="color:#fff; font-size: 42px">Cita cita dan semangat harus dimiliki untuk memulai dan mengembangkan usaha</p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <li style="background-image: url(images/BANNER3.jpg);">
                                <!-- <div class="overlay"></div> -->
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <!-- <p style="color:#fff; font-size: 42px">Mulailah dari tempatmu berada. Gunakan yang kau punya. Lakukan yang kau bisa <br /> - Arthur Ashe</p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <li style="background-image: url(images/BANNER4.jpg);">
                                <!-- <div class="overlay"></div> -->
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <!-- <p style="color:#fff; font-size: 42px">Visi tanpa  eksekusi adalah halusinasi <br /> - Henry ford</p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <li style="background-image: url(images/BANNER5.jpg);">
                                <!-- <div class="overlay"></div> -->
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <!-- <p style="color:#fff; font-size: 42px;">Modal bisa dicari, Keahlian bisa dibeli, Cita-cita dan semangat tidak bisa dibeli</p> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="col-md-3 product_category">
                <div class="list-product-style d-none d-md-block">
                    <div class="dropdown">
                        @foreach($products as $product)
                        
                            <div class="mainmenubtn" onclick="location.href='{{ url('search-kategori/'.$product->slug)}}'" style="cursor: pointer;">
                                <i class="icon {{$product->icon}}"></i> {{$product->name}}
                                <div class="submenu flexslider js-fullheight">
                                    @foreach($product->categories as $category)
                                        <span style="font-size: 18px; font-weight: bold"><a href="{{url('search-subkategori/'.$category->slug)}}" style="color: white"> {{$category->name}} </a></span><br />
                                        @foreach($category->subCategories as $subCategory)
                                           <a href="{{url('search-produk/'.$subCategory->slug)}}" style="color: white"> {{$subCategory->name}} </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                        <hr/>
                                        <p></p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list-product-style d-md-none">
                    <div class="dropdown"> 
                        @foreach($products as $product)
                            <div class="mainmenubtn" style="display: inline-block; cursor: pointer;" onclick="location.href='{{ url('search-kategori/'.$product->slug)}}'"><i class="icon {{$product->icon}}"></i></div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="container">
            
            <div class="row">
                Pengguna lain juga mencari: <p />

                @isset($related_sub_categories)
                <p>
                    @foreach($related_sub_categories as $sub_category)
                        <a href="{{route('search-produk',$sub_category->slug)}}"> <u>{{ucfirst($sub_category->name)}}</u></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </p>
                @endisset

                @isset($related_products)
                <p>
                    @foreach($related_products as $product)
                        <a href="{{route('search-subkategori',$product->slug)}}"> <u>{{ucfirst($product->name)}}</u></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </p>
                @endisset

                @isset($related_categories)
                <p>
                    @foreach($related_categories as $category)
                        <a href="{{route('search-kategori',$category->slug)}}"> <u>{{ucfirst($category->name)}}</u></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                </p>
                @endisset


            </div>
            <hr />
            @isset($items)
            <div class="row">
                <div class="col-md-10">
                    <div class="ubea-heading">
                        <h2 class="ubea-left">Item Yang Dicari</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($items as $item)
                <div class="col-md-3 mb-4">
                    <div class="col-md-12 card">
                        <figure>
                          <img src="{{url('products/'.$item->filename)}}" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px;">
                        </figure>
                        <h4 style="font-weight: 400; color: #666; flex-grow: 1; "><center>{{strtoupper($item->name)}}</center></h4>
                        <!-- <span class="badge badge-secondary">LAKU KERAS</span>
                        <span class="badge badge-secondary">STOCK TERBATAS</span> -->
                        <!-- <p style="font-size: 10px"><center>{{str_limit($item->description, 100, '...')}}</center></p> -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; justify-content: center; flex-grow: 1;">
                            <div style="color:#666; text-align: center;">Batam: <p class="price-card">@currency($item->price)</p></div>
                            <div style="color:#666; text-align: center;">Jakarta: <p class="price-card">@currency($item->price2)</p></div>
                        </div>
                        <center><a href="{{url('lihat-produk/'.$item->slug)}}" class="btn btn-primary">Lihat</a></center>
                    </div>
                </div>
                @empty
                    <div class="col text-center mb-4"><i>---------- Produk Tidak Tersedia ----------</i></div>
                @endforelse            
            </div>

            <div class="row">
                <div class="col-md-10">
                    <div class="ubea-heading">
                        <h2 class="ubea-left">Item Tersedia Lainnya</h2>
                    </div>
                </div>
            </div>
            
            @endisset

            <div class="row">
                @foreach($others as $other)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{url('products/'.$other->filename)}}" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px;">
                        <p style="font-weight: 400; color: #666; flex-grow: 1; "><center>{{strtoupper($other->name)}}</center></p>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; justify-content: center; flex-grow: 1;">
                            <div style="color:#666; text-align: center;">Batam: <p class="price-card">@currency($other->price)</p></div>
                            <div style="color:#666; text-align: center;">Jakarta: <p class="price-card">@currency($other->price2)</p></div>
                        </div>
                        <center><a href="{{url('lihat-produk/'.$other->slug)}}" class="btn btn-primary">Lihat</a></center>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

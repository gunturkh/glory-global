@extends('layouts.importir')
@section('title', 'Produk')
@section('container')
    <div class="ubea-section mt-10" id="ubea-faq" data-section="faq" style="background-color: white">
        <div class="ubea-container">            
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

                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-10">
                            <div class="ubea-heading">
                                <h2 class="ubea-left">{{strtoupper($item->name)}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        @isset($item)
                            <div class="row">
                                <!-- <span class="badge badge-secondary">LAKU KERAS</span>
                                <span class="badge badge-secondary">STOCK TERBATAS</span> -->
                                <div class="col-md-4">
                                    <img src="{{url('products/'.$item->filename)}}" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px;">
                                </div>
                                <div class="col-md-8">
                                    <h4 style="font-weight: 400; color: #666;">{{strtoupper($item->name)}}</h4>
                                    <p>{{$item->description}}</p>
                                    <div style="color:#666;">Batam: <p class="price-card">@currency($item->price)</p></div>
                                    <div style="color:#666;">Jakarta: <p class="price-card">@currency($item->price2)</p></div>
                                </div>
                            </div>
                        @endisset

                    </div>

                    <div class="col">
                        <div class="col-md-10">
                            <div class="ubea-heading">
                                <h2 class="ubea-left">Item Tersedia Lainnya</h2>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        @foreach($others as $other)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{url('products/'.$other->filename)}}" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px;">
                                <p style="font-weight: 400; color: #666; "><center>{{strtoupper($other->name)}}</center></p>
                                <!-- <span class="badge badge-secondary">LAKU KERAS</span>
                                <span class="badge badge-secondary">STOCK TERBATAS</span> -->
                                <!-- <p style="font-size: 10px"><center>{{str_limit($other->description, 100, '...')}}</center></p> -->
                                <div style="color:#666;">Batam: <p class="price-card">@currency($other->price)</p></div>
                                <div style="color:#666;">Jakarta: <p class="price-card">@currency($other->price2)</p></div>
                                <center><a href="{{url('lihat-produk/'.$other->slug)}}" class="btn btn-primary">Lihat</a></center>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
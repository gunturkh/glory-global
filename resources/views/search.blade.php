@extends('layouts.importir')
@section('title', 'Produk')
@section('container')
    <div id="ubea-hero" class="js-fullheight"  data-section="home">
        <div class="row justify-content-center" style="background-image: linear-gradient(orange,firebrick);">

            <div class="col-md-8">
                <div class="col">
                    <div class="flexslider js-fullheight">
                        <ul class="slides">
                            <li style="background-image: url(images/img_bg_5.png);">
                                <div class="overlay"></div>
                                <div class="container">
                                    <div class="col text-center js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <h3 style="color: white">Masukkan kata kunci yang ingin dicari</h3>
                                            <form action="{{route('search')}}" method="get">
                                                <input type="text" class="form-control" placeholder="Contohnya sepatu, tas cantik dan lain sebagainya" name="keyword" id="keyword" style="max-width: 100%; background-color: white;">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Telusuri</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ubea-section" id="ubea-product" data-section="product">
        <div class="ubea-container">
            <div class="row" id="search-info" style="font-size: 18px">
                @if(count($items) > 0)
                  <div class="col text-center mb-4"><i>Menampilkan <strong>{{count($items)}} item</strong> berdasarkan kata kunci</i></div>  
                @endif
            </div>
            <div class="row" id="filter-products">
                @forelse($items as $item)
                    <div class="col-md-3 mb-4">
                        <div class="col-md-12 card">
                            <figure>
                              <img src="{{url('products/'.$item->filename)}}" alt="Image" class="image-responsive" style="height:auto; max-width: 100%; border-radius: 10px; background-size:cover">
                            </figure>
                            <h4 style="font-weight: 400; color: #666; "><center>{{strtoupper($item->name)}}</center></h4>
                            <!-- <span class="badge badge-secondary">LAKU KERAS</span>
                            <span class="badge badge-secondary">STOCK TERBATAS</span> -->
                            <!-- <p style="font-size: 10px"><center>{{str_limit($item->description, 100, '...')}}</center></p> -->
                            <div style="color:#666;">Batam: <p class="price-card">@currency($item->price)</p></div>
                            <div style="color:#666;">Jakarta: <p class="price-card">@currency($item->price2)</p></div>
                            <center><a href="{{url('lihat-produk/'.$item->slug)}}" class="btn btn-primary">Lihat</a></center>
                        </div>
                    </div>
                @empty
                    <div class="col text-center mb-4"><i>---------- Produk Tidak Tersedia ----------</i></div>
                    <hr />
                @endforelse
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="viewProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-product-title">Deskripsi Produk</h5>
                </div>
                <div class="modal-body" id="modal-product-description">
                  
                </div>
                <div class="modal-footer">
                  <a type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div id="ubea-contact" data-section="contact" class="ubea-cover-xs">
        <div class="container">
            <div class="col" style="margin-top: 30px">
                <div class="ubea-heading">
                    <h2 class="ubea-left">Kontak Kami</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/sam.jpg')}}" style="border-radius: 50%; max-height: 200px">
                            <h4 class="contact-name">Sam Dennis</h4>
                            <span class="font-italic font-weight-light">Marketing Exclusive</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 812 6951 7215</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:samdennis@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">samdennis@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/calista.jpg')}}" style="border-radius: 50%; max-height: 200px">
                            <h4 class="contact-name">Callista Zahra</h4>
                            <span class="font-italic font-weight-light">Marketing Exclusive</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 813 7178 7680</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:callistazahra@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">callistazahra@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/naomi.jpg')}}" style="border-radius: 50%; max-height: 200px">
                            <h4 class="contact-name">Naomi Adista</h4>
                            <span class="font-italic font-weight-light">Marketing Exclusive</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 822 8457 3105</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:naomiadista@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">naomiadista@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/felix.jpg')}}" style="border-radius: 50%; max-height: 200px">
                            <h4 class="contact-name">Felix Manggala</h4>
                            <span class="font-italic font-weight-light">Marketing Exclusive</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 823 9154 9662</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:felixmanggala@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">felixmanggala@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/marco.jpg')}}" style="border-radius: 50%; max-height: 200px">
                           <h4 class="contact-name">Marco Martinus</h4>
                            <span class="font-italic font-weight-light">Marketing Exclusive</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 812 6849 1376</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:macromartinus@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">macromartinus@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/rayhan.jpg')}}" style="border-radius: 50%; max-height: 200px">
                           <h4 class="contact-name">Rayhan Stevano</h4>
                            <span class="font-italic font-weight-light">Marketing</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 822 8801 6238</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:rayhanstevano@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">rayhanstevano@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center class="card">
                            <span class="font-weight-bold">PT Glori Global Sukses</span>
                            <hr />
                            <img class="image-responsive" src="{{url('contact/farel.jpg')}}" style="border-radius: 50%; max-height: 200px">
                           <h4 class="contact-name">Farel Alvino</h4>
                            <span class="font-italic font-weight-light">Marketing</span>
                            <hr />
                            <div style="font-size: 16px">(+62) 853 7764 9193</div>
                            <small class="block" style="font-size: 12px"><a href="mailto:rayhanstevano@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">farelalvino@gloriglobalsukses.com</a></small>
                        </center>
                    </div>
                </div>
        </div>
    </div>

@endsection
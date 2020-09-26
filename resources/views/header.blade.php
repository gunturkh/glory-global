    <nav class="ubea-nav" role="navigation">
        <div class="ubea-container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-xs-12">
                    <div id="ubea-logo">
                        <div class="row justify-content-center">
                            <img src="{{asset('images/logo.jpg')}}" alt="Logo" />
                            <a href="{{url('welcome')}}">PT Glori Global Sukses</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-betwen">

                <div class="col-8 menu-1 main-nav">
                    <ul>
                        <li class="active"><a href="{{route('welcome')}}" class="external">Beranda</a></li>
                        <li><a href="{{route('about')}}" class="external">Tentang Kami</a></li>
                        <li><a href="{{route('layanan')}}" class="external">Layanan</a></li>
                        <li><a href="{{route('produk')}}" class="external">Produk</a></li>
                        <li><a href="{{route('transaksi')}}" class="external">Cara Order</a></li>
                        <li><a href="{{route('faq')}}" class="external">FAQ</a></li>
                        <li><a href="{{route('contact-us')}}" class="external">Kontak</a></li>
                    </ul>
                </div>
                <div class="menu-1 main-nav text-right">
                    <ul>
                        <li>
                            <form action="{{route('search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Ex: tas wanita" aria-label="Ex: tas wanita" aria-describedby="keyword" required="required" style="height: auto; font-size: 14px">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" style="margin-bottom: 0px; padding: 0px 10px"><i class="icon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                    
                </div>
            </div>
            
        </div>
    </nav>

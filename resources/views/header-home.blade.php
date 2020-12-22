    <nav  role="navigation" class="home">

                <div class="home-logo-section">
                    <div class="home-logo" >
                        <img src="{{asset('images/logo.jpg')}}" alt="Logo" style="height: 60px;"/>
                        <a href="{{url('welcome')}}">PT Glori Global Sukses</a>
                    </div>
                </div>
                <div class="menu-3 home-nav-section ">
                    <div style="padding: 20px"><a href="{{route('welcome')}}" class="external header-home">Beranda</a></div>
                    <div style="padding: 20px; flex: 1 0 17%;" class="nav-section-center"><a href="{{route('about')}}" class="external header-home ">Tentang Kami</a></div>
                    <div style="padding: 20px"><a href="{{route('layanan')}}" class="external header-home">Layanan</a></div>
                    <div style="padding: 20px"><a href="{{route('produk')}}" class="external header-home">Produk</a></div>
                    <div style="padding: 20px; flex: 1 0 17%;" class="nav-section-center"><a href="{{route('transaksi')}}" class="external header-home ">Cara Order</a></div>
                    <div style="padding: 20px"><a href="{{route('faq')}}" class="external header-home">FAQ</a></div>
                    <div style="padding: 20px"><a href="{{route('contact-us')}}" class="external header-home">Kontak</a></div>
                <div style="padding: 20px; flex: 1 0 19%;">
                    <form action="{{route('search')}}" method="get" style="margin: 0; background-color: white;">
                        <div class="menu-1 input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Ex: tas wanita" aria-label="Ex: tas wanita" aria-describedby="keyword" required="required" style="height: auto; font-size: 14px">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" style="margin-bottom: 0px; padding: 0px 10px"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>

    </nav>

<!DOCTYPE HTML>
<!--
    uBeasa by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com
-->
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT Glori Global Sukses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by freshdesignweb.com" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="freshdesignweb.com" />

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

    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{URL::asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{URL::asset('css/icomoon.css')}}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{URL::asset('css/themify-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{URL::asset('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        <nav class="ubea-nav" role="navigation">
            <div class="ubea-container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div id="ubea-logo"><a href="{{url('welcome')}}">PT Glori Global Sukses</a></div>
                    </div>
                </div>
                
            </div>
        </nav>

        <div class="row" style="margin-top: 100px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="ubea-section" id="ubea-services" data-section="services">
                    <div class="ubea-container card ubea-cover ubea-cover-xs" style="padding: 40px 20px;">
                        <div class="row">
                            <div class="col-md-6" style="padding: 10px 20px; opacity: .4">
                                <img src="images/img_bg_1.jpg" alt="Image" class="img-responsive card">
                            </div>
                            <div class="col-md-6">
                                <div class="ubea-heading">
                                    <h2 class="ubea-left">Login Akun</h2>

                                    @if(count($errors) > 0)
                                        <div class="row">
                                            <ul style="list-style: none; margin:0; padding: 0">
                                                @foreach($errors->all() as $error)
                                                    <li class="alert alert-danger" style="margin-bottom: 5px; padding: 7px">{{$error}}</li>
                                                @endforeach
                                            </ul>  
                                        </div>
                                    @endif

                                    @if(session('message'))
                                        <div class="row">
                                            <div class="alert alert-danger" style="margin-bottom: 5px; padding: 7px">{{session('message')}}</div>
                                        </div>
                                    @endif

                                    <form action="{{route('signin')}}" method="post">
                                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                            <label for="email">Masukkan Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{Request::old('email')}}">
                                            @error('email')
                                              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                                            <label for="password">Kata sandi</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                            @error('password')
                                              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
            </div>
        </div>
    
    </body>
</html>


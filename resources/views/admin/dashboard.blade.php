@extends('layouts.admin')
@section('title', 'Halaman Utama')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Halaman Utama</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Item</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('item')}}" alt="item" title="item">{{$item}}</a> PCS</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Produk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('get-produk')}}" alt="produk" title="produk">{{$product_sub_category}}</a> PILIHAN</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sub Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('sub-kategori')}}" alt="sub-kategori" title="Sub Kategori">{{$product_category}} </a>SUB</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('kategori')}}" alt="Kategori" title="Kategori">{{$product}} </a>BAGIAN</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
      <h1 class="h3 mb-0 text-gray-800">Item Andalan</h1>
    </div>

    <div class="row">
      @foreach($top_items as $top_item)
          <div class="col-md-3">
              <div class="card">
                  <img src="{{url('products/'.$top_item->filename)}}" class="img-responsive mx-auto d-block" alt="icon-bag" title="{{$top_item->name}}" style="max-height: 200px; max-width: 200px;" /> <p></p>
                  <h3 class="text-center font-weight-bold">{{ucfirst($top_item->name)}}</h3>
                  <p class="text-center">{{substr($top_item->description,0,50)}}</p>
                  <hr />
                  <h5 class="text-center">Harga Jasa Sampai Batam <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">@currency($top_item->price)</span></h5>
                  <hr />
                  <h5 class="text-center">Harga Jasa Sampai Jakarta <br /><span style="color: #FF5126; font-weight: 600; font-size: 24px">@currency($top_item->price2)</span></h5>
              </div>
          </div>
      @endforeach 
    </div>

  </div>
  <!-- /.container-fluid -->


  @stop

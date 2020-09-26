@extends('layouts.admin')
@section('title', 'Edit Item')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Update Item</h1>
    </div>

    <hr />

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-5 mb-4">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="form-group {{$errors->has('product_name') ? 'has-error' : ''}}">
            <label for="product_name">Nama Item</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="{{$product->name}}" onchange="updateTitlePreview(this.value)">
            @error('product_name')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('product_description') ? 'has-error' : ''}}">
            <label for="product_description">Deskripsi Item</label>
            <textarea name="product_description" id="product_description" class="form-control" rows="5" onchange="updateDescriptionPreview(this.value)">{{$product->description}}</textarea>
            @error('product_description')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('product_price') ? 'has-error' : ''}}">
            <label for="product_price">Harga Batam</label>
            <input type="number" name="product_price" id="product_price" class="form-control" value="{{$product->price}}" onchange="updatePricePreview(this.value)">
            @error('product_price')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('product_price2') ? 'has-error' : ''}}">
            <label for="product_price2">Harga Jakarta</label>
            <input type="number" name="product_price2" id="product_price2" class="form-control" value="{{$product->price2}}" onchange="updatePrice2Preview(this.value)">
            @error('product_price2')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('top_product') ? 'has-error' : ''}}">
            <label class="my-1 mr-2" for="top_product">Pilih Top Item</label>
            <select class="custom-select my-1 mr-sm-2" id="top_product" name="top_product">
              <option value="0" selected>-----Pilih salah satu-----</option>
              <option value="1" @if($product->top == 1) selected="selected" @endif>Top 1</option>
              <option value="2" @if($product->top == 2) selected="selected" @endif>Top 2</option>
              <option value="3" @if($product->top == 3) selected="selected" @endif>Top 3</option>
              <option value="4" @if($product->top == 4) selected="selected" @endif>Top 4</option>
              <option value="5" @if($product->top == 5) selected="selected" @endif>Top 5</option>
            </select>
            <div style="font-size: 12px;"><i>* Dilewati jika bukan merupakan item andalan</i></div>
            @error('top_product')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('product_subcategory') ? 'has-error' : ''}}">
            <label class="my-1 mr-2" for="product_subcategory">Pilih Item</label>
            <select class="custom-select my-1 mr-sm-2" id="product_subcategory" name="product_subcategory">
              <option selected value="0" disabled="disabled">Choose...</option>
              @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}" @if($subcategory->id == $product->product_sub_category_id) selected="selected" @endif>{{$subcategory->name}}</option>
              @endforeach
            </select>
            @error('product_subcategory')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('product_image') ? 'has-error' : ''}}">
              <label for="product_image">Gambar Item:</label>
              <input type="file" class="form-control" name="product_image" onchange="updateImagePreview(this);" id="product_image" />
              <div style="font-size: 12px;"><i>* PNG, JPG, JPEG</i></div>
              <div style="font-size: 12px;"><i>** MAX SIZE: 2056KB</i></div>
              <div style="font-size: 12px;"><i>*** Dikosongkan jika tidak ada pergantian gambar Item</i></div>
              @error('product_image')
                <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
              @enderror
          </div>
<!--           <div class="form-group">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="">Hot Sales
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="">Stok Terbatas
              </label>
            </div>
          </div> -->
          <div class="right">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#cancelUpdateModal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form> 
      </div>

      <div class="col-md-1"></div>

      <div class="col-md-3 mb-4" style="opacity: .6">
        <div class="card">
          <figure style="height:300px;">
            <img id="image-preview" src="{{url('products/'.$product->filename)}}" alt="Image Preview" class="image-responsive image-card" style="max-height:100%; max-width: 100%">
          </figure>
          <div class="col-md-12">
              <h4 style="font-weight: 400; color: #666;" id="TitlePreview"><center>{{$product->name}}</center></h4>
              <p id="DescriptionPreview">{{$product->description}}</p>
              <div style="color:#666;">Batam: <p class="price-card" id="PricePreview">@currency($product->price)</p></div>
              <div style="color:#666;">Jakarta: <p class="price-card" id="Price2Preview">@currency($product->price2)</p></div>
          </div>
        </div>        
      </div>

<!--       <div class="col-md-3 mb-4" style="opacity: .6">
        <div class="card">
          <figure style="height:300px;">
            <img id="image-preview" src="{{url('products/'.$product->filename)}}" alt="Image Preview" class="image-responsive image-card" style="max-height:100%; max-width: 100%">
          </figure>
          <div class="col-md-12">
              <h5 class="price-card">Rp 20000,-</h5>
              <h3 id="TitlePreview"><center>{{$product->name}}</center></h3>
              <span class="badge badge-secondary">LAKU KERAS</span>
              <span class="badge badge-secondary">STOCK TERBATAS</span>
              <p id="DescriptionPreview">{{$product->description}}</p>
          </div>
        </div>
      </div>
 -->
      <!-- Modal -->
      <div class="modal fade" id="cancelUpdateModal" tabindex="-1" role="dialog" aria-labelledby="cancelUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cancelUpdateModalLabel">Membatalkan Update?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin untuk membatalkan update? Data yang telah diubah tidak akan disimpan
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" href="{{url('item')}}">Saya yakin</a>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /.container-fluid -->


  @stop   

@extends('layouts.admin')
@section('title', 'Produk')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="mb-3 text-gray-800">Daftar Produk</h2>
        <button type="button" name="add_produk" id="add_produk" class="add_produk btn btn-primary btn-xs" data-toggle="modal" data-target="#addProdukModal">Tambah</button>
    </div>

    @if(Session::has('message'))
      <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    <hr />
    <!-- Content Row -->
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="sub-product-table"> 
            <thead>
              <tr>
                <th>Nama</th>
                <th>Sub-Kategori</th>
                <th>Kategori</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- Tambah Modal -->
      <div class="modal fade bd-example-modal-lg" id="addProdukModal" tabindex="-1" role="dialog" aria-labelledby="addProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProdukModalLabel">Tambah Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('add-produk')}}" method="post">
              <div class="modal-body">
                <div class="col">
                  <h3>Produk</h3>
                  <div class="form-group {{$errors->has('_add_name') ? 'has-error' : ''}}">
                    <label for="_add_name">Nama Produk</label>
                    <input type="text" name="_add_name" id="_add_name" class="form-control" value="{{Request::old('_add_name')}}">
                    @error('_add_name')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group {{$errors->has('product_category_id') ? 'has-error' : ''}}">
                    <label class="my-1 mr-2" for="product_category">Pilih Sub Kategory</label>
                    <select class="custom-select my-1 mr-sm-2" id="_add_product_category" name="_add_product_category">
                      <option value="0" selected disabled="disabled">Choose...</option>
                      @foreach($sub_products as $sub_product)
                        <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
                      @endforeach
                    </select>
                    @error('_add_product_category')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Edit Modal -->
      <div class="modal fade bd-example-modal-lg" id="editProdukModal" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update-produk')}}" method="post">
            <div class="modal-body">
              <div class="col">
                <h3>Produk</h3>
                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                  <label for="name">Nama Produk</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')}}">
                  @error('name')
                    <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group {{$errors->has('product_category_id') ? 'has-error' : ''}}">
                  <label class="my-1 mr-2" for="product_category">Pilih Sub Kategory</label>
                  <select class="custom-select my-1 mr-sm-2" id="product_category" name="product_category">
                    <option selected value="0" disabled="disabled">Choose...</option>
                    @foreach($sub_products as $sub_product)
                      <option value="{{$sub_product->id}}">{{$sub_product->name}}</option>
                    @endforeach
                  </select>
                  @error('product_category_id')
                    <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Perbaharui</button>
              <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteProdukModal" tabindex="-1" role="dialog" aria-labelledby="deleteProdukModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteProdukModal">Hapus Produk?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin untuk menghapus produk yang dipilih?
            </div>
            <div class="modal-footer">
              <form action="{{route('delete-produk')}}" method="post">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                <button type="submit" class="btn btn-primary">Iya, Saya yakin</button>
                <input type="hidden" name="_del_sub_cat_id" id="_del_sub_cat_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#sub-product-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{route('get-produk')}}",
          },
          columns: [
            {
              data: 'name',
              name: 'name',
            },
            {
              data: 'category.name',
              name: 'category.name',
            },
            {
              data: 'category.product.name',
              name: 'category.product.name'
            },
            {
              data: 'created_at',
              name: 'created_at',
            },
            {
              data: 'updated_at',
              name: 'updated_at',
            },
            {
              data: 'action',
              name: 'action',
              orderable: false
            }
          ]
        });
      })
    </script>


  </div>
  <!-- /.container-fluid -->


  @stop
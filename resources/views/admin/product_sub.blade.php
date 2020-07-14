@extends('layouts.admin')
@section('title', 'Sub-Kategori')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="mb-3 text-gray-800">Daftar Sub-Kategori</h2>
        <button type="button" name="add_sub_produk" id="add_sub_produk" class="add_sub_produk btn btn-primary btn-xs" data-toggle="modal" data-target="#addSubCategoryModal">Tambah</button>
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
                <th>Nama Sub-Kategori</th>
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
      <div class="modal fade bd-example-modal-lg" id="addSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addSubCategoryModalLabel">Tambah Sub-Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('add-sub-category')}}" method="post">
              <div class="modal-body">
                <div class="col">
                  <h3>Sub-Kategori</h3>
                  <div class="form-group {{$errors->has('_add_name') ? 'has-error' : ''}}">
                    <label for="_add_name">Nama Sub-Kategori</label>
                    <input type="text" name="_add_name" id="_add_name" class="form-control" value="{{Request::old('_add_name')}}">
                    @error('_add_name')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group {{$errors->has('_add_category') ? 'has-error' : ''}}">
                    <label class="my-1 mr-2" for="_add_category">Pilih Kategory</label>
                    <select class="custom-select my-1 mr-sm-2" id="_add_category" name="_add_category">
                      <option selected value="0" disabled="disabled">Choose...</option>
                      @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('_add_category')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade bd-example-modal-lg" id="editSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editSubCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editSubCategoryModalLabel">Edit Sub-Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update-sub-category')}}" method="post">
              <div class="modal-body">
                <div class="col">
                  <h3>Sub-Kategori</h3>
                  <div class="form-group {{$errors->has('_edit_name') ? 'has-error' : ''}}">
                    <label for="_edit_name">Nama Sub-Kategori</label>
                    <input type="text" name="_edit_name" id="_edit_name" class="form-control" value="{{Request::old('_edit_name')}}">
                    @error('_edit_name')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group {{$errors->has('_edit_category') ? 'has-error' : ''}}">
                    <label class="my-1 mr-2" for="_edit_category">Pilih Kategory</label>
                    <select class="custom-select my-1 mr-sm-2" id="_edit_category" name="_edit_category">
                      <option selected value="0" disabled="disabled">Choose...</option>
                      @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('_edit_category')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <input type="hidden" name="cat_id" id="cat_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="{{route('delete-sub-category')}}" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteSubCategoryModalLabel">Hapus Sub Kategori?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin untuk menghapus sub kategori yang dipilih?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                <button type="submit" class="btn btn-primary">Iya, Saya yakin</button>
                <input type="hidden" name="_del_cat_id" id="_del_cat_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
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
            url: "{{route('sub-kategori')}}",
          },
          columns: [
            {
              data: 'name',
              name: 'name',
            },
            {
              data: 'product.name',
              name: 'name',
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
@extends('layouts.admin')
@section('title', 'Kategori')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="mb-3 text-gray-800">Daftar Kategori</h2>
        <button type="button" name="add_sub_produk" id="add_sub_produk" class="add_sub_produk btn btn-primary btn-xs" data-toggle="modal" data-target="#addCategoryModal">Tambah</button>
    </div>

    @if(Session::has('message'))
      <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    <hr />
    <!-- Content Row -->
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="product-table"> 
            <thead>
              <tr>
                <th>Ikon</th>
                <th>Kategori</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- Tambah Modal -->
      <div class="modal fade bd-example-modal-lg" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('add-category')}}" method="post">
              <div class="modal-body">
                <div class="col">
                  <h3>Kategori</h3>
                  <div class="form-group {{$errors->has('_add_name') ? 'has-error' : ''}}">
                    <label for="_add_name">Nama Kategori</label>
                    <input type="text" name="_add_name" id="_add_name" class="form-control" value="{{Request::old('_add_name')}}">
                    @error('_add_name')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group {{$errors->has('product_icon') ? 'has-error' : ''}}">
                    <label for="product_icon">Pilih Ikon</label>
                    <input type="text" name="add_selected_product_icon" id="add_selected_product_icon" class="form-control" value="{{Request::old('product_icon')}}" disabled="disabled">
                    <div id="icon-list" style="padding: 10px; border: 1px solid; border-radius: 5px; margin-top: 15px"></div>
                    @error('product_icon')
                      <div style="font-size: 1em; color: firebrick;">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <input type="hidden" name="_add_product_icon" id="_add_product_icon" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade bd-example-modal-lg" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update-category')}}" method="post">
              <div class="modal-body">
                <div class="col">
                  <h3>Kategori</h3>
                  <div class="form-group {{$errors->has('_edit_name') ? 'has-error' : ''}}">
                    <label for="_edit_name">Nama Kategori</label>
                    <input type="text" name="_edit_name" id="_edit_name" class="form-control" value="{{Request::old('_edit_name')}}">
                    @error('_edit_name')
                      <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group {{$errors->has('product_icon') ? 'has-error' : ''}}">
                    <label for="product_icon">Pilih Ikon</label>
                    <input type="text" class="form-control" name="edit_selected_product_icon" id="edit_selected_product_icon" value="{{Request::old('product_icon')}}" disabled="disabled">
                    <div id="edit-icon-list" style="padding: 10px; border: 1px solid; border-radius: 5px; margin-top: 15px"></div>
                    @error('product_icon')
                      <div style="font-size: 1em; color: firebrick;">{{$message}}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <input type="hidden" name="_edit_product_icon" id="_edit_product_icon" value="">
                <input type="hidden" name="_edit_product_id" id="_edit_product_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteCategoryModalLongTitle">Hapus Kategori?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('delete-category')}}" method="post">
              <div class="modal-body">
                Apakah anda yakin untuk menghapus kategori yang dipilih?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                <button type="submit" class="btn btn-primary">Iya, Saya yakin</button>
                <input type="hidden" name="_del_product_id" id="_del_product_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#product-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{route('kategori')}}",
          },
          columns: [
            {
              data: 'icon',
              name: 'icon',
              "render": function ( data, type, row, meta ) {
                return '<i class="icon '+data+'" style="font-size:20px;"></span>';
              }
            },
            {
              data: 'name',
              name: 'Kategori',
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
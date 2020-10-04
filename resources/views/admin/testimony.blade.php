@extends('layouts.admin')
@section('title', 'Testimoni')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-3 text-gray-800">Daftar Testimoni</h1>
        <a href="{{url('add-testimony')}}" class="btn btn-primary"><i class="icon-plus"></i> Tambah Testimoni</a>
    </div>

    @if(Session::has('message'))
      <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    <hr />
    <!-- Content Row -->
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="item-table"> 
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Dibuat pada</th>
                <th>Diperbaharui pada</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteItemModalLabel">Hapus Testimoni?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin untuk menghapus testimoni yang dipilih?
            </div>
            <div class="modal-footer">
              <form action="{{route('delete-testimony')}}" method="post">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                <button type="submit" class="btn btn-primary">Iya, Saya yakin</button>
                <input type="hidden" name="_del_testimony_id" id="_del_item_id" value="">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
      $(document).ready(function(){
        $('#item-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{route('testimony')}}",
          },
          bSort: true,
          // dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          columns: [
            {
              data: 'pictures', 
              name: 'pictures',
              render: function( data, type, full, meta ) {
                  return "<img src=\"products/" + data + "\" height=\"50\"/>";
                  // return "<img src={{url('products/" + data + "')}} />";
              }
            },
            {
              data: 'name',
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
{{-- <div class="table-responsive"> --}}
{{--     <table class="table table-hover"> --}}
{{--         <thead> --}}
{{--             <tr> --}}
{{--                 {{-1- <th class="cs-p-1">Name</th> -1-}} --}}
{{--                 <th class="cs-p-1">Picture</th> --}}
{{--             </tr> --}}
{{--         </thead> --}}

{{--         @forelse($pictures as $picture) --}}
{{--             <tr> --}}
{{--                 {{-1- <td class="cs-p-1">{{ $image->name }}</td> -1-}} --}}
{{--                 <td class="cs-p-1"><a href="{{ $picture>url }}">View Picture</a></td> --}}
{{--             </tr> --}}
{{--             @empty --}}
{{--             <p>No Pictures at the moment</p> --}}
{{--         @endforelse --}}
{{--     </table> --}}
{{-- </div> --}}


  @stop

@extends('layouts.admin')
@section('title', 'Akun Saya')
@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Akun Saya</h1>
    </div>

    @if(Session::has('message'))
      <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    @if(Session::has('error'))
      <div class="alert alert-danger">{{Session::get('error')}}</div>
    @endif

    <hr />

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-5 mb-4">
        <form action="{{url('account')}}" method="post" enctype="multipart/form-data">
          <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
            @error('email')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('current_password') ? 'has-error' : ''}}">
            <label for="current_password">Password Sekarang</label>
            <input type="password" name="current_password" id="current_password" class="form-control" value="{{Request::old('current_password')}}">
            @error('current_password')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('new_password') ? 'has-error' : ''}}">
            <label for="new_password">Password Terbaru</label>
            <input type="password" name="new_password" id="new_password" class="form-control" value="{{Request::old('new_password')}}">
            <div style="font-size: 12px;"><i>* Minimal 8 karakter</i></div>
            @error('new_password')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group {{$errors->has('confirm_new_password') ? 'has-error' : ''}}">
            <label for="confirm_new_password">Masukkan Kembali Password Terbaru</label>
            <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" value="">
            @error('confirm_new_password')
              <div style="font-size: 1em; color: firebrick; ">{{$message}}</div>
            @enderror
          </div>
          <!-- div class="form-group">
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
          <button type="submit" class="btn btn-primary">Update</button>
          
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form> 
      </div>

    </div>
  </div>
  <!-- /.container-fluid -->


  @stop   
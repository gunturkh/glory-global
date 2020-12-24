@extends('layouts.admin')
@section('title', 'Testimoni')
@section('content')
<div class="container-fluid">
    {{-- <!-- Page Heading --> --}}
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
    {{--   <h1 class="h3 mb-0 text-gray-800">Upload Testimoni</h1> --}}
    {{-- </div> --}}

    {{-- <hr /> --}}
    <div class="row justify-content-center">
        <h2 class="card-header w-100 m-1 text-center">Update Testimony Picture</h2>
    </div>
    <div class="row justify-content-center">
    {{-- enctype attribute is important if your form contains file upload --}}
    {{-- Please check https://www.w3schools.com/tags/att_form_enctype.asp for further info --}}
        <form class="m-2" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="name">File Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter file Name" name="name" value="{{$testimony->name}}"> 
            </div>
            <div class="form-group" style="display: flex; flex-direction: column; align-items: center;">
                <label for="picture">Replace Picture : {{$testimony->pictures}}</label>
                <input id="picture" type="file" name="picture">
            </div>
            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Replace</button>
        </form>
    </div>
    {{-- @include('components.errors') --}}
</div>
@stop   

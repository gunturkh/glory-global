<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="_token" content="{{ csrf_token() }}" />

	<!-- Custom fonts for this template-->
	<!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('css/icomoon.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/themify-icons.css')}}">
	<!-- Bootstrap CSS -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->

	<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    <!-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- <link rel="stylesheet" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.css" /> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    @stack('scripts')

	<title>@yield('title') - PT Glori Global Sukses</title>
</head>
<body id="page-top">
	<div id="wrapper">
		@include('layouts.sidebar')
		<!-- Content Wrapper -->
	    <div id="content-wrapper" class="d-flex flex-column"  style="background-color: #fff">

	     	<!-- Main Content -->
	    	<div id="content">
	    		<!-- Topbar -->
		        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		        <!-- Sidebar Toggle (Topbar) -->
		          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		            Toggle
		          </button>

		          <!-- Topbar Navbar -->
		          <ul class="navbar-nav ml-auto">

		            <div class="topbar-divider d-none d-sm-block"></div>

		            <!-- Nav Item - User Information -->
		            <li class="nav-item dropdown no-arrow">
		              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->email}}</span>
		                <img class="img-profile rounded-circle" src="https://source.unsplash.com/user/erondu/60x60">
		              </a>
		              <!-- Dropdown - User Information -->
		              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
		                <a class="dropdown-item" href="{{url('account')}}">
		                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
		                  Profile
		                </a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
		                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
		                  Logout
		                </a>
		              </div>
		            </li>

		          </ul>

		        </nav>
		        <!-- End of Topbar -->
		        @yield('content')

	    	</div>
      		<!-- End of Main Content -->
      		<!-- Footer -->
		      <footer class="sticky-footer bg-white">
		        <div class="container my-auto">
		          <div class="copyright text-center my-auto">
		            <span>Copyright &copy; 2020 PT Glori Global Sukses</span>
		          </div>
		        </div>
		      </footer>
		    <!-- End of Footer -->

		    <!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content">
				            <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
				                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">×</span>
				                </button>
				            </div>
				            <div class="modal-body">Pilih "Keluar" dibawah ini jika anda ingin mengakhiri sesi anda.</div>
				            <div class="modal-footer">
				                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
				                <a class="btn btn-primary" href="{{route('logout')}}">Keluar</a>
				            </div>
				        </div>
				    </div>
				</div>


	    </div>
	    <!-- End of Content Wrapper -->

	</div>
	  <!-- Bootstrap core JavaScript-->
	  <script src="{{URL::asset('jquery/jquery.min.js')}}"></script>
	  <script src="{{URL::asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	  <!-- Custom scripts for all pages-->
	  <script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>
	  <script src="{{URL::asset('js/products.js')}}"></script>
	  <script src="{{URL::asset('js/view-product.js')}}"></script>
	  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>


</body>
</html>
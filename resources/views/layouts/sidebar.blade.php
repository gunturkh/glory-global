<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        <div class="sidebar-brand-text mx-3">Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{\Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{url('dashboard')}}">
          <span>Menu Utama</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Module
      </div>

      <li class="nav-item {{\Request::is('kategori') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('kategori')}}">
          <span>Kategori</span>
        </a>
      </li>

      <li class="nav-item {{\Request::is('sub-kategori') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('sub-kategori')}}">
          <span>Sub Kategori</span>
        </a>
      </li>

      <li class="nav-item {{\Request::is('get-produk') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('get-produk')}}">
          <span>Produk</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{\Request::is('item') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('item')}}">
          <span>Item</span>
        </a>
      </li>

      <!-- Nav Testimony - Pages Collapse Menu -->
      <li class="nav-item {{\Request::is('item') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('testimony')}}">
          <span>Testimoni</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{\Request::is('account') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{url('account')}}">
          <span>Akun</span>
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->

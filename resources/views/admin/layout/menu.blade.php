<body class="navbar-fixed sidebar-fixed" id="body">  
{{-- <div id="toaster"></div> --}}

<div class="wrapper">
      
      
    <!-- ====================================
      ——— LEFT SIDEBAR WITH OUT FOOTER
    ===================================== -->
    <aside class="left-sidebar sidebar-dark" id="left-sidebar">
      <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="#">
            <img src="{{ asset('image/logo.png') }}" alt="Mono" style="max-height: 40px">
            <span class="brand-name">Petani</span>
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">
            
              <li class=" ">
                <a class="sidenav-item-link" href="/admin">
                  {{-- <i class="mdi mdi-briefcase-account-outline"></i> --}}
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/admin/produk">
                  <i class="mdi mdi-printer-3d"></i>
                  <span class="nav-text">Data Produk</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/admin/tanah">
                  <i class="mdi mdi-tooltip-image"></i>
                  <span class="nav-text">Data Tanah</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/admin/katagori">
                  <i class="mdi mdi-dip-switch"></i>
                  <span class="nav-text">Data Katagori</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/admin/berita">
                  <i class="mdi mdi-newspaper"></i>
                  <span class="nav-text">Data Berita</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/admin/user">
                  <i class="mdi mdi-account"></i>
                  <span class="nav-text">Data User</span>
                </a>
              </li>

              <li class=" ">
                <a class="sidenav-item-link" href="/mid">
                  {{-- <i class="mdi mdi-briefcase-account-outline"></i> --}}
                  <span class="nav-text">Mid</span>
                </a>
              </li>
            
      </div>
    </aside>

  

  <!-- ====================================
  ——— PAGE WRAPPER
  ===================================== -->
  <div class="page-wrapper">
    
      <!-- Header -->
      <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>

          <span class="page-title">dashboard</span>

          <div class="navbar-right ">

            <!-- search form -->
            <!-- <div class="search-form">
              <form action="index.html" method="get">
                <div class="input-group input-group-sm" id="input-group-search">
                  <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                  <div class="input-group-append">
                    <button class="btn" type="button">/</button>
                  </div>
                </div>
              </form>
              <ul class="dropdown-menu dropdown-menu-search">

                <li class="nav-item">
                  <a class="nav-link" href="index.html">Morbi leo risus</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Vestibulum at eros</a>
                </li>

              </ul>

            </div> -->

            <ul class="nav navbar-nav">
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                  {{-- <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" /> --}}
                  <span class="d-none d-lg-inline-block">{{$username}}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a class="dropdown-link-item" href="user-profile.html">
                      <i class="mdi mdi-account-outline"></i>
                      <span class="nav-text">My Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-footer">
                    <a class="dropdown-link-item" href="/logout"> <i class="mdi mdi-logout"></i> Log Out </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>


      </header>

    <!-- ====================================
    ——— CONTENT WRAPPER
    ===================================== -->
    <div class="content-wrapper">
        <div class="content">                
            @include($marge)   
        </div>  
    </div>
    
      <!-- Footer -->
      <footer class="footer mt-auto">
        <div class="copyright bg-white">
          <p>
            &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://instagram.com/alief.ngr" target="_blank" >Anugerah Alief Riadi</a>.
          </p>
        </div>
        <script>
            var d = new Date();
            var year = d.getFullYear();
            document.getElementById("copy-year").innerHTML = year;
        </script>
      </footer>

  </div>
</div>
</body>
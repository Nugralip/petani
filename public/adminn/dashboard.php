<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Srikala - Dashboard</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  
  
  
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  
  
  
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  
  
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
  
  
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />
  
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  


  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    
    <div id="toaster"></div>
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/index.html">
                <img src="images/logo.png" alt="Mono">
                <span class="brand-name">Srikala</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li
                   class="active"
                   >
                    <a class="sidenav-item-link" href="dashboard.php">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                      aria-expanded="false" aria-controls="email">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Data</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="email"
                      data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li >
                              <a class="sidenav-item-link" href="pesanan.php">
                                <i class="mdi mdi-account-box-multiple"></i>
                                <span class="nav-text"> Pesanan</span>
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="rute.php">
                                <i class="mdi mdi-road-variant"></i>
                                <span class="nav-text"> Rute</span> 
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="harga.php">
                                <i class="mdi mdi-square-inc-cash"></i>
                                <span class="nav-text"> Harga</span> 
                              </a>
                            </li>
                            
                        </div>
                    </ul>
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
                      <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block"><?php echo $_SESSION['username']; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="user-profile.html">
                          <i class="mdi mdi-account-outline"></i>
                          <span class="nav-text">My Profile</span>
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="dropdown-link-item" href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
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
                  <!-- Top Statistics -->
                  <div class="row">
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-default card-mini">
                        <div class="card-header">
                        <?php
                        // https://www.malasngoding.com
                        
                        // menghubungkan dengan koneksi database
                        include 'koneksi.php';
                        
                        // mengambil data barang
                        $data_pesan = mysqli_query($koneksi,"SELECT * FROM pesan");
                        
                        // menghitung data barang
                        $jumlah_pesan = mysqli_num_rows($data_pesan);
                        ?>
                          <h2><?= $jumlah_pesan." Pesanan"?></h2>
                          <div class="sub-title">
                            
                          </div>
                          <a href="pesanan.php" class="btn btn-primary mt-5">View</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-default card-mini">
                        <div class="card-header">
                        <?php
                        // https://www.malasngoding.com
                        
                        // menghubungkan dengan koneksi database
                        
                        // mengambil data barang
                        $data_rute = mysqli_query($koneksi,"SELECT * FROM berangkat");
                        
                        // menghitung data barang
                        $jumlah_rute = mysqli_num_rows($data_rute);
                        ?>
                          <h2><?= $jumlah_rute." Rute"?></h2>
                          <div class="sub-title">
                            
                          </div>
                          <a href="rute.php" class="btn btn-secondary mt-5">View</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-default card-mini">
                        <div class="card-header">
                        <?php
                        // https://www.malasngoding.com
                        
                        // menghubungkan dengan koneksi database
                        
                        // mengambil data barang
                        $data_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                        
                        // menghitung data barang
                        $jumlah_kelas = mysqli_num_rows($data_kelas);
                        ?>
                          <h2><?= $jumlah_kelas." Kelas"?></h2>
                          <div class="sub-title">
                            
                          </div>
                          <a href="harga.php" class="btn btn-info mt-5">View</a>
                        </div>
                      </div>
                    </div>
                  </div>
</div>
          
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Abdus</a>.
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



    
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    
                    <script src="plugins/apexcharts/apexcharts.js"></script>
                    
                    
                    
                    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                    
                    
                    
                    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
                    
                    
                    
                    <script src="plugins/daterangepicker/moment.min.js"></script>
                    <script src="plugins/daterangepicker/daterangepicker.js"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    
                    
                    <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "welcome"){
                                echo '<script src="plugins/toaster/toastr.min.js"></script>';
                            }
                        }
                    ?>
 
                    <script src="js/mono.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

  </body>
</html>

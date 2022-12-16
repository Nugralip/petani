<?php 
    include 'koneksi.php';

    

    if(isset($_POST['login'])){
        session_start();
 
        // menangkap data yang dikirim dari form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // menyeleksi data admin dengan username dan password yang sesuai
        $data = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
        
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
        
        if($cek > 0){
            $_SESSION['username'] = $username;
            foreach($data as $data){
                $_SESSION['id'] = $data['id_user'];
                $_SESSION['name'] = $data['nama'];
            }
            $_SESSION['status'] = "login";
            header("location:dashboard.php?pesan=welcome");
        }else{
            header("location:index.php?pesan=gagal");
        }
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Srikala - Login Admin</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
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

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10">
                <div class="card card-default mb-0">  
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="images/logo.png" alt="Mono">
                        <span class="brand-name text-dark">MONO</span>
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center">Sign in for Admin</h4>

                    <form action=" " method="POST">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="email" aria-describedby="emailHelp" name="username" placeholder="email">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">

                          <button type="submit" name="login" value="login" class="btn btn-primary btn-pill mb-4">Sign In</button>

                        </div>
                      </div>
                    </form>
                    <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "gagal"){
                                echo '<div class="alert alert-primary" role="alert" align="center">
                                      Login gagal! username dan password salah!
                                      </div>';
                            }else if($_GET['pesan'] == "logout"){
                                echo '<div class="alert alert-primary" role="alert" align="center">
                                      Anda telah berhasil logout
                                      </div>';
                            }else if($_GET['pesan'] == "belum_login"){
                                echo '<div class="alert alert-primary" role="alert" align="center">
                                      Anda harus login untuk mengakses halaman admin
                                      </div>';
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</body>
</html>

<?php
// Start the session
session_start();

if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>D-MAIL Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.php" class="navbar-brand">
                  <div class="brand-text brand-big"><span>D-MAIL</span></div>
                  <div class="brand-text brand-small"><strong>D-MAIL</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="../img/user.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo "". $_SESSION['nama'];?></h1>
              <p><?php echo "". $_SESSION['lepel'];?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"> <a href="index.php"><i class=""></i>Home</a></li>
            <li><a href="#opensiswa" aria-expanded="false" data-toggle="collapse"> <i class=""></i>Surat </a>
              <ul id="opensiswa" class="collapse list-unstyled">
                <li><a href="suratmasuk.php">Surat Masuk</a></li>
                <li><a href="suratkeluar.php">Surat Keluar</a></li>
              </ul>
            </li>
            <li class=""> <a href="klasifikasi.php"><i class=""></i>Klasifikasi</a></li>
            <li><a href="#openreport" aria-expanded="false" data-toggle="collapse"> <i class=""></i>Report </a>
              <ul id="openreport" class="collapse list-unstyled">
                <li><a href="suratmasukreport.php">Surat Masuk</a></li>
                <li><a href="suratkeluarreport.php">Surat Keluar</a></li>
              </ul>
            </li>
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="settingakun.php"> <i class=""></i>Pengaturan Akun </a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Home</h2>
            </div>
          </header><br>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-12 col-sm-6">
                  <div class="item d-flex align-items-md-center">
                    <div class="title"><h4>Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
                        <p class="description">Anda login sebagai
                        <?php
                            echo "<strong>". $_SESSION['lepel'];
                                echo "</strong>. Anda memiliki akses penuh terhadap sistem.";
                            ?></p>
                    </div>
                  </div>
                </div>
              </div><br>
              <?php
                include('../koneksi.php');
                //menghitung jumlah surat masuk
                $count1 = mysql_num_rows(mysql_query("SELECT * FROM tbl_surat_masuk"));

                //menghitung jumlah surat masuk
                $count2 = mysql_num_rows(mysql_query("SELECT * FROM tbl_surat_keluar"));

                //menghitung jumlah surat masuk
                $count3 = mysql_num_rows(mysql_query("SELECT * FROM tbl_disposisi"));

                //menghitung jumlah klasifikasi
                $count4 = mysql_num_rows(mysql_query( "SELECT * FROM tbl_klasifikasi"));
                //menghitung jumlah pengguna
                $count5 = mysql_num_rows(mysql_query("SELECT * FROM user"));
              ?>

              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">SM</div>
                    <div class="title"><i class="material-icons md-36"></i> Jumlah Surat Masuk
                    </div>
                    <?php echo '<div class="number"><strong>'.$count1.'</strong></div>';?>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red">SK</div>
                    <div class="title"><span class="card-title white-text"><i class="material-icons md-36"></i> Jumlah Surat Keluar</span>
                    </div>
                    <?php echo '<div class="number"><strong>'.$count2.'</strong></div>';?>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green">D</div>
                    <div class="title"><span class="card-title white-text"><i class="material-icons md-36"></i> Jumlah Disposisi</span>
                    </div>
                    <?php echo '<div class="number"><strong>'.$count3.'</strong></div>';?>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange">P</div>
                    <div class="title"><span class="card-title white-text"><i class="material-icons md-36"></i> Jumlah Pengguna</span>
                    </div>
                    <?php echo '<div class="number"><strong>'.$count4.'</strong></div>';?>
                  </div>
                </div>
              </div>
          </div>
        </section>
        <!-- Row END -->
          <br><br><br>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6 text-right">
                    <p>Copyright 2018 ©</p> 
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/charts-home.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>
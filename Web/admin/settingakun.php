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
    <style>
    </style>
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
            <li> <a href="index.php"><i class=""></i>Home</a></li>
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
            <li class="active"> <a href="settingakun.php"> <i class=""></i>Pengaturan Akun </a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Pengaturan Akun</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
        <table align="right" class="table table-hover table-responsive table display" id="table" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Akses Yang di Inginkan</th>
                <th>Akses Yang di Beri</th>
                <th>Status</th>
                <th>Beri Akses</th>
              </tr>
              </thead>
            <tbody>
            <?php
              // include Database connection file 
              include("../koneksi.php");

              // Design initial table header 

              $query = "SELECT * FROM user order by id asc";

              if (!$result = mysql_query($query)) {
                exit(mysql_error());
              }

              // if query results contains rows then featch those rows 
              if(mysql_num_rows($result) > 0)
              {
                $number = 1;
                while($row = mysql_fetch_assoc($result))
                {
                  if (strpos($row["leveladmin"], '1') === false){
                  $akses=mysql_fetch_array(mysql_query("SELECT sebagai FROM hakakses WHERE level='$row[level]'"));
                  $aksesadmin=mysql_fetch_array(mysql_query("SELECT sebagai FROM hakakses WHERE level='$row[leveladmin]'"));
                  echo '
                  <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['fullname'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$akses['sebagai'].'</td>
                    <td>'.$aksesadmin['sebagai'].'</td>
                    <td>'.$row['status'].'</td>
                    <td>
                    <button onclick="updateakses('.$row['id'].')" class="btn btn-outline-primary">Update</button>
                    | <button onclick="deletesiswa('.$row['id'].')" class="btn btn-outline-danger">Delete</button>
                    </td>
                  </tr>
                  ';
                  $number++;
                  }
                }
              }
              else
              {
                // records now found 
                $data .= '<tr><td colspan="6">Records not found!</td></tr>';
              }
            ?>
            </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="updatesiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Akses</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="hkupdate">Hak Akses :</label>
              <select id="hkupdate" required="" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Petugas</option>
                <option value="3">Disposisier</option>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status :</label>
              <select id="status" required="" class="form-control">
                <option value="">Active</option>
                <option value="Blocked">Block Account</option>
              </select>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" onclick="aksesupdate()">Update Akses</button>
            <input type="hidden" id="hidden_user_id">
          </div>
        </div>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="deletesiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Delete Akun</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="form-group">
          <br>
          <center>
          <h5>Kamu Yakin, Ingin Delete Akun Ini ?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" onclick="aksesdelete()">Delete Akun</button>
            <input type="hidden" id="hidden_delete_id">
          </div>
        </div>
        </div>
      </div>
    </div>
    </section>
          <!-- Page Footer-->
          <footer class="main-footer footer">
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
    <script type="text/javascript" src="../js/res/js/script.js"></script>
    <script type="text/javascript">
    function updateakses(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
        $.post("../admin/bacaakses.php", {
                id: id
            },
            function (data, status) {
                // PARSE json data
                var user = JSON.parse(data);
                // Assing existing values to the modal popup fields
                $("#hkupdate").val(user.leveladmin)
                $("#status").val(user.status)
            }
        );
        // Open modal popup
        $("#updatesiswa").modal("show");
    }
    function aksesupdate() {
        // get values
        var level = $("#hkupdate").val();
        var stat = $("#status").val();

        // get hidden field value
        var id = $("#hidden_user_id").val();

        // Update the details by requesting to the server using ajax
        $.post("../admin/proses_hkupdate.php", {
                id: id,
                level: level,
                stat: stat
            },
            function (data, status) {
                // hide modal popup
                $("#updatesiswa").modal("hide");
                // reload Users by using readRecords();
                location.reload();
            }
        );
    }
    function aksesdelete() {
        // get hidden field value
        var id = $("#hidden_delete_id").val();

        // Update the details by requesting to the server using ajax
        $.post("../admin/proses_deleteakun.php", {
                id: id
            },
            function (data, status) {
                // hide modal popup
                $("#deletesiswa").modal("hide");
                // reload Users by using readRecords();
                location.reload();
            }
        );
    }
    </script>
  </body>
</html>
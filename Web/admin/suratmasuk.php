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
            <li class="active"><a href="#opensiswa" aria-expanded="false" data-toggle="collapse"> <i class=""></i>Surat </a>
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
              <h2 class="no-margin-bottom">Surat Masuk</h2>
            </div>
          </header>
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
            <form class="row">
              <div class="input-group col-lg-4">
              <input class="form-control" id="search1" type="text" placeholder="Search..">
              <span class="input-group-btn">
                      <button type="button" class="btn btn-dark">Search</button></span>
                      </div>
            </form>
            <div class="form-inline container-fluid">
              <div class="">
                  <a href="tambah_suratmasuk.php" data-toggle="tooltip" title="Tambah surat masuk"><img src="../img/tambah.png"></a>&nbsp&nbsp&nbsp
                  <a href="ubah_suratmasuk.php" data-toggle="tooltip" title="Ubah surat masuk"><img src="../img/ubah.png"></a>
              </div>
            </div>
            
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
            <table align="right" class="table table-hover table-responsive table display" id="table" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                <th>No Surat</th>
                <th>Kode Surat</th>
                <th>Asal Surat</th>
                <th>Subject</th>
                <th>Tanggal Surat</th>
                <th>File</th>
                <th>Keterangan</th>
                <th>Disposisi / Print / Hapus</th>
              </tr>
              </thead>
            <tbody>
            <?php
              // include Database connection file 
              include("../koneksi.php");

              // Design initial table header 

              $query = "SELECT * FROM tbl_surat_masuk order by id_surat asc";

              if (!$result = mysql_query($query)) {
                exit(mysql_error());
              }

              // if query results contains rows then featch those rows 
              if(mysql_num_rows($result) > 0)
              {
                $number = 1;
                while($row = mysql_fetch_assoc($result))
                {
                  //$akses=mysql_fetch_array(mysql_query("SELECT sebagai FROM hakakses WHERE level='$row[level]'"));
                  //$aksesadmin=mysql_fetch_array(mysql_query("SELECT sebagai FROM hakakses WHERE level='$row[leveladmin]'"));
                  echo '
                  <tr>
                    <td>'.$row['no_surat'].'</td>
                    <td>'.$row['kode'].'</td>
                    <td>'.$row['asal_surat'].'</td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['tgl_surat'].'</td>
                    <td><a href="../uploads/'.$row['file'].'" target="_blank">Lihat</a></td>
                    <td>'.$row['keterangan'].'</td>
                    <td>
                    <button onclick="disposisi('.$row['id_surat'].')" data-toggle="tooltip" title="Disposisi surat masuk"><img src="../img/disposisi.png" height="35px" width="35px"></button>&nbsp
                      <button data-toggle="tooltip" title="Print surat"><a class="print" href="cetak_disposisi.php?idsurat='.$row['id_surat'].'" target="_blank">
                        <img src="../img/prin.png" height="35px" width="35px"></a></button>&nbsp
                      <button onclick="deletedisposisi('.$row['id_surat'].')" data-toggle="tooltip" title="Hapus surat masuk"><img src="../img/buang.png" height="35px" width="35px"></button>
                    </td>
                  </tr>
                  ';
                  $number++;
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
            <h4 class="modal-title">Disposisi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="tujuan">Tujuan :</label>
              <input type="text" class="form-control" id="tujuan" name="tujuan">  
            </div>

              <div class="form-group">
                <label for="sifat">Sifat :</label>
                <select id="sifat" name="sifat" required="" class="form-control">
                  <?php
                        include('../koneksi.php');
                        $query = "SELECT * FROM tbl_klasifikasi";
                        $hasil = mysql_query($query);
                        while ($data = mysql_fetch_array($hasil))
                        {
                          echo "<option value='".$data['nama']."'>".$data['kode']." - ".$data['nama']."</option>";
                        }
                  ?>
                </select>
              </div>

            <div class="form-group">
              <label for="bwdate">Batas waktu :</label>
              <input type="date" class="form-control" id="bwdate" name="bwdate">  
            </div>

            <div class="form-group">
              <label for="catatatn">Catatan :</label>
              <input type="text" class="form-control" id="catatan" name="catatan">  
            </div>

            <div class="form-group">
              <label for="isidis">Isi disposisi :</label>
              <textarea type="coment" rows="3" class="form-control" id="isidis" name="isidis"></textarea> 
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" onclick="tdisposisi()">Disposisi</button>
            <input type="hidden" id="hidden_user_iduser">
            <input type="hidden" id="hidden_user_idsurat">
            <input type="hidden" id="hidden_user_disposisi">
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
            <h4 class="modal-title">Delete Surat</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="form-group">
          <br>
          <center>
          <h5>Kamu Yakin, Ingin Delete Surat Ini ?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" onclick="suratdelete()">Delete Surat</button>
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
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    function disposisi(id) {
    // Add User ID to the hidden field for furture usage
        $("#hidden_user_iduser").val(id);
        $("#hidden_user_idsurat").val(id);
        $("#hidden_user_disposisi").val(id);
        $.post("../admin/bacadisposisiadd.php", {
                id: id
            },
            function (data, status) {
                // PARSE json data
                var user = JSON.parse(data);
                // Assing existing values to the modal popup fields
                $("#hidden_user_idsurat").val(user.id_surat)
                $("#hidden_user_iduser").val(user.id_user)
            }
        );
        $.post("../admin/bacadisposisi.php", {
                id: id
            },
            function (data, status) {
                // PARSE json data
                var user = JSON.parse(data);
                // Assing existing values to the modal popup fields
                $("#hidden_user_disposisi").val(user.id_disposisi)

                $("#tujuan").val(user.tujuan)
                $("#sifat").val(user.sifat)
                $("#bwdate").val(user.batas_waktu)
                $("#catatan").val(user.catatan)
                $("#isidis").val(user.isi_disposisi)
            }
        );
        // Open modal popup
        $("#updatesiswa").modal("show");
    }
    function tdisposisi() {
        // get values
        var tujuan = $("#tujuan").val();
        var sifat = $("#sifat").val();
        var bwdate = $("#bwdate").val();
        var catatan = $("#catatan").val();
        var isidis = $("#isidis").val();

        // get hidden field value
        var idsurat = $("#hidden_user_idsurat").val();
        var iduser = $("#hidden_user_iduser").val();
        var iddispos = $("#hidden_user_disposisi").val();

        // Add record
        $.post("../admin/proses_disposisi.php", {
             iddispos: iddispos,
             idsurat: idsurat,
             iduser: iduser,
             tujuan: tujuan,
             sifat: sifat,
             bwdate: bwdate,
             catatan: catatan,
             isidis: isidis
        }, function (data, status) {
            // close the popup
             $("#updatesiswa").modal("hide");
                // reload Users by using readRecords();
        });
    }
    function deletedisposisi(id) {
        $("#hidden_delete_id").val(id);
        $.post("../admin/bacasurat.php", {
                id: id
            },
            function (data, status) {
                // PARSE json data
                var user = JSON.parse(data);
                // Assing existing values to the modal popup fields
            }
        );
        // Open modal popup
        $("#deletesiswa").modal("show");   
    }
    function suratdelete() {
        // get hidden field value
        var id = $("#hidden_delete_id").val();

        // Update the details by requesting to the server using ajax
        $.post("../admin/proses_deletesuratmasuk.php", {
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
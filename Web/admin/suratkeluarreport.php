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
        <style type="text/css">
                .hidd {
                    display: none
                }
                    @media print{
                        body {
                            font-size: 12px;
                            color: #212121;
                        }
                        .hidd {
                            display: block
                        }
                        table {
                            width: 100%;
                            font-size: 12px;
                            color: #212121;
                        }
                        td{
                            border: 1px  solid #444;
                            text-align: center;
                        }
                        th {
                            border: 1px  solid #444;
                            text-align: center;

                        }
                        tr,td {
                            vertical-align: top!important;
                        }
                        #lbr {
                            font-size: 20px;
                        }
                        .isi {
                            height: 200px!important;
                        }
                        .tgh {
                            text-align: center;
                        }
                        .disp {
                            text-align: center;
                            margin: -.5rem 0;
                        }
                        .logodisp {
                            float: left;
                            position: relative;
                            width: 80px;
                            height: 50px;
                        }
                        #lead {
                            width: auto;
                            position: relative;
                            margin: 15px 0 0 75%;
                        }
                        .lead {
                            font-weight: bold;
                            text-decoration: underline;
                            margin-bottom: -10px;
                        }
                        #nama {
                            font-size: 20px!important;
                            font-weight: bold;
                            text-transform: uppercase;
                            margin: -10px 0 -20px 0;
                        }
                        .up {
                            font-size: 17px!important;
                            font-weight: normal;
                        }
                        .status {
                            font-size: 17px!important;
                            font-weight: normal;
                            margin-bottom: -.1rem;
                        }
                        #alamat {
                            margin-top: -15px;
                            font-size: 13px;
                        }
                        #lbr {
                            font-size: 17px;
                            font-weight: bold;
                        }
                        .separator {
                            border-bottom: 2px solid #616161;
                            margin: -1rem 0 1rem;
                        }

                }
            </style>
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar" id="hilang">
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
            <li class="active"><a href="#openreport" aria-expanded="false" data-toggle="collapse"> <i class=""></i>Report </a>
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
            <div class="container-fluid" id="hilang1">
              <h2 class="no-margin-bottom">Surat Keluar Report</h2>
            </div>
          </header>
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
            <form class="col s12 form-inline" method="post" action="" id="hilang2">
            <fieldset>&nbsp&nbsp
            <span>Dari Tanggal : </span>
                <input id="dari_tanggal" type="date" class="form-control" name="dari_tanggal" id="dari_tanggal" required>
                &nbsp&nbsp
            <span>Sampai Tanggal :</span>
                <input id="sampai_tanggal" class="form-control" type="date" name="sampai_tanggal" id="sampai_tanggal" required>
                &nbsp
                <button type="submit" name="submit" class="btn btn-dark"><img src="../img/eye.png" height="20px" width="20px">Tampilkan</img></button>
                <button onclick="HTMLtoPDF()" class="btn btn-dark">Save to pdf</button>
                <button id="hilang3" onclick="printlier()" class="btn btn-dark">Print</button>
            </fieldset>
            </form>
            <div id="HTMLtoPDF">
            <?php

            include("../koneksi.php");

            if(isset($_REQUEST['submit'])){

            $dari_tanggal = $_REQUEST['dari_tanggal'];
            $sampai_tanggal = $_REQUEST['sampai_tanggal'];

            if($_REQUEST['dari_tanggal'] == "" || $_REQUEST['sampai_tanggal'] == ""){
                header("Location:suratkeluarreport.php");
                die();
            } else {

                if (!$result = mysql_query("SELECT * FROM tbl_surat_keluar WHERE tgl_surat BETWEEN '$dari_tanggal' AND '$sampai_tanggal'")) {
                    exit(mysql_error());
                  }

                echo'
                <!-- Row form END -->

                    <div class="row agenda">
                        <div class="col s10">
                            <div class="disp hidd">';
                                echo '<img class="logodisp" src="../img/logo1.png" align="left"></img><br>';
                                echo '<h6 class="up" align="center"> Laporan Surat Keluar</h6>';
                                echo '<h5 class="up" id="nama" align="center"> D-MAIL</h5><br/>';
                                echo '<span id="alamat"></span><br>';
                                echo '
                            </div>
                            <img style="display:none;" class="logodisp" src="../img/download.png" width="20px" height="20px"/>
                            <img style="display:none;" class="logodisp" src="../img/download.png" width="20px" height="20px"/>
                            <img style="display:none;" class="logodisp" src="../img/download.png" width="20px" height="20px"/>
                            <h5 class="hid" align="left">AGENDA SURAT MASUK</h5>';

                            $y = substr($dari_tanggal,0,4);
                            $m = substr($dari_tanggal,5,2);
                            $d = substr($dari_tanggal,8,2);
                            $y2 = substr($sampai_tanggal,0,4);
                            $m2 = substr($sampai_tanggal,5,2);
                            $d2 = substr($sampai_tanggal,8,2);

                            if($m == "01"){
                                $nm = "Januari";
                            } elseif($m == "02"){
                                $nm = "Februari";
                            } elseif($m == "03"){
                                $nm = "Maret";
                            } elseif($m == "04"){
                                $nm = "April";
                            } elseif($m == "05"){
                                $nm = "Mei";
                            } elseif($m == "06"){
                                $nm = "Juni";
                            } elseif($m == "07"){
                                $nm = "Juli";
                            } elseif($m == "08"){
                                $nm = "Agustus";
                            } elseif($m == "09"){
                                $nm = "September";
                            } elseif($m == "10"){
                                $nm = "Oktober";
                            } elseif($m == "11"){
                                $nm = "November";
                            } elseif($m == "12"){
                                $nm = "Desember";
                            }

                            if($m2 == "01"){
                                $nm2 = "Januari";
                            } elseif($m2 == "02"){
                                $nm2 = "Februari";
                            } elseif($m2 == "03"){
                                $nm2 = "Maret";
                            } elseif($m2 == "04"){
                                $nm2 = "April";
                            } elseif($m2 == "05"){
                                $nm2 = "Mei";
                            } elseif($m2 == "06"){
                                $nm2 = "Juni";
                            } elseif($m2 == "07"){
                                $nm2 = "Juli";
                            } elseif($m2 == "08"){
                                $nm2 = "Agustus";
                            } elseif($m2 == "09"){
                                $nm2 = "September";
                            } elseif($m2 == "10"){
                                $nm2 = "Oktober";
                            } elseif($m2 == "11"){
                                $nm2 = "November";
                            } elseif($m2 == "12"){
                                $nm2 = "Desember";
                            }
                            echo '
                            <p class="warna agenda">Agenda Surat Keluar dari tanggal <strong>'.$d." ".$nm." ".$y.'</strong> sampai dengan tanggal <strong>'.$d2." ".$nm2." ".$y2.'</strong></p>
                        </div>
                    </div>
                    <div id="colres" class="warna cetak">
                        <table class="bordered" id="tbl" width="100%">
                            <thead class="blue lighten-4">
                                <tr>
                                    <th>Kode</th>
                                    <th>Isi Ringkasan</th>
                                    <th>Tujuan</th>
                                    <th>Nomor Surat</th>
                                    <th>Tanggal<br/> Surat</th>
                                    <th>Pengelola</th>
                                    <th>Tanggal <br/>Paraf</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>';

                            if(mysql_num_rows($result) > 0){
                                $no = 0;
                                while($row = mysql_fetch_assoc($result)){
                                 echo '
                                        <td>'.$row['kode'].'</td>
                                        <td>'.$row['isi'].'</td>
                                        <td>'.$row['tujuan'].'</td>
                                        <td>'.$row['no_surat'].'</td>';

                                        $y = substr($row['tgl_surat'],0,4);
                                        $m = substr($row['tgl_surat'],5,2);
                                        $d = substr($row['tgl_surat'],8,2);

                                        if($m == "01"){
                                            $nm = "Januari";
                                        } elseif($m == "02"){
                                            $nm = "Februari";
                                        } elseif($m == "03"){
                                            $nm = "Maret";
                                        } elseif($m == "04"){
                                            $nm = "April";
                                        } elseif($m == "05"){
                                            $nm = "Mei";
                                        } elseif($m == "06"){
                                            $nm = "Juni";
                                        } elseif($m == "07"){
                                            $nm = "Juli";
                                        } elseif($m == "08"){
                                            $nm = "Agustus";
                                        } elseif($m == "09"){
                                            $nm = "September";
                                        } elseif($m == "10"){
                                            $nm = "Oktober";
                                        } elseif($m == "11"){
                                            $nm = "November";
                                        } elseif($m == "12"){
                                            $nm = "Desember";
                                        }
                                        echo '
                                        <td>'.$d." ".$nm." ".$y.'</td>
                                        <td>';

                                        $id_user = $row['id_user'];
                            $nama_kls=mysql_fetch_array(mysql_query("SELECT fullname FROM user WHERE id='$row[id_user]'"));
                            

                                        echo ''.$nama_kls['fullname'].'</td>
                                        <td>'.$d." ".$nm." ".$y.'</td>
                                        <td>'.$row['keterangan'].'';
                                  echo '</td>
                                </tr>
                            </tbody>';
                                }
                            } else {
                                echo '<tr><td colspan="9"><center><p class="add">Tidak ada agenda surat</p></center></td></tr>';
                            } echo '
                        </table>
                    </div>';
            }
        } else {


            }
                ?>
            </div>
          </div>
          </section>
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
    <script src="../js/pdfFromHTML.js"></script>
    <script src="../js/jspdf.js"></script>
    <script type="text/javascript">
        function printlier()
        {
            var x = document.getElementById("hilang");
            var x1 = document.getElementById("hilang1");
            var x2 = document.getElementById("hilang2");
            var x3 = document.getElementById("hilang3");

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            if (x1.style.display === "none") {
                x1.style.display = "block";
            } else {
                x1.style.display = "none";
            }
            if (x2.style.display === "none") {
                x2.style.display = "block";
            } else {
                x2.style.display = "none";
            }
            if (x3.style.display === "none") {
                x3.style.display = "block";
            } else {
                x3.style.display = "none";
            }
            window.print();
        }
        function HTMLtoPDF(){
            var pdf = new jsPDF('l', 'pt', 'letter');
            source = $('#HTMLtoPDF')[0];
            specialElementHandlers = {
                '#bypassme': function(element, renderer){
                    return true
                }
            }
            margins = {
                top: 50,
                left: 60,
                width: 545
              };
            pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , margins.left // x coord
                , margins.top // y coord
                , {
                    'width': margins.width // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
                },
                function (dispose) {
                  // dispose: object with X, Y of the last line add to the PDF
                  //          this allow the insertion of new lines after html
                    pdf.save('SuaratKeluar.pdf');
                  }
              )     
        }
    </script>
  </body>
</html>
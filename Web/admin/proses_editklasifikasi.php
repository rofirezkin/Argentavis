<?php
   include('../koneksi.php');
    if(isset($_POST['hiddenid']) AND isset($_POST['tnomersurat']) AND isset($_POST['tkodesurat']) AND isset($_POST['tasalsurat'])){
        $thidden = $_POST['hiddenid'];
        $tnomersurat = $_POST['tnomersurat'];
        $tkodesurat = $_POST['tkodesurat'];
        $tasalsurat = $_POST['tasalsurat'];
        
        if(!$thidden || !$tnomersurat) {
        } else {
            $query = "UPDATE tbl_klasifikasi SET kode='$tnomersurat', nama = '$tkodesurat', uraian = '$tasalsurat' WHERE id_klasifikasi = '$thidden'";
                if (!$result = mysql_query($query)) {
                    exit(mysql_error());
                }
                header("location:klasifikasi.php");
        }
    }
?>
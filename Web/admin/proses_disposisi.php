<?php
// include Database connection file
include("../koneksi.php");

// check request
if(isset($_POST['idsurat']) AND isset($_POST['iduser']) AND isset($_POST['tujuan']) AND isset($_POST['sifat']) AND isset($_POST['bwdate']) AND isset($_POST['catatan']) AND isset($_POST['isidis']) AND isset($_POST['iddispos']))
{
    // get values
    $iddispos = $_POST['iddispos'];
    $idsurat = $_POST['idsurat'];
    $iduser = $_POST['iduser'];
    $tujuan = $_POST['tujuan'];
    $sifat = $_POST['sifat'];
    $bwdate = $_POST['bwdate'];
    $catatan = $_POST['catatan'];
    $isidis = $_POST['isidis'];

    // Updaste User details

    $querycheck = mysql_query("SELECT * FROM tbl_disposisi WHERE id_surat = '$idsurat'");
        if(mysql_num_rows($querycheck) > 0)
        {
          // Exist
            $query = "UPDATE tbl_disposisi SET id_user = '$iduser', tujuan = '$tujuan', sifat = '$sifat', batas_waktu = '$bwdate', catatan = '$catatan', isi_disposisi = '$isidis' WHERE id_disposisi = '$iddispos'";
            if (!$result = mysql_query($query)) {
                exit(mysql_error());
            }
        }
        else
        {
          // Not exist
            $query1 = "INSERT INTO tbl_disposisi(id_surat, id_user, tujuan, sifat, batas_waktu, catatan, isi_disposisi) VALUES('$idsurat', '$iduser', '$tujuan', '$sifat', '$bwdate', '$catatan', '$isidis')";
            if (!$result1 = mysql_query($query1)) {
                exit(mysql_error());
            }
            header("location:suratmasuk.php");
        }
}
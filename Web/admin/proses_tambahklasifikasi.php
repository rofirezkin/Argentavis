<?php
   include('../koneksi.php');
	if(isset($_POST['submit'])){
		$tnomersurat = mysql_real_escape_string(htmlentities($_POST['tnomersurat']));
		$tkodesurat = mysql_real_escape_string(htmlentities($_POST['tkodesurat']));
		$ttujuan = mysql_real_escape_string(htmlentities($_POST['ttujuan']));
		
		if(!$tnomersurat || !$tkodesurat || !$ttujuan) {
		} else {
			$simpan = "INSERT INTO tbl_klasifikasi(kode, nama, uraian) VALUES('$tnomersurat','$tkodesurat','$ttujuan')";
			mysql_query($simpan);
			header("location:klasifikasi.php");
		}
	}
?>
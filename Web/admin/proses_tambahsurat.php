<?php
   include('../koneksi.php');
	if(isset($_POST['submit'])){
		$tnomersurat = mysql_real_escape_string(htmlentities($_POST['tnomersurat']));
		$tkodesurat = mysql_real_escape_string(htmlentities($_POST['tkodesurat']));
		$tasalsurat = mysql_real_escape_string(htmlentities($_POST['tasalsurat']));
		$tisi = mysql_real_escape_string(htmlentities($_POST['tisi']));
		$ttanggalsurat = mysql_real_escape_string(htmlentities($_POST['ttanggalsurat']));
		$tiduser = mysql_real_escape_string(htmlentities($_POST['tiduser']));
		$tketerangan = mysql_real_escape_string(htmlentities($_POST['tketerangan']));
		
		$file = rand(1000,300000)."-".$_FILES['tfupload']['name'];
    	$file_loc = $_FILES['tfupload']['tmp_name'];
		$folder="../uploads/";
		 
		 // make file name in lower case
		 $new_file_name = strtolower($file);
		 // make file name in lower case
		 
		 $final_file=str_replace(' ','-',$new_file_name);
		 

		if(move_uploaded_file($file_loc,$folder.$final_file)) {
				$simpan = "INSERT INTO tbl_surat_masuk(no_surat, kode, asal_surat, subject, tgl_surat, id_user, keterangan, file) VALUES('$tnomersurat','$tkodesurat','$tasalsurat','$tisi','$ttanggalsurat','$tiduser','$tketerangan','$final_file')";
				mysql_query($simpan);
				header("location:suratmasuk.php");
		} else {
			echo '<script language="javascript">alert("Maaf, Gagal membuat Surat masuk");</script>';
		}
	}
?>
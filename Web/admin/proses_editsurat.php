<?php
   include('../koneksi.php');
	if(isset($_POST)){
		$thidden = $_POST['hiddenid'];
		$tnomersurat = $_POST['tnomersurat'];
		$tkodesurat = $_POST['tkodesurat'];
		$tasalsurat = $_POST['tasalsurat'];
		$tisi = $_POST['tisi'];
		$ttanggalsurat = $_POST['ttanggalsurat'];
		$tiduser = $_POST['tiduser'];
		$tketerangan = $_POST['tketerangan'];
		
		$file = rand(1000,3072)."-".$_FILES['tfupload']['name'];
    	$file_loc = $_FILES['tfupload']['tmp_name'];
		$folder="../uploads/";
		 
		 // make file name in lower case
		 $new_file_name = strtolower($file);
		 // make file name in lower case
		 
		 $final_file=str_replace(' ','-',$new_file_name);
		 

		if(move_uploaded_file($file_loc,$folder.$final_file)) {
			$query = "UPDATE tbl_surat_masuk SET id_surat='$thidden', no_surat = '$tnomersurat', asal_surat = '$tasalsurat', subject='$tisi', tgl_surat ='$ttanggalsurat', id_user ='$tiduser', keterangan ='$tketerangan', file='$final_file' WHERE id_surat = '$thidden'";
			    if (!$result = mysql_query($query)) {
			        exit(mysql_error());
				}
				header("location:suratmasuk.php");
		} else {
			echo '<script language="javascript">alert("Maaf, Gagal edit Surat masuk / File upload terlalu besar);</script>';
		}
	}
?>
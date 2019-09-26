<?php

include('../koneksi.php');

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata=" SELECT kode FROM tbl_klasifikasi WHERE kode ='$name' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "NO";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>
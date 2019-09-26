<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../koneksi.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM tbl_surat_masuk WHERE id_surat = '$user_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
        header("location:settingakun.php");
    }
}
?>
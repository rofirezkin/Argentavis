<?php
// include Database connection file
include("../koneksi.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $level = $_POST['level'];
    $stat = $_POST['stat'];

    // Updaste User details
    $query = "UPDATE user SET id = '$id', leveladmin = '$level', status = '$stat' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
	}
	header("location:settingakun.php");
}
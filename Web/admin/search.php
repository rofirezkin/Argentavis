<?php
    //database configuration
    include('../koneksi.php');
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM no_surat WHERE tbl_surat_masuk LIKE '%".$searchTerm."%' ORDER BY no_surat ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['no_surat'];
    }
    
    //return json data
    echo json_encode($data);
?>
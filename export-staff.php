<?php
    require_once 'conn.php';

    $filename = 'List of Staff-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tbladmin";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array(,"NAME","USERNAME","ROLE",);
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
        $name = $row['name'];
        $username = $row['username'];
        $role = $row['role'];


        $array = array($name,$username,$role);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
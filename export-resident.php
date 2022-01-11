<?php
    require_once 'conn.php';

    $filename = 'List of Resident-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblresident";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("ID","NAME","ADDRESS","CONTACT NUMBER","GENDER","STATUS","BIRTHDAY","EMAIL");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
        $name = $row['Name'];
        $address = $row['Address'];
        $contact = $row['ContactNumber'];
        $gender = $row['Gender'];
        $status = $row['Status'];
        $birthday = $row['Birthday'];
        $email = $row['Email'];

        $array = array($name,$address,$contact,$gender,$status,$birthday,$email);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
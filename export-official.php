<?php
    require_once 'conn.php';

    $filename = 'List of Officials-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblofficial";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("NAME","ADDRESS","ContactNumber","Start-of-Term","End-of-Term","Position");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
    
        $name = $row['Name'];
        $address = $row['Address'];
        $contact = $row['Contactnumber'];
        $termstart = $row['StartofTerm'];
        $termend = $row['EndofTerm'];
        $position = $row['Position'];

        $array = array($name,$address,$contact,$termstart,$termend,$position);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
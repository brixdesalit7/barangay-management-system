<?php
    require_once 'conn.php';

    $filename = 'List of C-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblclearance";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("DATE ISSUED","NAME","AGE","CONTACT #","OR #","PURPOSE");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
    
        $dateiss = $row['DateIssued'];
        $owner = $row['Name'];
        $age = $row['Age'];
        $contact = $row['ContactNumber'];
        $receipt = $row['receipt'];
        $purpose = $row['Purpose'];
       

        $array = array($dateiss,$owner,$age,$contact,$receipt,$purpose);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
<?php
    require_once 'conn.php';

    $filename = 'List of Permit-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblbusiness_permit";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("DATE ISSUED","OWNER NAME","BUSINESS NAME","BUSINESS TYPE","TIN");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
    
        $dateiss = $row['DateIssued'];
        $owner = $row['OwnerName'];
        $businessname = $row['BusinessName'];
        $type = $row['BusinessType'];
        $tin = $row['TIN'];
       

        $array = array( $dateiss , $owner,  $businessname,  $type , $tin);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
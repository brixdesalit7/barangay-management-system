<?php
    require_once 'conn.php';

    $filename = 'List of Complaints-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblcomplaints";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("DATE ISSUED","COMPLAINANT","APELLANT","COMPLAINT","STATUS");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
    
        $dateiss = $row['DateIssued'];
        $comp = $row['Complainant'];
        $appe = $row['Apellant'];
        $complaint = $row['Complaint'];
        $receipt = $row['Status'];
     
       

        $array = array($dateiss,$comp,$appe,$complaint,$receipt);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
<?php
    require_once 'conn.php';

    $filename = 'List of Zoneleader-'.date('Y-m-d'). '.csv';

    $sql = "SELECT * FROM tblzoneleader";
    $result = mysqli_query($conn,$sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("ID","NAME","ZONELEADER","CONTACT NUMBER","GENDER","STATUS","BIRTHDAY","EMAIL");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['Name'];
        $zone = $row['ZoneLeader'];
        $contact = $row['ContactNumber'];
        $gender = $row['Gender'];
        $status = $row['Status'];
        $birthday = $row['Birthday'];
        $email = $row['EmailAddress'];

        $array = array($id,$name,$zone,$contact,$gender,$status,$birthday,$email);
        fputcsv($file,$array);
    }

    
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();
?>
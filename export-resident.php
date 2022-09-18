<?php
    require_once 'conn.php';
    // STORE THE FILE NAME IN VARIABLE
    $filename = 'List of Resident-'.date('Y-m-d'). '.csv';
    // PERFORM QUERY TO DATABASE
    $sql = "SELECT * FROM tblresident";
    $result = mysqli_query($conn,$sql);
     //fopen open a file or url
    // PASS THE VARIABLE FILENAME AS FIRST PARAMETER 
    // SECOND PARAMETER STRING W  Opens and truncates the file; or creates a new file if it doesn't exist.
    $file = fopen($filename,'w');
    // CREATE ARRAY THIS WILL BE USE TO NAME EACH ROW IN CSV
    $array = array("ID", "NAME", "ADDRESS", "CONTACT NUMBER", "GENDER", "STATUS", "BIRTHDAY", "EMAIL");
    fputcsv($file,$array);
     // fetch array as an associative array
    while($row = mysqli_fetch_array($result)){
        // ASSIGN EACH ASSOCIATIVE ARRAY FROM THE DATABASE IN VARIABLE
        $name = $row['Name'];
        $address = $row['Address'];
        $contact = $row['ContactNumber'];
        $gender = $row['Gender'];
        $status = $row['Status'];
        $birthday = $row['Birthday'];
        $email = $row['Email'];
        // GET THE GLOBAL VARIABLE ARRAY AND ASSIGN EACH VARIABLE DECLARED IN WHILE LOOP
        $array = array($name,$address,$contact,$gender,$status,$birthday,$email);
        fputcsv($file,$array);
    }

    // SEND HTTP HEADER
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename = $filename");
    header("Content-Type: application/csv");
    // readfile function pass the argument filename variable
    readfile($filename);
    // unlink delete file
    unlink($filename);
    exit();
?>
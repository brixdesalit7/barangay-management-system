<?php
    require_once 'conn.php';
    // STORE THE FILE NAME IN VARIABLE
    $filename = 'List of Complaints-'.date('Y-m-d'). '.csv';
    // PERFORM QUERY TO DATABASE
    $sql = "SELECT * FROM tblcomplaints";
    $result = mysqli_query($conn,$sql);
    //fopen open a file or url
    // PASS THE VARIABLE FILENAME AS FIRST PARAMETER 
    // SECOND PARAMETER STRING W  Opens and truncates the file; or creates a new file if it doesn't exist.
    $file = fopen($filename,'w');
    // CREATE ARRAY THIS WILL BE USE TO NAME EACH ROW IN CSV
    $array = array("DATE ISSUED","COMPLAINANT","APELLANT","COMPLAINT","STATUS");
     // fputcsv format a line as csv
    // first parameter file - Specifies the open file to write to
    // second parameter fields - Specifies which array to get the data from
    fputcsv($file,$array);
    // fetch array as an associative array
    while($row = mysqli_fetch_array($result)){
          // ASSIGN EACH ASSOCIATIVE ARRAY FROM THE DATABASE IN VARIABLE
        $dateiss = $row['DateIssued'];
        $comp = $row['Complainant'];
        $appe = $row['Apellant'];
        $complaint = $row['Complaint'];
        $receipt = $row['Status'];
        // GET THE GLOBAL VARIABLE ARRAY AND ASSIGN EACH VARIABLE DECLARED IN WHILE LOOP
        $array = array($dateiss,$comp,$appe,$complaint,$receipt);
        fputcsv($file,$array);
    }

    // SEND HTTP HEADER
    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
     // readfile function pass the argument filename variable
    readfile($filename);
    // unlink delete file
    unlink($filename);
    exit();
?>
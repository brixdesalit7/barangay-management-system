<?php
    include('conn.php');

    $complainant = $_POST['complainant'];
    $apellant = $_POST['apellant'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = mysqli_query($conn, "INSERT INTO tblcomplaints (Complainant,Apellant,Complaint,Status) 
    VALUES('$complainant','$apellant','$description','$status')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='complaints.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
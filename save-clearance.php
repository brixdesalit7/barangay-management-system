<?php
    include('conn.php');

    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $or = $_POST['receipt'];
    $purpose = $_POST['purpose'];

    $sql = mysqli_query($conn, "INSERT INTO tblclearance (Name,Age,ContactNumber,receipt,Purpose) 
    VALUES('$name','$age','$contact',$or,'$purpose')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='barangay_clearance.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
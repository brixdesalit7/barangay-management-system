<?php
    include('conn.php');

    $id = $_GET['id'];

    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $or = $_POST['receipt'];
    $purpose = $_POST['purpose'];

    $sql = mysqli_query($conn,"UPDATE tblclearance SET Name='$name',Age='$age',ContactNumber='$contact',receipt='$or',Purpose='$purpose'
    WHERE id = '$id' ");

    if($sql){
        echo "<script>alert('Update Sucess!');</script>";
        echo "<script>document.location='barangay_clearance.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
<?php
    include('conn.php');

    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = mysqli_query($conn, "INSERT INTO tblresident (Name,Address,ContactNumber,Gender,Status,Birthday,Email) 
    VALUES('$name','$address','$contact','$gender','$status','$birthday','$email')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='resident.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
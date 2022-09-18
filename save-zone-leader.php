<?php
    include('conn.php');

    $name = $_POST['name'];
    $zone = $_POST['zone'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = mysqli_query($conn, "INSERT INTO tblzoneleader (Name,ZoneLeader,ContactNumber,Gender,Status,Birthday,EmailAddress) 
    VALUES('$name','$zone','$contact','$gender','$status','$birthday','$email')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='zone-leader.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
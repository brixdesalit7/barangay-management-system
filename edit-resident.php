<?php
    include('conn.php');

    $id = $_GET['id'];

    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = mysqli_query($conn,"UPDATE tblresident SET Name='$name',Address='$address',ContactNumber='$contact',Gender='$gender',Status='$status',Birthday='$birthday',Email='$email'
    WHERE id = '$id' ");

    if($sql){
        echo "<script>alert('Update Sucess!');</script>";
        echo "<script>document.location='resident.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
<?php
    include('conn.php');

    $id = $_GET['id'];

    $name = $_POST['name'];
    $zone = $_POST['zone'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];

    $sql = mysqli_query($conn,"UPDATE tblzoneleader SET Name='$name',ZoneLeader='$zone',ContactNumber='$contact',Gender='$gender',Status='$status',Birthday='$birthday',EmailAddress='$email'
    WHERE id = '$id' ");

    if($sql){
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='zone-leader.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
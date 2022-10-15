<?php
    include('conn.php');

    $id= $_GET['id'];
    // remove special characters
    $name = $conn->real_escape_string($_POST['name']);
    $user = $conn->real_escape_string($_POST['username']);
    // encrypt password using md5
    $pass = $conn->real_escape_string(md5($_POST['pass']));
   

    $sql = mysqli_query($conn, "UPDATE tbladmin  SET name='$name', username='$user', password='$pass'
    WHERE id='$id'");

    if($sql) {
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='change-pass.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>
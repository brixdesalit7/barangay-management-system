<?php
    include('conn.php');

    $id= $_GET['id'];

    $name = $_POST['name'];
    $user = $_POST['username'];
    $pass = $_POST['pass'];
   

    $sql = mysqli_query($conn, "UPDATE tbladmin  SET name='$name', username='$user', password='$pass'
    WHERE id='$id'");

    if($sql) {
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='change-pass.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>
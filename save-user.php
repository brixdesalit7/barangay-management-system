<?php
 
 //  INCLUDE DATABASE CONNECTION FILE
 include_once('conn.php');
 
 if(isset($_POST['submit'])) {
     $name = $conn->real_escape_string($_POST['name']);
     $user = $conn->real_escape_string($_POST['user']);
     $password = $conn->real_escape_string($_POST['user']);
     $role = $conn->real_escape_string($_POST['role']);

    $query = "INSERT INTO tbladmin (name,username,password,role) VALUES ('$name','$user','$password','$role')";
    $result = $conn->query($query);

    if($result == true){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='bms-staff.php';</script>";
    }else {
        echo "<script>alert('Something went wrong!');</script>";
    }
 }
  ?>
  
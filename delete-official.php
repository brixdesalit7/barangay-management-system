<?php
    include('conn.php');
    
    $id = $_GET['id'];

    $sql = mysqli_query($conn,"DELETE FROM tblofficial WHERE id='$id'");
    
    if($sql) {
        echo "<script>alert('Deleted Sucessfully!');</script>";
        echo "<script>document.location='officials.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }



?>
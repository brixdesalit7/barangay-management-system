<?php
    include('conn.php');
    
    $id = $_GET['id'];

    $sql = mysqli_query($conn,"DELETE FROM tblresident WHERE id='$id'");
    
    if($sql) {
        echo "<script>alert('Deleted Sucessfully!');</script>";
        echo "<script>document.location='resident.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }



?>
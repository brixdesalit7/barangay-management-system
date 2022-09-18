<?php
    include('conn.php');

    $position = $_POST['position'];

    $sql = mysqli_query($conn, "INSERT INTO tblofficial_position (Position) 
    VALUES('$position')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='official-list.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
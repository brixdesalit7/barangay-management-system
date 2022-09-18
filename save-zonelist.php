<?php
    include('conn.php');

    $zone = $_POST['zone'];

    $sql = mysqli_query($conn, "INSERT INTO tblzone_list (zone_list) 
    VALUES('$zone')");

    if($sql){
        echo "<script>alert('New Zone Added!');</script>";
        echo "<script>document.location='zone-list.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
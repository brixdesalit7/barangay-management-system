<?php
    include('conn.php');

    $owner = $_POST['owner'];
    $business_name = $_POST['business_name'];
    $business_type = $_POST['type_business'];
    $tin = $_POST['tin'];

    $sql = mysqli_query($conn, "INSERT INTO tblbusiness_permit (OwnerName,BusinessName,BusinessType,TIN) 
    VALUES('$owner','$business_name','$business_type','$tin')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='business_permit.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
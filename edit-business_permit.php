<?php
    include('conn.php');
    // use the global variable $_GET to get the id that pass to parameter
    $id= $_GET['id'];

    $owner = $_POST['owner'];
    $business_name = $_POST['business_name'];
    $business_type = $_POST['type_business'];
    $tin = $_POST['tin'];

    $sql = mysqli_query($conn, "UPDATE tblbusiness_permit SET OwnerName='$owner', BusinessName='$business_name', BusinessType='$business_type', TIN='$tin' 
    WHERE id='$id'");

    if($sql) {
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='business_permit.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>
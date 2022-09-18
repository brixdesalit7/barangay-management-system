
<?php
    include('conn.php');
    
    $id = $_GET['id'];

    $sql = mysqli_query($conn,"DELETE FROM tblclearance WHERE id='$id'");
    
    if($sql) {
        echo "<script>alert('Deleted Sucessfully!');</script>";
        echo "<script>document.location='barangay_clearance.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }



?>
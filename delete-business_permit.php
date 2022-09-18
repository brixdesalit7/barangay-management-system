
<?php
    include('conn.php');
    // USE THE GLOBAL VARIABLE $_GET TO GET THE id pass from parameter
    $id = $_GET['id'];
    // PERFORM A QUERY TO DATABASE
    // DELETE FROM TABLE WHERE the row is equal to id variable
    $sql = mysqli_query($conn,"DELETE FROM tblbusiness_permit WHERE id='$id'");
    
    if($sql) {
        echo "<script>alert('Deleted Sucessfully!');</script>";
        echo "<script>document.location='business_permit.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }



?>
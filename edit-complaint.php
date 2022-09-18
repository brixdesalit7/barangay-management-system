<?php
    include('conn.php');

    $id= $_GET['id'];

    $complainant = $_POST['complainant'];
    $apellant = $_POST['apellant'];
    $complaint = $_POST['description'];
    $status = $_POST['status'];

    $sql = mysqli_query($conn, "UPDATE tblcomplaints SET Complainant='$complainant', Apellant='$apellant', Complaint='$complaint', Status='$status' 
    WHERE id='$id'");

    if($sql) {
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='complaints.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>
<?php
    include('conn.php');

    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $termstart = $_POST['term-start'];
    $termend = $_POST['term-end'];
    $position = $_POST['position'];

    $sql = mysqli_query($conn, "INSERT INTO tblofficial (Name,Address,Contactnumber,StartofTerm,EndofTerm,Position) 
    VALUES('$name','$address','$contact','$termstart','$termend','$position')");

    if($sql){
        echo "<script>alert('New Record Sucessfully Added!');</script>";
        echo "<script>document.location='officials.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }

?>
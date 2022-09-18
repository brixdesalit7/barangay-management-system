<?php
    include('conn.php');

    $id= $_GET['id'];

    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $termstart = $_POST['term-start'];
    $termend = $_POST['term-end'];
    $position = $_POST['position'];

    $sql = mysqli_query($conn, "UPDATE tblofficial SET Name='$name', Address='$address', Contactnumber='$contact', StartofTerm='$termstart', EndofTerm='$termend', 
    Position='$position' WHERE id='$id'");

    if($sql) {
        echo "<script>alert('Update Success!');</script>";
        echo "<script>document.location='officials.php';</script>";
    }else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
?>
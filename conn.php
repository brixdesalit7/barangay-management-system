<?php
    // MYSQLi Procedural
    $conn = mysqli_connect("localhost","root","","bms");

    if(!$conn){
        die ("Connection Failed: " .mysqli_connect_error());
    }
?>
<?php
   session_start();
   session_destroy();
   session_unset($_SESSION['name']);
   session_unset($_SESSION['role']);
   session_unset($_SESSION['id']);
   header("Location:index.php");
   die();
?>
<?php
require_once 'conn.php';
// start the session
session_start();

// check if session variable is set
if (!isset($_SESSION['id'])) {
    header("Location:index.php");
    exit();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials | Barangay Management System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet"></head>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>
  
    <div class="row">
        <!-- GRID-1 -->
        <?php include 'sidebar.php'; ?>
        <!-- GRID-2 -->
          <div class="col-sm-10  p-0">
              <div class="bg-danger w-100 text-light p-4 d-flex justify-content-between">
                <div>
                <h4>Barangay Management System</h4>
                </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle float-right" data-bs-toggle="dropdown">Hello, <?php echo ucwords($_SESSION['name']); ?></button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="change-pass.php">Change Password</a></li>
                      <li><a class="dropdown-item" href="log-out.php">Logout</a></li>
                    </ul>
                  </div>
              </div>
              <div class="dashboard mt-5">
                <div class="container-fluid">
                  <h1 class="text-danger"><i class="fas fa-tachometer-alt px-3"></i>Dashboard</h1>
                  <div class=" mt-3 d-sm-flex flex-wrap  justify-content-around align-content-center">
                    <!-- CARD-1 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 350px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="fas fa-users"></i>
                        <h5 class="mt-3">Number of Barangay Officials</h5>
                        <?php
                        // PERFORM QUERY TO DATABASE
                        $official = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblofficial");
                        // FETCH A RESULT AS AN ASSOCIATIVE ARRAY
                        $official_result = mysqli_fetch_array($official);
                        ?>
                        <!-- COUNT THE TOTAL RECORD -->
                        <h4><?php echo $official_result['COUNT']; ?></<h4>
                      </div>
                    </div>
                    <!-- CARD-2 -->
                    <div class="card p-3 bg-dark text-white mt-5" style="width: 350px;">
                      <div class="card-body  mx-auto d-block text-center">
                        <i class="far fa-user"></i>
                        <h5 class="mt-3">Number of Staff</h5>
                        <?php
                        // PERFORM QUERY TO DATABASE
                        $leader = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tbladmin");
                        // FETCH A RESULT AS AN ASSOCIATIVE ARRAY
                        $leader_result = mysqli_fetch_array($leader);
                        ?>
                        <!-- COUNT THE TOTAL RECORD -->
                        <h4><?php echo $leader_result['COUNT']; ?></h4>
                      </div>
                    </div>  
                    <!-- CARD-4 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 350px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="fas fa-user-friends"></i>
                        <h5 class="mt-3">Number of Resident</h5>
                        <?php
                        
                        $resident = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblresident");
                        $resident_result = mysqli_fetch_array($resident);
                        ?>
                        <h4><?php echo $resident_result['COUNT']; ?></h4>
                      </div>
                    </div> 
                    <!-- CARD-5 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 350px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="far fa-copy"></i>
                        <h5 class="mt-3">Number of Permit</h5>
                        <?php
                        
                        $permit = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblbusiness_permit");
                        $permit_result = mysqli_fetch_array($permit);
                        ?>
                        <h4><?php echo $permit_result['COUNT'];?></h4>
                      </div>
                    </div>  
                    <!-- CARD-5 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 350px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="fas fa-print"></i>
                        <h5 class="mt-3">Clearance</h5>
                        <?php
                        
                        $clearance = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblclearance");
                        $clearance_result = mysqli_fetch_array($clearance);
                        ?>
                        <h4><?php echo $clearance_result['COUNT'];?></h4>
                      </div>
                    </div>
                    <!-- CARD-6 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 350px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="far fa-address-card"></i>
                        <h5 class="mt-3">Complaints</h5>
                        <?php
                        
                        $complaints = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblcomplaints");
                        $complaints_result = mysqli_fetch_array($complaints);

                        ?>
                        <h4><?php echo $complaints_result['COUNT']; ?></h4>
                      </div>
                    </div>    
 

                  </div>
                </div>
              </div>
          </div>
    </div>

    
</body>
</html>
<?php
require_once 'conn.php';
    
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:dashboard.php");
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
        <div class="col-sm-2 bg-dark text-light p-0" style="height: 100vh;">
             
             <?php
               include('conn.php');
                    
               $query=mysqli_query($conn,"SELECT * from `tbl_info`");
               while($row=mysqli_fetch_array($query)){
               ?>
            <div class="header container mt-4 border-bottom">
                <h4 class="text-center mb-3"><?php echo ($row['barangayname']); ?></h4>
                <img src="<?php echo ($row['images']); ?>" alt="user" class=" mx-auto d-block" style="width:120px;height: 100px;">
                <p class="text-center mt-3"><?php echo ucwords($_SESSION['role']); ?></p>
            </div>
            <?php
              }
                    
              ?>
            <!-- NAVBAR -->
            <div class="container mt-3">
                <ul class="nav flex-column text-left">
                <?php if($_SESSION['role'] == 'Admin'){ ?>
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="officials.php"><i class="fas fa-users"></i>Officials</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bms-staff.php"><i class="far fa-user"></i>Staff</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="zone-leader.php"><i class="far fa-user"></i>Zone Leader</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="resident.php"><i class="fas fa-user-friends"></i>Resident</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="business_permit.php"><i class="fas fa-print"></i>Permit</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="barangay_clearance.php"><i class="fas fa-print"></i>Clearance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="complaints.php"><i class="far fa-address-card"></i>Complaints</a>
                  </li>

                  <div class="dropdown dropend px-1 py-3">
                  <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="fas fa-cogs px-2"></i>Settings
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item p-3" href="system-info.php">Barangay System Info</a></li>
                    <li><a class="dropdown-item p-3" href="official-list.php">Official Position List</a></li>
                    <li><a class="dropdown-item p-3" href="zone-list.php">Zone List</a></li>
                  </ul>
                </div>
                <?php }; ?>
                <?php if($_SESSION['role'] == 'Staff'){ ?>
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="officials.php"><i class="fas fa-users"></i>Officials</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="zone-leader.php"><i class="far fa-user"></i>Zone Leader</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="resident.php"><i class="fas fa-user-friends"></i>Resident</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="business_permit.php"><i class="fas fa-print"></i>Permit</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="barangay_clearance.php"><i class="fas fa-print"></i>Clearance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="complaints.php"><i class="far fa-address-card"></i>Complaints</a>
                  </li>
                <?php }; ?>
                </ul>
              </div>
        </div>
        <!-- GRID-2 -->
          <div class="col-sm-10  p-0">
              <div class="bg-danger w-100 text-light p-4 d-flex justify-content-between">
                <div>
                <h4>Barangay Management System</h4>
                </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle float-right" data-bs-toggle="dropdown">Hi, <?php echo ucwords($_SESSION['name']); ?></button>
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
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 250px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="fas fa-users"></i>
                        <h5 class="mt-3">Number of Barangay Officials</h5>
                        <?php

                        $official = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblofficial");
                        $official_result = mysqli_fetch_array($official);
                        ?>
                        <h4><?php echo $official_result['COUNT']; ?></<h4>
                      </div>
                    </div>
                    <!-- CARD-2 -->
                    <div class="card p-3 bg-dark text-white mt-5" style="width: 250px;">
                      <div class="card-body  mx-auto d-block text-center">
                        <i class="far fa-user"></i>
                        <h5 class="mt-3">Number of Staff</h5>
                        <?php
                        
                        $leader = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tbladmin");
                        $leader_result = mysqli_fetch_array($leader);
                        ?>
                        <h4><?php echo $leader_result['COUNT']; ?></h4>
                      </div>
                    </div>  
                     <!-- CARD-3 -->
                     <div class="card bg-dark text-white p-3 mt-5" style="width: 250px;">
                      <div class="card-body mx-auto d-block text-center">
                        <i class="fas fa-user"></i>
                        <h5 class="mt-3">Number of Zone Leader</h5>
                        <?php
                        
                        $leader = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM tblzoneleader");
                        $leader_result = mysqli_fetch_array($leader);
                        ?>
                        <h4><?php echo $leader_result['COUNT']; ?></h4>
                      </div>
                    </div> 
                    <!-- CARD-4 -->
                    <div class="card bg-dark text-white p-3 mt-5" style="width: 250px;">
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
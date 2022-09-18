<?php require_once 'conn.php';?>
<div class="col-sm-2 bg-dark text-light p-0 " style="height: 100vh;">
            <?php
              // INCLUDE CONN.PHP WHICH IS CONNECTED TO DATABASE
            include('conn.php');
              // PERFORM QUERY TO DATABASE USING mysqli_query() function
              $query = mysqli_query($conn,"SELECT * from `tbl_info`");
              //FETCH RESULT AS AN ASSOCIATIVE ARRAY
            while($row=mysqli_fetch_array($query)){
            ?>
            <div class="header container mt-4 border-bottom">
                <!-- DISPLAY BARANGAYNAME IN H4 ELEMENT TAG -->
                <h4 class="text-center mb-3"><?php echo ($row['barangayname']); ?></h4>
                <!-- ECHO IMAGES THAT IS STORED IN DATABASE -->
                <img src="<?php echo ($row['images']); ?>" alt="user" class=" mx-auto d-block" style="width:120px;height: 100px;">
                <!-- DISPLAY ROLE -->
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
                </ul>
                </div>
                <?php }; ?>
                <?php if($_SESSION['role'] == 'Staff'){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
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
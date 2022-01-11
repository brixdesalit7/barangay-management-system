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
    <title>Manage Account | Barangay Management System</title>
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

<body>

  
    <div class="row">
        <!-- GRID-1 -->
        <div class="col-sm-2 bg-dark text-light p-0 " style="height: 100vh;">
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
          <div class="col-sm-10 p-0">
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
              <div class="container-fluid">
                  <div class="btn mt-5 d-sm-flex justify-content-between">  
                          <div class="header">
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Manage Account</h1>
                          </div>
                  </div>
              </div>
              <div class="container">
                    <div class="mt-5">
                        <?php
                        
                            $erow=mysqli_query($conn,"SELECT * FROM tbladmin WHERE id='".$_SESSION['id']."'");
                            $show=mysqli_fetch_array($erow);
                        ?>
                    
                    <form method="POST" action="manage-acc.php?id=<?php echo $show['id']; ?>">
                      
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $show['name']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5 mt-3">
                                <label for="name" class="form-label">Username:</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" value=<?php echo $show['username'] ?> required>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-sm-5 mt-3">
                                <label for="name" class="form-label">Password:</label>
                                <input type="text" class="form-control" placeholder="Password" name="pass" required>
                        </div>
                    

                        <div class="row">
                            <div class="col-sm-5">
                                <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block">Save</button>
                            </div>
                        </div>

                    </form>

                </div>

    </div>


    <script>
        function Export() {
            let conf = confirm("Procees Record to Excel?")
            if ( conf = true) {
                window.open("export-zonelead.php",'_blank');
            }
        }
    </script>  

     
      

    
</body>
</html>
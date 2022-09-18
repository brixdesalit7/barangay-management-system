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
    <title>Zone Leader | Barangay Management System</title>
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
    <!--Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup",function(){
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
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
                              <li><a class="dropdown-item" href="log-out.php">Logout</a></li>
                            </ul>
                          </div>
                </div>
              <div class="container-fluid">
                  <div class="btn mt-5 d-sm-flex justify-content-between">  
                          <div class="header">
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Zone Leader</h1>
                          </div>
                          <div class="button">
                          <input type="text" placeholder="Search" id="myInput" class="form-control mb-3">
                           <button data-bs-toggle="modal" data-bs-target="#addzoneleader" class="btn btn-danger btn-lg"><i class="fas fa-plus"></i>Add Appointed Zone Leader</button> 
                           <button type="submit" class="btn btn-success btn-lg" onclick="Export()"><i class="fas fa-print"></i>Print</button>
                          </div>
                  </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">

                    <table class="table table-striped text-center">
                      <thead >
                        <th>Name</th>
                        <th>Zone Leader</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Birthday</th>
                        <th>Email Address</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="myTable">
                      <!-- DISPLAY DATA FROM DATABASE -->
                    <?php
                            include('conn.php');
                            // PERFORM QUERY TO DATABASE
                            $query=mysqli_query($conn,"select * from `tblzoneleader`");
                            // FETCH A RESULT AS AN ASSOCIATIVE ARRAY
                            while($row=mysqli_fetch_array($query)){
                              ?>
                              <tr">
                                <!-- DISPLAY ROW FROM THE DATABASE -->
                                <td><?php echo ($row['Name']); ?></td>
                                <td><?php echo ($row['ZoneLeader']); ?></td>
                                <td><?php echo ($row['Gender']); ?></td>
                                <td><?php echo ($row['Status']); ?></td>
                                <td><?php echo ($row['Birthday']); ?></td>
                                <td><?php echo ($row['EmailAddress']); ?></td>
                                <td>
                                <!-- PASS THE ID TO MODAL TO GET THE SPECIFIC COLUMN FROM DATABASE -->
                                <button data-bs-toggle="modal" data-bs-target="#editzoneleader<?php echo $row['id'];?>" class="btn btn-warning"><i class="fas fa-edit"></i>Update</button> 
                                <button data-bs-toggle="modal" data-bs-target="#delzoneleader<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button> 
                                <button data-bs-toggle="modal" data-bs-target="#view-zoneleader<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i>View</button> 
                                <?php include('edit-del-zonelead.php'); ?>
                                </td>
                                
                              </tr>
                              <?php
                            }
                    
                          ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </div>

    <?php include('add_zone_leader.php'); ?>

    <script>
        // FUNCTION FOR EXPORT FUNCTION
        function Export() {
            let conf = confirm("Procees Record to Excel?")
            if ( conf = true) {
                window.open("export-zonelead.php",'_blank');
            } else if(conf == false ) {
              window.close();
            }
        }
    </script>     
     
      

    
</body>
</html>
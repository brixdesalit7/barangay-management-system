<?php
require_once 'conn.php';
// start session
session_start();
// check if session variable is set
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
        <?php include 'sidebar.php'; ?>
        <!-- GRID-2 -->
          <div class="col-sm-10 p-0">
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
              <div class="container-fluid">
                  <div class="btn mt-5 d-sm-flex justify-content-between">  
                          <div class="header">
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Staff</h1>
                          </div>
                          <div class="button">
                          <input type="text" placeholder="Search" id="myInput" class="form-control mb-3">
                          <button data-bs-toggle="modal" data-bs-target="#add_user" class="btn btn-danger btn-lg"><i class="fas fa-plus"></i>Add Staff</button> 
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
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                      </thead>
                      <tbody id="myTable">
                      <!-- DISPLAY DATA FROM DATABASE -->
                    	<?php
                            include('conn.php');
                            // PERFORM QUERY TO DATABASE
                            $query=mysqli_query($conn,"select * from `tbladmin`");
                            // FETCH A RESULT AS AN ASSOCIATIVE ARRAY
                            while($row=mysqli_fetch_array($query)){
                              ?>
                              <tr">
                                <td><?php echo ($row['name']); ?></td>
                                <td><?php echo ($row['username']); ?></td>
                                <td><?php echo ($row['password']); ?></td>
                                <td><?php echo ($row['role']); ?></td>
                                <td>
                                <!-- PASS THE ID TO MODAL TO GET THE SPECIFIC COLUMN FROM DATABASE -->
                                <button data-bs-toggle="modal" data-bs-target="#del-staff<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button> 
                                <button data-bs-toggle="modal" data-bs-target="#view-staff<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i>View</button> 
                                <?php include('edit-del-staff.php'); ?>
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

    <?php include('add_staff.php'); ?>
    
    <script>
        function Export() {
            let conf = confirm("Procees Record to Excel?")
            if ( conf = true) {
                window.open("export-staff.php",'_blank');
            } else if(conf == false ) {
              window.close();
            }
        }
    </script>     
      

    
</body>
</html>
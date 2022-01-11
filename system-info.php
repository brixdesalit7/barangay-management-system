<?php
  include "conn.php";

    if(isset($_POST["submit"]))
    {
        $brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];


        $var1 = rand(1111,9999);  // generate random number in $var1 variable
        $var2 = rand(1111,9999);  // generate random number in $var2 variable
      
        $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
        $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

        $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
        $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
        $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

        move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
      

        $check = mysqli_query($conn, "UPDATE tbl_info SET barangayname='$brgy', city='$city', zipcode='$zip', images='$dst_db' 
        WHERE id='1'");
        
        if($check)
        {
          echo '<script type="text/javascript"> alert("Update Succcess!"); </script>';  // alert message
        }
        else
        {
          echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
        }
    }
?>
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
    <title>Barangay Management System | Barangay Management System</title>
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
              <div class="bg-danger text-light p-4">
                  <h4>Barangay Management System</h4>
              </div>
              <div class="container-fluid">
                  <div class="btn mt-5 d-sm-flex justify-content-between">  
                          <div class="header">
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Barangay System Info</h1>
                          </div>
                  </div>
              </div>
              <div class="container">
                <div class="card mt-5">
                    <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                    
                          <?php
                            include('conn.php');
                    
                            $query=mysqli_query($conn,"SELECT * from `tbl_info`");
                            while($row=mysqli_fetch_array($query)){
                              ?>
                        <div class="row">
                          <div class="col-sm-10">
                            <label for="name" class="form-label">Brgy Name:</label>
                            <input type="text" class="form-control" placeholder="Brgy Name" value="<?php echo ($row['barangayname']); ?>" name="brgy" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-10 mt-3">
                            <label for="name" class="form-label">City:</label>
                            <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo ($row['city']); ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-10 mt-3">
                            <label for="name" class="form-label">Zip Code:</label>
                            <input type="number" class="form-control" placeholder="Zip Code" name="zip" value="<?php echo ($row['zipcode']); ?>" required>
                          </div>
                        </div>
                      

                        <div class="row">
                          <div class="col-sm-10 mt-3">
                            <label for="name" class="form-label">Logo:</label>
                            <input type="file" class="form-control" placeholder="Logo" name="image" required>
                          </div>
                        </div>
                        <?php
                            }
                    
                          ?>
                        <div class="row">
                            <div class="col-sm-12">
                              <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block">Save</button>
                            </div>
                        </div>
                        </form>   
                    </div>
                </div>
              </div>
                
    </div>


     
      

    
</body>
</html>
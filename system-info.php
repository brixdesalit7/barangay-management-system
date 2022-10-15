<?php
  include "conn.php";

    if(isset($_POST["submit"]))
    {
        // GET THE VALUE OF POST WHICH IS USED TO SEND 
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
// start session
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
                            // PERFORM A QUERY TO DATABASE
                            $query=mysqli_query($conn,"SELECT * from `tbl_info`");
                            // FETCH RESULT AS AN ASSOCIATIVE ARRAY
                            while($row=mysqli_fetch_array($query)){
                              ?>
                        <div class="row">
                          <div class="col-sm-10">
                            <label for="name" class="form-label">Brgy Name:</label>
                            <!-- DISPLAY THE VALUE OF EACH ROW TO INPUT ELEMENT -->
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
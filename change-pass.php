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
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Manage Account</h1>
                          </div>
                  </div>
              </div>
              <div class="container">
                    <div class="mt-5">
                        <?php
                          // PERFORM QUERY TO DATABASE
                            $erow = mysqli_query($conn,"SELECT * FROM tbladmin WHERE id='".$_SESSION['id']."'");
                         // FETCH A RESULT AS AN ASSOCIATIVE ARRAY
                            $show = mysqli_fetch_array($erow);
                        ?>
                    <!-- PASS A PARAMETER TO manage-acc.php id -->
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
                                <label for="name" class="form-label">New Password:</label>
                                <input type="text" class="form-control" placeholder="New Password" name="pass" required>
                        </div>
                    

                        <div class="row">
                            <div class="col-sm-5">
                                <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block">Save</button>
                            </div>
                        </div>

                    </form>

                </div>

    </div>

</body>
</html>
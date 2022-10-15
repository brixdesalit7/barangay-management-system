<?php
  session_start();
  // check if the global variable id is set
  if (isset($_SESSION['id'])) {
    // locate the page to dashboard
      header("Location:dashboard.php");
      // terminate script
      exit();
  }
  // Include database connectivity
  include_once('conn.php');
  // check if form is submit
  if (isset($_POST['submit'])) {

      $errorMsg = "";
      // collect form data
      // remove special characters real_escape_string
      $username = $conn->real_escape_string($_POST['username']);
      $password = $conn->real_escape_string(md5($_POST['password']));
    // check if not empty the form data
    if (!empty($username) || !empty($password)) {
    
          $query  = "SELECT * FROM tbladmin WHERE username = '$username' AND password = '$password' ";
          // perform query to database
          $result = $conn->query($query);
          // check the if the number of row in result set is greater than 0
          if($result->num_rows > 0 ){
              // fetch result row as an associative array
              $row = $result->fetch_assoc();
              // store the info in $_SESSION var to be used to multiple pages
              $_SESSION['id'] = $row['id'];
              $_SESSION['role'] = $row['role'];
              $_SESSION['name'] = $row['name'];
              // locate the page to dashboard
              header("Location:dashboard.php");
              // terminate script
              die();                                                
          } else if (empty($username) || empty($password)) {
            $errorMsg = "Username and Password is required";
          }
          else {
            $errorMsg = "Invalid username or password";
          } 
      }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Barangay Management System | Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="center">
      <h1>Barangay Management System</h1>
      <form method="post">
        <?php if (isset($errorMsg)) { ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"></button>
              <?php echo $errorMsg; ?>
            </div>
          <?php }; ?>
        <div class="txt_field">
          <input type="text" name="username" >
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" >
          <span></span>
          <label>Password</label>
        </div>
        <input style="margin-bottom: 50px;" type="submit" name="submit" value="Login">

      </form>
    </div>

  </body>
</html>

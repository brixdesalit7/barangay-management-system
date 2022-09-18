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
    <title>Official List | Barangay Management System</title>
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
                            <h1 class="text-danger"><i class="fas fa-users px-3"></i>Official Position</h1>
                          </div>
                          <div class="button">
                          <button data-bs-toggle="modal" data-bs-target="#addposition" class="btn btn-danger btn-lg"><i class="fas fa-plus"></i>Add New</button> 
                          <?php include('add_position.php'); ?>
                          </div>
                  </div>
              </div>
              <div class="container-fluid">
                    <h3 class="mt-3 text-center">Position List</h3>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="table-responsive">

                            <table class="table table-striped text-center">
                              <thead >
                                <th>Position</th>
                              </thead>
                              <tbody id="myTable">
                              <!-- DISPLAY DATA FROM DATABASE -->
                              <?php
                                    include('conn.php');
                            
                                    $query=mysqli_query($conn,"select * from `tblofficial_position`");
                                    while($row=mysqli_fetch_array($query)){
                                      ?>
                                      <tr">
                                        <td><?php echo ($row['position']); ?></td>
                                        <td>
                                        <button data-bs-toggle="modal" data-bs-target="#del-position<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button> 
                                        <?php include('del-official-position.php'); ?>
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
    <script>
    function display_img(input){
        if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
    }
    $(function(){
        $('#sys-info').submit(function(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            $('.card button').attr('disabled',true)
            $('.card button[type="submit"]').text('saving data...')
            $.ajax({
                url:'./../Actions.php?a=save_settings',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error:err=>{
                    console.log(err)
                    _el.addClass('alert alert-danger')
                    _el.text("An error occurred.")
                    _this.prepend(_el)
                    _el.show('slow')
                     $('.card button').attr('disabled',false)
                     $('.card button[type="submit"]').text('Save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                            location.reload()
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    _el.text(resp.msg)

                    _el.hide()
                    _this.prepend(_el)
                    _el.show('slow')
                     $('.card button').attr('disabled',false)
                     $('.card button[type="submit"]').text('Save')
                }
            })
        })
    })
</script>   
     
      

    
</body>
</html>
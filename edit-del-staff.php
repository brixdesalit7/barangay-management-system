
         <!-- DELETE -->
         <div class="modal fade " id="del-staff<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Staff</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tbladmin WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['name']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-resident.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->



<!--View -->
<div class="modal fade " id="view-staff<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Staff Details</h4>
                </div>

                <div class="modal-body">
                <?php
                    $view=mysqli_query($conn,"SELECT * FROM tbladmin WHERE id='".$row['id']."'");
                    $erow=mysqli_fetch_array($view);
                ?>
                <h5>Name:</h5>
                <p><b><?php echo $erow['name']; ?></b></p>
                <h5>Username:</h5>
                <p><b><?php echo $erow['username']; ?></b></p>
                <h5>Role:</h5>
                <p><b><?php echo $erow['role']; ?></b></p>
              
                
                
                
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

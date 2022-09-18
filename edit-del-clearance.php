 <!-- MODAL EDIT RECORD -->
 <div class="modal fade" id="editclearance<?php echo $row['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Clearance</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                // PERFORM A QUERY TO DATABASE
                $edit=mysqli_query($conn,"SELECT * FROM tblclearance WHERE id='".$row['id']."'");
                // FETCH RESULT AS AN ASSOCIATIVE ARRAY
                $erow=mysqli_fetch_array($edit);
                ?>
                <div class="mt-3">
                  <form action="edit-clearance.php?id=<?php echo $erow['id'];?>" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Full Name:</label>
                            <input type="text" class="form-control" placeholder="Lastname/Firstname/Middlename" name="name" value="<?php echo $erow['Name']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="age" class="form-label">Age:</label>
                            <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $erow['Age']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="contact" class="form-label">Contact Number:</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contact" value="<?php echo $erow['ContactNumber'];?>" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">O.R #:</label>
                            <input type="number" class="form-control" placeholder="Official Receipt" name="receipt" value="<?php echo $erow['receipt'];?>" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Purpose:</label>
                            <input type="text" class="form-control" placeholder="Purpose" name="purpose" value="<?php echo $erow['Purpose'];?>" required>
                          </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-sm-6">
                              <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Save</button>
                            </div>
                        </div>
                  </form>   
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      
      <!-- DELETE -->
      <div class="modal fade " id="del-clearance<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Records</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblclearance WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['Name']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-clearance.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
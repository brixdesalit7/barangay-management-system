        <!-- MODAL EDIT RECORD-->
        <div class="modal fade" id="editcomplaint<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

         
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Complaint Details</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                    // PERFORM A QUERY TO DATABASE
                    $edit=mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE id='".$row['id']."'");
                    // FETCH RESULT AS AN ASSOCIATIVE ARRAY
                    $erow=mysqli_fetch_array($edit);
                ?>
                <div class="mt-3">
                  <form action="edit-complaint.php?id=<?php echo $erow['id']; ?>" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Complainant:</label>
                            <input type="text" class="form-control" placeholder="Name" name="complainant" value="<?php echo $erow['Complainant']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Apellant:</label>
                            <input type="text" class="form-control" placeholder="Address" name="apellant" value="<?php echo $erow['Apellant'];?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Complaint Description:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="description" value="<?php echo $erow['Complaint'];?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="position" class="form-label">Status:</label>
                              <select class="form-select" id="sel1" name="status" required>
                                <option><?php echo $erow['Status']; ?></option>
                                <option>Not Settled</option>
                                <option>Settled</option>
                              </select>
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
      <div class="modal fade " id="del-complaint<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Officials</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete this from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-complaints.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


<!--View -->
<div class="modal fade " id="view-complaint<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Complaint Details</h4>
                </div>

                <div class="modal-body">
                <?php
                    $view=mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE id='".$row['id']."'");
                    $erow=mysqli_fetch_array($view);
                ?>
                <h5>Date Issued:</h5>
                <p><b><?php echo $erow['DateIssued']; ?></b></p>
                <h5>Complainant:</h5>
                <p><b><?php echo $erow['Complainant']; ?></b></p>
                <h5>Apellant:</h5>
                <p><b><?php echo $erow['Apellant']; ?></b></p>
                <h5>Complaint:</h5>
                <p><b><?php echo $erow['Complaint']; ?></b></p>
                <h5>Status:</h5>
                <p><b><?php echo $erow['Status']; ?></b></p>
          
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- EDIT BUSINESS PERMIT MODAL -->
 <div class="modal fade" id="editbusiness_permit<?php echo $row['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Business Permit</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                    // PERFORM A QUERY TO DATABASE
                    $edit = mysqli_query($conn, "SELECT * FROM tblbusiness_permit WHERE id='".$row['id']."'");
                    // FETCH RESULT AS AN ASSOCIATIVE ARRAAY
                    $erow = mysqli_fetch_array($edit);
                ?>
                <div class="mt-3">
                  <form action="edit-business_permit.php?id=<?php echo $erow['id']; ?>" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="owner" class="form-label">Owner Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="owner" value="<?php echo $erow['OwnerName']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="business_name" class="form-label">Business Name:</label>
                            <input type="text" class="form-control" placeholder="Address" name="business_name" value="<?php echo $erow['BusinessName']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="kind_business" class="form-label">Business Type:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="type_business" value="<?php echo $erow['BusinessType']; ?>" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">TIN Number:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="tin" value="<?php echo $erow['TIN']; ?>" required>
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
      <div class="modal fade " id="del-business_permit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Officials</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblbusiness_permit WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                  <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['OwnerName']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-business_permit.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->
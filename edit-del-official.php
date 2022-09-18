        <!-- MODAL EDIT RECORD-->
        <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Official Details</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                    // PERFORM A QUERY TO DATABASE
                    $edit=mysqli_query($conn,"SELECT * FROM tblofficial WHERE id='".$row['id']."'");
                    // FETCH RESULT AS AN ASSOCIATIVE ARRAY
                    $erow=mysqli_fetch_array($edit);
                ?>
                <div class="mt-3">
                  <form action="edit-official.php?id=<?php echo $erow['id']; ?>" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" value=<?php echo $erow['Name']; ?> name="name" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Address:</label>
                            <input type="text" class="form-control" value=<?php echo $erow['Address']; ?> name="address" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control" value="<?php echo $erow['Contactnumber']; ?>" name="contact" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">Start of Term:</label>
                            <input type="date" class="form-control" value="<?php echo $erow['StartofTerm']; ?>"  name="term-start" required>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">End of Term:</label>
                            <input type="date" class="form-control" value="<?php echo $erow['EndofTerm']; ?>" name="term-end" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="position" class="form-label">Position</label>
                              <select class="form-select" id="sel1" name="position" value="<?php echo $erow['Position']; ?>" required>
                                <option><?php echo $erow['Position']; ?></option>
                                <?php
                                    include "conn.php";  // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT position From tblofficial_position");  // Use select query here 

                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['position'] ."'>" .$data['position'] ."</option>";  // displaying data in option menu
                                    }	
                                ?>  
                              </select>
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                              <button type="submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Save</button>
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
      <div class="modal fade " id="del-official<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Officials</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblofficial WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['Name']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-official.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

  <!--View -->
  <div class="modal fade " id="view-official<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Official Details</h4>
                </div>

                <div class="modal-body">
                <?php
                    $view=mysqli_query($conn,"SELECT * FROM tblofficial WHERE id='".$row['id']."'");
                    $erow=mysqli_fetch_array($view);
                ?>
                <h5>Name:</h5>
                <p><b><?php echo $erow['Name']; ?></b></p>
                <h5>Position:</h5>
                <p><b><?php echo $erow['Position']; ?></b></p>
                <h5>Address:</h5>
                <p><b><?php echo $erow['Address']; ?></b></p>
                <h5>Contact Number:</h5>
                <p><b><?php echo $erow['Contactnumber']; ?></b></p>
                <h5>Start of Term:</h5>
                <p><b><?php echo $erow['StartofTerm']; ?></b></p>
                <h5>End of Term:</h5>
                <p><b><?php echo $erow['EndofTerm']; ?></b></p>
                
                
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

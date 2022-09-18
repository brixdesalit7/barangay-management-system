 <!-- MODAL EDIT RECORD -->
 <div class="modal fade" id="editzoneleader<?php echo $row['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Zone Leader</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn,"SELECT * FROM tblzoneleader WHERE id='".$row['id']."'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="mt-3">
                  <form action="edit-zonelead.php?id=<?php echo $erow['id']; ?>" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $erow['Name']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="position" class="form-label">Zone:</label>
                              <select class="form-select" id="sel1" name="zone" required>
                                <option><?php echo $erow['ZoneLeader']; ?></option>
                                <?php
                                    include "conn.php";  // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT zone_list From tblzone_list");  // Use select query here 

                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['zone_list'] ."'>" .$data['zone_list'] ."</option>";  // displaying data in option menu
                                    }	
                                ?>  
                              </select>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">Contact Number:</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contact" value="<?php echo $erow['ContactNumber']; ?>" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                             <label for="gender" class="form-label">Gender:</label> 
                             <select class="form-select" id="sel1" name="gender" value="<?php echo $erow['Gender']; ?>" required>
                             <option>Male</option>
                             <option>Female</option>
                             <option>Prefer not to say</option>
                            </select>
                          </div>
                          <div class="col-sm-6 mt-3">
                             <label for="status" class="form-label">Status:</label> 
                             <select class="form-select" id="sel1" name="status" value="<?php echo $erow['Status']; ?>" required>
                             <option>Single</option>
                             <option>Married</option>
                             <option>Prefer not to say</option>
                             </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                              <label for="birthday" class="form-label">Birthday:</label>
                              <input type="date" class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $erow['Birthday']; ?>" required>
                          </div>
                            <div class="col-sm-6 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $erow['EmailAddress']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mt-3">
                              <button type="submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Update</button>
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
      <div class="modal fade " id="delzoneleader<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Officials</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblzoneleader WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['Name']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-zonelead.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!--View -->
<div class="modal fade " id="view-zoneleader<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Zone Leader Details</h4>
                </div>

                <div class="modal-body">
                <?php
                    $view=mysqli_query($conn,"SELECT * FROM tblzoneleader WHERE id='".$row['id']."'");
                    $erow=mysqli_fetch_array($view);
                ?>
                <h5>Name:</h5>
                <p><b><?php echo $erow['Name']; ?></b></p>
                <h5>Zone Leader:</h5>
                <p><b><?php echo $erow['ZoneLeader']; ?></b></p>
                <h5>Contact Number:</h5>
                <p><b><?php echo $erow['ContactNumber']; ?></b></p>
                <h5>Gender:</h5>
                <p><b><?php echo $erow['Gender']; ?></b></p>
                <h5>Status:</h5>
                <p><b><?php echo $erow['Status']; ?></b></p>
                <h5>Birthday:</h5>
                <p><b><?php echo $erow['Birthday']; ?></b></p>
                <h5>Email:</h5>
                <p><b><?php echo $erow['EmailAddress']; ?></b></p>
                
                
                
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


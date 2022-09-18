 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addrecord"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Barangay Officials</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-official.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Address:</label>
                            <input type="text" class="form-control" placeholder="Address" name="address" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="contact" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">Start of Term:</label>
                            <input type="date" class="form-control" placeholder="Start of Term" name="term-start" required>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">End of Term:</label>
                            <input type="date" class="form-control" placeholder="End of Term" name="term-end" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">                             
                              Position:
                              <select class="form-select" name="position">
                                <option disabled selected>-- Position --</option>
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
                              <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Add Record</button>
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
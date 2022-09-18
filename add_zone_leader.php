 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addzoneleader"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Zone Leader</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-zone-leader.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">                             
                              Zone:
                              <select class="form-select" name="zone">
                                <option disabled selected>-- Select Zone --</option>
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
                        </div>

                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">Contact Number:</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contact" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="gender" class="form-label">Gender:</label> 
                            <select class="form-select" id="sel1" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Prefer not to say</option>
                            </select>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <label for="status" class="form-label">Status:</label> 
                            <select class="form-select" id="sel1" name="status">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Prefer not to say</option>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                              <label for="birthday" class="form-label">Birthday:</label>
                              <input type="date" class="form-control" placeholder="Birthday" name="birthday" required>
                          </div>
                            <div class="col-sm-6 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mt-3">
                              <button type="submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Add Zone Leader</button>
                            </div>
                        </div>
                  </form>   
                </div>
            </div>
          
          </div>
        </div>
      </div>
 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addclearance"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Clearance</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-clearance.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Full Name:</label>
                            <input type="text" class="form-control" placeholder="Lastname/Firstname/Middlename" name="name" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="age" class="form-label">Age:</label>
                            <input type="number" class="form-control" placeholder="Age" name="age" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="contact" class="form-label">Contact Number:</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contact" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">O.R #:</label>
                            <input type="text" class="form-control" placeholder="Official Receipt" name="receipt" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Purpose:</label>
                            <input type="text" class="form-control" placeholder="Purpose" name="purpose" required>
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
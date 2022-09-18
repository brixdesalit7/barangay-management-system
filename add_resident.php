 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addresident"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Resident</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-resident.php" method="POST">

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
                          <div class="col-sm-6 mt-3">
                            <label for="contact" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="contact" required>
                          </div>

                          <div class="col-sm-6 mt-3">
                            <label for="position" class="form-label">Gender</label>
                              <select class="form-select" id="sel1" name="gender" required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer not to say</option>
                              </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                          <label for="position" class="form-label">Status</label>
                              <select class="form-select" id="sel1" name="status" required>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Prefer not to say</option>
                              </select>
                        </div>
                        </div>
                          <div class="col-sm-6 mt-3">
                            <label for="name" class="form-label">Birthday</label>
                            <input type="date" class="form-control" placeholder="End of Term" name="birthday" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="email">Email</label>
                          <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                              <button type="submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Add Record</button>
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
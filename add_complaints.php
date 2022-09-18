 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addcomplaints"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Complaint</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-complaints.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Complainant:</label>
                            <input type="text" class="form-control" placeholder="Name" name="complainant" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Apellant:</label>
                            <input type="text" class="form-control" placeholder="Address" name="apellant" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">Complaint Description:</label>
                            <input type="text" class="form-control" placeholder="Contact" name="description" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 mt-3">
                            <label for="position" class="form-label">Status:</label>
                              <select class="form-select" id="sel1" name="status" required>
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
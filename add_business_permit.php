 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addbusiness_permit"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Business Permit</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-business_permit.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="owner" class="form-label">Owner Name:</label>
                            <input type="text" class="form-control" placeholder="Name" name="owner" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="business_name" class="form-label">Business Name:</label>
                            <input type="text" class="form-control" placeholder="Address" name="business_name" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-12 mt-3">
                            <label for="kind_business" class="form-label">Business Type:</label>
                            <input type="text" class="form-control" placeholder="Business Type" name="type_business" required>
                          </div>
                          <div class="col-sm-12 mt-3">
                            <label for="name" class="form-label">TIN Number:</label>
                            <input type="text" class="form-control" placeholder="TIN Number" name="tin" required>
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
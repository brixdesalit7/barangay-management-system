 <!-- MODAL ADD RECORD -->
 <div class="modal fade" id="addzone"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Zone</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mt-3">
                  <form action="save-zonelist.php" method="POST">

                        <div class="row">
                          <div class="col-sm-12">
                            <label for="name" class="form-label">Zone:</label>
                            <input type="number" class="form-control" placeholder="Zone" name="zone" required>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                              <button type="Submit" name="submit" class="btn btn-success mt-3 mx-auto d-block"><i class="fas fa-user-plus"></i>Add</button>
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
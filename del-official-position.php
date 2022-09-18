<!-- DELETE -->
    <div class="modal fade " id="del-position<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Officials</h4>
                </div>

                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"SELECT * FROM tblofficial_position WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
	
                <div class="container-fluid text-center">
                    <i style="color:red;font-size:120px;"; class="fas fa-exclamation mx-auto d-block"></i>
					<h5><center>Are you sure to delete <strong><?php echo ucwords($row['position']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete-position-list.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
        </div>
    </div>
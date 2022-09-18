<div class="modal fade" id="view-permit<?php echo $row['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Business Permit Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        
                        $edit = mysqli_query($conn, "SELECT * FROM tblbusiness_permit WHERE id='".$row['id']."'");
                        $erow = mysqli_fetch_array($edit);
                    ?>
                    <div class="container-fluid mt-3">
                        <div id="outprint-modal">
                        <dl class="row mb-5">
                            <dt class="col-md-6">Owner Name</dt>
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo $erow['OwnerName'];?></dd>
                            <dt class="col-md-6">Business Name</dt>
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo $erow['BusinessName'];?></dd>
                            <dt class="col-md-6">Kind of Business</dt>
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo $erow['BusinessType'];?></dd>
                            <dt class="col-md-6">TIN</dt>
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo $erow['TIN'];?></dd>
                            <dt class="col-md-6">Date Issued</dt>
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo date("M d, Y",strtotime($erow['DateIssued'])) ?></dd>
                            <?php
                                // perform query to database
                                $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                                // fetch result as an associative array
                                $show = mysqli_fetch_array($system_info);
                            ?>
                            <dt class="col-md-6">Issued at</dt>
                            <!-- echo barangay name and city -->
                            <dd class="col-md-6 border-bottom border-dark">: <?php echo $show['barangayname'];?> <?php echo $show['city'];?></dd>
                        </dl>
                        <p>
                            <span class="ms-5 mx-5"></span>This CERTIFICATION is issued upod the request of the above-named person in connection with his/her application for <b class="px-4 border-bottom border-dark">Business Permit</b>.
                        </p>
                        <p><span class="ms-5 mt-5">ISSUED this <b><u class="px-1"><?php echo date('dS',strtotime($erow['DateIssued'])); ?></u></b> day of <b><u class="px-1"><?php echo date('F Y',strtotime($erow['DateIssued'])); ?></u></b> at <?php echo $show['barangayname']; ?> .</p>
                        <?php
                            $position = mysqli_query($conn,"SELECT * FROM tblofficial WHERE Position = 'Chairman'");
                            $official = mysqli_fetch_array($position);
                        ?>
                        <div class="d-flex w-100 justify-content-end mt-5">
                        <div class="col-4">
                            <div class="w-100 text-center border-bottom border-dark"><?php echo $official['Name']; ?></div>
                            <div class="w-100 text-center">Chairman</div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="print-permit.php?print=<?php echo htmlentities($row['id']);?>" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>    
        </div>
    </div>
</div>
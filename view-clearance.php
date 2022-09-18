
<div class="modal fade" id="view-clearance<?php echo $row['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Barangay Clearance Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        // PERFORM A QUEREY TO DATABASE
                        $edit = mysqli_query($conn, "SELECT * FROM tblclearance WHERE id='".$row['id']."'");
                        // FETCH RESULT AS AN ASSOC ARRAY
                        $erow = mysqli_fetch_array($edit);
                    ?>
                    <div class="container-fluid mt-4">
                        <div id="outprint">
                            <?php
                                    $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                                    $show = mysqli_fetch_array($system_info);
                                ?>
                            <p>
                            <span class="ms-5">This is to certify that <b><u class="px-1"><?php echo $erow['Name']; ?>, <?php echo $erow['Age']; ?></u></b> years old, and a resident of<u class="px-1"><b><?php echo $show['barangayname']; ?></u></b>, is known to be of good moral character and law-abiding citizen in the community.</span>
                            </p>
                            <p><span class="ms-5 mt-5"></span>To certify further, that he/she has no derogatory and/or criminal records filed in this barangay.</p>
    
                            <p><span class="ms-5">ISSUED this <b><u class="px-1"><?php echo date('dS',strtotime($erow['DateIssued'])); ?></u></b> day of <b><u class="px-1"><?php echo date('F Y',strtotime($erow['DateIssued'])); ?></u></b> at <?php echo $show['barangayname'] ?>, <?php echo $show['city'] ?>,  upon request of the interested party for whatever legal purposes it may serve.</p>
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
                            <dl class="row">
                                <dt class='col-auto'>OR #:</dt>
                                <dd class='col-3 border-bottom'><?php echo ($erow['receipt']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class='col-auto'>Date Issued:</dt>
                                <dd class='col-3 border-bottom'><?php echo date("M d,Y",strtotime($erow['DateIssued'])); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="print-clearance.php?print=<?php echo htmlentities($row['id']);?>" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
                
        </div>
    </div>
</div>


        <div id="noscript2" class="d-none">
            <div class="d-flex w-100 align-items-center">
                <div class="col-2 px-3">
                    <?php
                        $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                        $show = mysqli_fetch_array($system_info);
                    ?>
                    <center><img src="<?php echo($show['images']);?>" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
                </div>
                <div class="col-8 flex-grow-1 lh-1">
                    <p class="m-0 text-center">Republic of the Philippines</p>
                    <p class="m-0 text-center mt-1"><?php echo($show['barangayname']); ?></p>
                <div class="clearfix"></div>
                    <p class="fw-bold text-center mt-1"><large><?php echo($show['city']); ?></large></p>
                </div>
                <div class="col-2">

                                </div>
                            </div>
                            <hr>
                            <br>
                            <h2 class="fw-bold text-center">Barangay Clearance</h2>
                            <br>
                            <br>
                            <br>
                            <br>
        </div>

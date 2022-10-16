<!DOCTYPE html>
<?php
	require 'conn.php';
?>
<html lang="en">
	<head>
        
		<style>	
        
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
        /* HEADER */
        .header {
            display : flex;
            position: relative;
            top: 20px;
            justify-content: space-between;
            margin-bottom: 60px;
        }
        .col-1 {
          align-self: flex-start;
          position: absolute;
          top: 10%;
          left: 5%;
        }
        .col-2 {
            margin: auto;
            display: block;
            text-align: center;
        }
        /* BODY */
        .permit-content {
            display: grid;
            justify-content: center;
            text-align:center;
            margin-top: 40px;
            font-size: 23px;
        
        }
        dd {
            font-size: 23px;
            margin-left: 180px;
            text-align: center;
        }
        dt {
            float: left;
            margin-bottom: 18px;
        }
        .content p {
            text-indent: 50px;
            line-height: 30px;
            font-size: 18px;
            padding: 0 20px;
        }
        /* FOOTER */
        .footer {
            display: flex;
            justify-content: space-between;
            width: 700px;
            margin-top: 60px;
        }
        .footer-1 {
            align-self: flex-end;
            margin-top: 80px;
            margin-left: 100px;
        }
        .footer-2 {
            align-self: flex-start;  
        }
        </style>
<body>
        <?php
            $edit = mysqli_query($conn,"SELECT * FROM tblclearance");
            $erow = mysqli_fetch_array($edit);
        ?>
        <div id="noscript2" class="d-none">
            <div class="header">
                <div class="col-1">
                    <?php
                        $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                        $show = mysqli_fetch_array($system_info);
                    ?>
                    <center><img src="<?php echo($show['images']);?>" alt="Barangay Logo" class="img-fluid rounded-0" width="100px" height="100px"></center>
                </div>
                <div class="col-2">
                        <p class="m-0 text-center">Republic of the Philippines</p>
                        <p class="m-0 text-center mt-1"><?php echo($show['barangayname']); ?></p>
                        <p class="fw-bold text-center mt-1"><large><?php echo($show['city']); ?></large></p>
                </div>
            </div>
            <hr>
            <div id="outprint">
                <h1 class="clearance" style="text-align: center;">Barangay Business Permit</h1>
            <?php
                $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                $show = mysqli_fetch_array($system_info);
                ?>
            <?php 
                // get the global variable print
                // this has a value of id from database
                $pri = $_GET['print'];
                // perform query to database
                $sql = mysqli_query($conn,"SELECT * FROM tblbusiness_permit WHERE id='$pri'");
                                while($erow = mysqli_fetch_array($sql)){
            ?>
                            <div class="permit-content">  
                                            <div>
                                                <dt class="col-md-6">Owner Name</dt>
                                                <dd class="col-md-6">: <?php echo $erow['OwnerName'];?></dd>
                                            </div>
                                            <div>
                                                <dt class="col-md-6">Business Name</dt>
                                                <dd class="col-md-6">: <?php echo $erow['BusinessName'];?></dd>
                                            </div>
                                            <div>
                                                <dt class="col-md-6">Kind of Business</dt>
                                                <dd class="col-md-6 ">: <?php echo $erow['BusinessType'];?></dd>
                                            </div>
                                            <div>
                                                <dt class="col-md-6">TIN</dt>
                                                <dd class="col-md-6 ">: <?php echo $erow['TIN'];?></dd>
                                            </div>
                                            <div>
                                                <dt class="col-md-6">Date Issued</dt>
                                                <dd class="col-md-6 ">: <?php echo date("M d, Y",strtotime($erow['DateIssued'])) ?></dd>
                                            </div>
                                            <div>
                                                <dt class="col-md-6">Issued at</dt>
                                                <dd class="col-md-6">: <?php echo $show['barangayname'];?> <?php echo $show['city'];?></dd>
                                            </div>
                                            <?php
                                                $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                                                $show = mysqli_fetch_array($system_info);
                                            ?>
                                </div>
                                <div class="content">
                                    <p>
                                        <span class="ms-5 mx-5"></span>This CERTIFICATION is issued upod the request of the above-named person in connection with his/her application for <b class="px-4 border-bottom border-dark">Business Permit</b>.
                                    </p>
                                    <p><span class="ms-5 mt-5">ISSUED this <b><u class="px-1"><?php echo date('dS',strtotime($erow['DateIssued'])); ?></u></b> day of <b><u class="px-1"><?php echo date('F Y',strtotime($erow['DateIssued'])); ?></u></b> at <?php echo $show['barangayname']; ?> .</p>
                                    <?php
                                        $position = mysqli_query($conn,"SELECT * FROM tblofficial WHERE Position = 'Chairman'");
                                        $official = mysqli_fetch_array($position);
                                    ?>
                                        <div class="footer">
                                        
                                            <dl class="footer-1">                                    <h3 style="border-bottom: 1px solid black;"><?php  echo date("M d,Y",strtotime($erow['DateIssued'])); ?></h3>
                                                <h3 class="date-issued" style="text-align:center;">Date Issued:</h3>
                                            </dl>
                                            <div class="footer-2">
                                                <h3 style="border-bottom: 1px solid black;"><?php echo $official['Name']; ?></h3>
                                                <h4 style="text-align: center;">Chairman</h4>
                                            </div>
                                </div>
                            <?php   
                                }
                            ?>
                    </div>
        </div>

<script>
    // add event when a html page completly loaded DOMContentLoaded
	window.addEventListener('DOMContentLoaded', (event) => {
        window.print();
	});
</script>

</body>
</html>



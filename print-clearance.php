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
        .clearance {
            margin-top: 40px;
            font-size: 50px;
        }
        .content {
            margin-top: 60px;
            padding: 0 25px;
        }
        .content p {
            text-indent: 50px;
            line-height: 30px;
            font-size: 18px;
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
                                    <h1 class="clearance" style="text-align: center;">Barangay Clearance</h1>
                    
                            <?php
                                    $system_info = mysqli_query($conn,"SELECT * FROM tbl_info");
                                    $show = mysqli_fetch_array($system_info);
                            ?>
                            <?php 
                                $pri = $_GET['print'];
                                $sql = mysqli_query($conn,"SELECT * FROM tblclearance WHERE id='$pri'");
                                while($erow = mysqli_fetch_array($sql)){
                         
                            ?>
                            <div class="content">
                                <h3 style="text-align: left;margin-left:20px;">TO WHOM IT MAY CONCERN: </h3>
                            <p>
                            <span class="ms-5">This is to certify that <b><u class="px-1"><?php echo $erow['Name']; ?>, <?php echo $erow['Age']; ?></u></b> years old, and a resident of <u class="px-1"><b><?php echo $show['barangayname']; ?></u></b>, is known to be of good moral character and law-abiding citizen in the community.</span>
                            </p>
                            <p><span class="ms-5 mt-5"></span>To certify further, that he/she has no derogatory and/or criminal records filed in this barangay.</p>
    
                            <p><span class="ms-5">ISSUED this <b><u class="px-1"><?php echo date('dS',strtotime($erow['DateIssued'])); ?></u></b> day of <b><u class="px-1"><?php echo date('F Y',strtotime($erow['DateIssued'])); ?></u></b> at <?php echo $show['barangayname'] ?>, <?php echo $show['city'] ?>,  upon request of the interested party for whatever legal purposes it may serve.</p>
                            <?php
                                $position = mysqli_query($conn,"SELECT * FROM tblofficial WHERE Position = 'Chairman'");
                                $official = mysqli_fetch_array($position);
                            ?>
                            </div>
                            <div class="footer">
                               
                                <dl class="footer-1">
                                    <h3 style="border-bottom: 1px solid black;text-align:center;"><?php  echo ($erow['receipt']); ?></h3>
                                    <h3 class="date-issued" style="text-align:center;">OR #:</h3>
                                    <h3 style="border-bottom: 1px solid black;"><?php  echo date("M d,Y",strtotime($erow['DateIssued'])); ?></h3>
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

<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>

</body>
</html>



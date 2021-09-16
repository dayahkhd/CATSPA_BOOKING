<?php
	include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Appointment</title>
	  <meta content="" name="description">

	  <meta content="" name="keywords">

	  <!-- Favicons -->
	  <link href="assets/img/logo.png" rel="icon">
	  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	  <!-- Google Fonts -->
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	  <!-- Vendor CSS Files -->
	  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
	  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

	  <!-- Template Main CSS File -->
	  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

	<?php include 'header.php';?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="#"></a></li>

        </ol>
        <h2>Customer Appointment Update</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<form method="post">

			<div class="row">
				<?php

					$custid = $_GET['id'];

					$query = "SELECT * FROM appointment WHERE id='$custid'";
					$result = mysql_query($query) or die(mysql_error());
					$data = mysql_fetch_array($result);

					$apid = $data['id']; //id for appointment
					$appid = $data['id_cust']; //id for customer who made the appointment
					$appdate = $data['adate'];
					$apptime = $data['atime'];
					$apppackge = $data['apackage'];
					$appcname = $data['cname'];
					$appcsex = $data['csex'];
					$appccoat = $data['ccoat'];
					$appcage = $data['cage'];
					$appst = $data['aptstatus'];
					$apgmr = $data['groomer'];

					$cquery = "SELECT * FROM customer WHERE id='$appid'"; 
					$cresult = mysql_query($cquery) or die(mysql_error());
					$cdata = mysql_fetch_array($cresult);

					$cnamedb = $cdata['fname'];
					$cnamedb2 = $cdata['lname'];

					$tquery = "SELECT * FROM gtime WHERE id='$apptime'";
					$tresult = mysql_query($tquery) or die(mysql_error());
					$tdata = mysql_fetch_array($tresult);

					$tnamedb = $tdata['tname'];

					$pquery = "SELECT * FROM package WHERE id='$apppackge'";
					$presult = mysql_query($pquery) or die(mysql_error());
					$pdata = mysql_fetch_array($presult);

					$pnamedb = $pdata['pname'];

					$squery = "SELECT * FROM sex WHERE id='$appcsex'";
					$sresult = mysql_query($squery) or die(mysql_error());
					$sdata = mysql_fetch_array($sresult);

					$snamedb = $sdata['sname'];

					$ccquery = "SELECT * FROM coat WHERE id='$appccoat'";
					$ccresult = mysql_query($ccquery) or die(mysql_error());
					$ccdata = mysql_fetch_array($ccresult);

					$ccnamedb = $ccdata['ccname'];

					$aquery = "SELECT * FROM age WHERE id='$appcage'";
					$aresult = mysql_query($aquery) or die(mysql_error());
					$adata = mysql_fetch_array($aresult);

					$anamedb = $adata['caname'];

					$ssquery = "SELECT * FROM aptstatus WHERE id='$appst'";
					$ssresult = mysql_query($ssquery) or die(mysql_error());
					$ssdata = mysql_fetch_array($ssresult);

					$ssnamedb = $ssdata['aptstname'];


					
					
				?>

				<?php

					if (isset($_POST['submit'])=="Update") {

						$upappt = $_POST['apst'];
						$upgmr = $_POST['groomer'];

						$upquery = "UPDATE appointment SET 

						aptstatus='".mysql_real_escape_string($upappt)."',
						groomer='".mysql_real_escape_string($upgmr)."' 

						WHERE id='".mysql_real_escape_string($apid)."'"; 
						$resultpat =  mysql_query($upquery) or die(mysql_error());

						printf("<script> alert('Your appointment has been updated.'); window.location ='adupappt.php?id=$custid' </script>");

						
					}
			 	?>


				<div class="row mb-3">
				    <label for="oname" class="col-sm-2 col-form-label"><b>Owner</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(ucwords($cnamedb)); ?> <?php echo htmlentities(ucwords($cnamedb2)); ?>
				    </div>
			  	</div>

				<div class="row mb-3">
				    <label for="apdate" class="col-sm-2 col-form-label"><b>Date</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtoupper(date("d-m-Y", strtotime($appdate)))); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="aptime" class="col-sm-2 col-form-label"><b>Time</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtolower($tnamedb)); ?>
				    </div> 
			  	</div>

			  	<div class="row mb-3">
				    <label for="appackage" class="col-sm-2 col-form-label"><b>Package</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(ucfirst($pnamedb)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="ctname" class="col-sm-2 col-form-label"><b>Cat Name</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtoupper($appcname)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="ctsex" class="col-sm-2 col-form-label"><b>Cat Sex</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtolower($snamedb)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="ctcoat" class="col-sm-2 col-form-label"><b>Cat Coat</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtolower($ccnamedb)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="ctage" class="col-sm-2 col-form-label"><b>Cat Age</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(strtolower($anamedb)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="apst" name=apst id="apst" class="col-sm-2 col-form-label"><b>Appointment Status</b></label>
				    <div class="col-sm-10">
				      <?php 

				      	$ssquery2 = "SELECT * FROM aptstatus";
						$ssresult2 = mysql_query($ssquery2) or die(mysql_error());

                        echo "<select name=apst id=apst class=form-control>";
                        echo "<option value=$id>$ssnamedb</option>";

                        while($data_status = mysql_fetch_assoc($ssresult2))
                        {
                            echo "<option value= $data_status[id]>$data_status[aptstname]</option>"; 
                        }
                        echo "</select>";

				      ?>
				    </div>
			  	</div>
			  	
			  	<div class="row mb-3">
		          <label for="groomer" name="groomer" id="groomer" class="col-sm-2 col-form-label"><b>Pet Groomer</b></label>
		          <div class="col-sm-10">
		          	<textarea type="text" class="form-control" name="groomer" id="groomer"><?php echo htmlentities(ucwords($apgmr)); ?></textarea>
		          </div>
				
				</div>
			</div>
			
		
		<br><br><br>

			
		<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
        
		</form>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
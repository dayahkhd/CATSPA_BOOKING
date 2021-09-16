<?php
	require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Booking Form</title>
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
          <li><a href="appt.php">Appointment</a></li>
          <li><a href="updform.php">Update Appointment</a></li>
        </ol>
        <h2>Update Appointment</h2>

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

					$appid = $data['id_cust'];
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
					

				?>

				<div class="row mb-3">
				    <label for="oname" class="col-sm-2 col-form-label"><b>Owner</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(ucwords($cnamedb)); ?>
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
				    <label for="ctage" class="col-sm-2 col-form-label"><b>Appointment Status</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(ucfirst($ssnamedb)); ?>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="ctage" class="col-sm-2 col-form-label"><b>Pet Groomer</b></label>
				    <div class="col-sm-10">
				      <?php echo htmlentities(ucwords($apgmr)); ?>
				    </div>
			  	</div>
			  	
				
			</div>
			
		
		<br><br><br>

		<a href="bookingsummary.php?id=<?php echo $custid; ?>"><input type="" class="btn btn-primary" name="print" value="Print">
		<!-- <input type="submit" name="summary" id="summary" class="btn btn-primary" value="Print" href="bookingsummary.php?id=<?php //echo $custid; ?>">  -->
        
		</form>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
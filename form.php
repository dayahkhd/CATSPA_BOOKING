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
          <li><a href="form.php">Booking Form</a></li>
        </ol>
        <h2>Booking Form</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<form method="post" action="form.php">
			<div class="row g-3">
				<?php

				$pkgid2 = (isset($_GET['id']) ? $_GET['id'] : '');

				$queryp = "SELECT * FROM package WHERE id='$pkgid2'";
				$resultp = mysql_query($queryp) or die(mysql_error());
				$datap = mysql_fetch_array($resultp);

				$pname = $datap['pname'];
				$pdesc = $datap['pdesc'];
				$pprice = $datap['pprice'];

					$querya = "SELECT * FROM customer WHERE email='" .$_SESSION['email']."'";
					$resulta = mysql_query($querya) or die(mysql_error());
          			$dataa = mysql_fetch_array($resulta);

          			$idcust = $dataa['id'];

					if (isset($_POST['submit'])=="Book Now") {
						$apdate = $_POST['gdate'];
						$aptime = $_POST['gtime'];
						$pkgid2 = $_POST['ppkg'];
						$apcname = $_POST['cname'];
						$apcsex = $_POST['csex'];
						$apccoat = $_POST['ccoat'];
						$apcage = $_POST['cage'];

						$query = "INSERT into appointment(id_cust, adate, atime, apackage, cname, csex, ccoat, cage, aptstatus, groomer)

						VALUES(
						'$idcust',
						'".mysql_real_escape_string($apdate)."',
						'".mysql_real_escape_string($aptime)."',
						'".mysql_real_escape_string($pkgid2)."',
						'".mysql_real_escape_string($apcname)."',
						'".mysql_real_escape_string($apcsex)."',
						'".mysql_real_escape_string($apccoat)."',
						'".mysql_real_escape_string($apcage)."',
						1, 'unavailable'
						)";

						$resultpat = mysql_query($query) or die (mysql_error());
						$idpat     =mysql_insert_id();

						printf("<script> alert('Your request have been sent. Please wait for the respond. Thank you!'); window.location='appt.php'</script>");

					}

				?>

				<div class="row">
					<div class="col">
						<label for="pck" class="col-sm-2 col-form-label"><b>Package</b></label>
							<div class="col-sm-10">

								<?php echo htmlentities(ucfirst($pname)); ?>
								
							</div>
					</div>

					<div class="col">
						<label for="dsc" class="col-sm-2 col-form-label"><b>Service</b></label>
						<div class="col-sm-10">
							
							<?php echo htmlentities(ucfirst($pdesc)); ?>
							
						</div>
					</div>

					<div class="col">
						<label for="prc" class="col-sm-2 col-form-label"><b>Price</b></label>
						<div class="col-sm-10">
							
							<?php echo htmlentities(ucfirst($pprice)); ?>
							
						</div>
					</div>
				</div>

				<div class="col">
						<input type="hidden" name="ppkg" value="<?php echo $pkgid2?>">
				</div>


				<hr>

				
				<div class="col-md-6">
					<label for="gdate" class="col-sm-2 col-form-label">Date</label>
					<div class="col-sm-10">
						<input type="Date" name="gdate" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<label for="gtime" class="col-sm-2 col-form-label">Time</label>
					<div class="col-sm-10">
						<?php 
							$query = "SELECT * from gtime order by id ASC";
							$result = mysql_query($query) or die(mysql_error());

							echo "<select name=gtime id=gtime class=form-select>";
							echo "<option>--SELECT ONE--</option>";

							while ($data = mysql_fetch_array($result)) {
								echo "<option value=$data[id] >$data[tname]</option>";
							}

							echo "</select>";

						?>
					</div>
				</div>
			</div>
				
			
			<div class="row">
				<div class="col-12">
					<label for="cname" class="col-sm-2 col-form-label">Cat Name</label>
					<div class="col-sm-10">
						<input type="text" name="cname" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
				    <label for="csex" class="form-label">Sex</label>
				    <div class="col-sm-10">
				    	<?php 
							$query = "SELECT * from sex order by id ASC";
							$result = mysql_query($query) or die(mysql_error());

							echo "<select name=csex id=csex class=form-select>";
							echo "<option>--SELECT ONE--</option>";

							while ($data = mysql_fetch_array($result)) {
								echo "<option value=$data[id] >$data[sname]</option>";
							}

							echo "</select>";

						?>
				    </div>
				</div>
				<div class="col-md-4">
				    <label for="ccoat" class="form-label">Coat</label>
				    <div class="col-sm-10">
				    	<?php 
							$query = "SELECT * from coat order by id ASC";
							$result = mysql_query($query) or die(mysql_error());

							echo "<select name=ccoat id=ccoat class=form-select>";
							echo "<option>--SELECT ONE--</option>";

							while ($data = mysql_fetch_array($result)) {
								echo "<option value=$data[id] >$data[ccname]</option>";
							}

							echo "</select>";

						?>
				    </div>
				</div>
				<div class="col-md-4">
				    <label for="cage" class="form-label">Age</label>
				    <div class="col-sm-10">
				    	<?php 
							$query = "SELECT * from age order by id ASC";
							$result = mysql_query($query) or die(mysql_error());

							echo "<select name=cage id=cage class=form-select>";
							echo "<option>--SELECT ONE--</option>";

							while ($data = mysql_fetch_array($result)) {
								echo "<option value=$data[id] >$data[caname]</option>";
							}

							echo "</select>";

						?>
				    </div>
				</div>
			</div>

			<br><br><br>
			
			<input type="submit" name="submit" class="btn btn-primary" id="submit" value="Book Now">
        
		</form>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
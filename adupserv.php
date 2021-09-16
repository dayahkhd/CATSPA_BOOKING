<?php
	include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Grooming Package</title>
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
        <h2>Grooming Package Update</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<form method="post">

			<div class="row">
				<?php

					$servid = $_GET['id'];

					$query = "SELECT * FROM package WHERE id='$servid'";
					$result = mysql_query($query) or die(mysql_error());
					$data = mysql_fetch_array($result);

					$sspid = $data['id']; //id for package
					$ssname = $data['pname'];
					$ssdesc = $data['pdesc'];
					$ssprice = $data['pprice'];
					
				?>

				<?php

					if (isset($_POST['submit'])=="Update") {

						$ssname2 = $_POST['pkgname'];
						$ssdesc2 = $_POST['pkgdesc'];
						$ssprice2 = $_POST['pkgprice'];

						$upquery = "UPDATE package SET 

						pname ='".mysql_real_escape_string($ssname2)."',
						pdesc ='".mysql_real_escape_string($ssdesc2)."' ,
						pprice ='".mysql_real_escape_string($ssprice2)."' 

						WHERE id='".mysql_real_escape_string($sspid)."'"; 
						$resultpat =  mysql_query($upquery) or die(mysql_error());

						printf("<script> alert('Your grooming package has been updated.'); window.location ='adservices.php?id=$servid' </script>");

						
					}
			 	?>


				<div class="row mb-3">
				    <label for="pkgname" class="col-sm-2 col-form-label"><b>Package</b></label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="pkgname" id="pkgname"><?php echo htmlentities(ucfirst($ssname)) ;?></textarea>
				    </div>
			  	</div>

				<div class="row mb-3">
				    <label for="pkgdesc" class="col-sm-2 col-form-label"><b>Description</b></label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="pkgdesc" id="pkgdesc"><?php echo htmlentities(ucfirst($ssdesc)) ;?></textarea>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="pkgprice" class="col-sm-2 col-form-label"><b>Price</b></label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="pkgprice" id="pkgprice"><?php echo htmlentities(strtoupper($ssprice)) ;?></textarea>
				    </div> 
			  	</div>
			  	
			  </div>

			  <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
				
			</div>
			
		
		<br><br><br>
        
		</form>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
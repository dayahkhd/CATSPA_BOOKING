<?php
	require('config.php');
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
          <li><a href="#.php"></a></li>
        </ol>
        <h2>Add New Grooming Package</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<form method="post" action="adnewserv.php">

			<div class="row">
				<?php

				if (isset($_POST['submit'])=="Submit") {
					$ppname = $_POST['pkname'];
					$ppdesc = $_POST['pkdesc'];
					$ppprice = $_POST['pkprice'];
					

					$query = "INSERT into package(pname, pdesc, pprice, pstatus)

					VALUES(
					'".mysql_real_escape_string($ppname)."',
					'".mysql_real_escape_string($ppdesc)."',
					'RM ".mysql_real_escape_string($ppprice)."',
					1
					)";

					$resultpat = mysql_query($query) or die (mysql_error());
                    $idpat     = mysql_insert_id();

                    printf("<script> alert('New grooming package is successfully added.'); window.location='adservices.php'</script>");

				}
					
				?>

				<div class="row mb-3">
				    <label for="pkname" class="col-sm-2 col-form-label">Package Title</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="pkname" id="pkname">
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="pkdesc" class="col-sm-2 col-form-label">Description</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="pkdesc" id="pkdesc"></textarea> 
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="pkprice" class="col-sm-2 col-form-label">Price</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="pkprice" id="pkprice">
				    </div>
			  	</div>
				  	
				
			</div>
			
		
		<br><br><br>

			
		<input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit">
        
		</form>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
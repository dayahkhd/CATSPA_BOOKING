<?php
	require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Grooming Services</title>
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
          <li><a href="addashboard.php">Home</a></li>
        </ol>
        <h2>Home</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<!-- create cards here -->
      	<div class="container-fluid container-fullw bg-white">
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-white no-radius text-center">
						<div class="panel-body">
							<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
							<h2 class="StepTitle">Appointment</h2>
							
							<p class="links cl-effect-1">
								<a href="adappt.php">
									Manage Appointment
								</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel panel-white no-radius text-center">
						<div class="panel-body">
							<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
							<h2 class="StepTitle">Package</h2>
							
							<p class="links cl-effect-1">
								<a href="adservices.php">
									Manage Package
								</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel panel-white no-radius text-center">
						<div class="panel-body">
							<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
							<h2 class="StepTitle">Customer</h2>
							
							<p class="links cl-effect-1">
								<a href="aduser.php">
									Manage Customer
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

      	

      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
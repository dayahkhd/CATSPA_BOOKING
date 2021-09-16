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
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Grooming Services</a></li>
        </ol>
        <h2>Grooming Services</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

      	<?php

      		$query = "SELECT pname, pdesc, pprice FROM package";
      		$result = mysql_query($query);


      		if (mysql_num_rows($result)< 1) {
      			?>
            		<tr><td colspan="5" align="center"> No slot is available at the moment. Sorry!</td></tr>
            	<?php
            }
          	else{
      			while ($row = mysql_fetch_assoc($result)) {

      			
      	?>
				<div class="card" style="width: 80rem;">
				  <div class="card-body">
				    <a class="card-title" href="login.php" style="font-size: 30px;">
				    	<!-- if user no logged in, <a>->login but if user logged in, <a>->form -->
				    	<?php
				    	
				    		echo " ".$row["pname"]."<br>";
				    	?>
				    </a>
				    <!-- <h6 class="card-subtitle mb-2 text-muted">
				    	<?php
				    		// echo " ".$row["pprice"]."<br>";
				    	?>
				    </h6>  --> 
				    <p>
				    	<?php
				    		echo " ".$row["pdesc"]."<br>";
				    	?>
				    </p>
				  </div>
				</div>

				<br>

		<?php  
					
				}
  			}
		?>
      </div>
    </section>

  </main><!-- End #main -->

	
 	<?php include 'footer.php';?>


</body>
</html>
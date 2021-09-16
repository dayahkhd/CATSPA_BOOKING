<?php
	include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Customer Profile</title>
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
        <h2>Customer Profile Update</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
		<form method="post">

			<div class="row">
				<?php

					$custid = $_GET['id'];

					$query = "SELECT * FROM customer WHERE id='$custid'";
					$result = mysql_query($query) or die(mysql_error());
					$data = mysql_fetch_array($result);

					$cid = $data['id']; //id for customer
					$cname = $data['fname'];
					$clname = $data['lname'];
					$cemail = $data['email'];
					$cnum = $data['pnum'];
					$caddr = $data['addr'];
					
				?>

				<?php

					if (isset($_POST['submit'])=="Update") {

						$cname2 = $_POST['firname'];
						$clname2 = $_POST['laname'];
						$cemail2 = $_POST['custemail'];
						$cnum2 = $_POST['custphnum'];
						$caddr2 = $_POST['custaddr'];

						$upquery = "UPDATE customer SET 

						fname ='".mysql_real_escape_string($cname2)."',
						lname ='".mysql_real_escape_string($clname2)."' ,
						email ='".mysql_real_escape_string($cemail2)."' ,
						pnum ='".mysql_real_escape_string($cnum2)."' ,
						addr ='".mysql_real_escape_string($caddr2)."' 

						WHERE id='".mysql_real_escape_string($cid)."'"; 
						$resultpat =  mysql_query($upquery) or die(mysql_error());

						printf("<script> alert('The user profile has been updated.'); window.location ='aduser.php?id=$custid' </script>");

						
					}
			 	?>


				<div class="row mb-3">
				    <label for="firname" class="col-sm-2 col-form-label"><b>First Name</b></label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="firname" id="firname"><?php echo htmlentities(ucwords($cname)) ;?></textarea>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="laname" class="col-sm-2 col-form-label"><b>Last Name</b></label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="laname" id="laname"><?php echo htmlentities(ucwords($clname));?></textarea>
				    </div>
			  	</div>

				<div class="row mb-3">
				    <label for="custemail" class="col-sm-2 col-form-label"><b>Email</b></label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="custemail" id="custemail"><?php echo htmlentities(strtolower($cemail));?></textarea>
				    </div>
			  	</div>

			  	<div class="row mb-3">
				    <label for="custphnum" class="col-sm-2 col-form-label"><b>Phone Number</b></label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="custphnum" id="custphnum"><?php echo $cnum;?></textarea>
				    </div> 
			  	</div>

			  	<div class="row mb-3">
				    <label for="custaddr" class="col-sm-2 col-form-label"><b>Address</b></label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="custaddr" id="custaddr"><?php echo htmlentities(ucwords($caddr));?></textarea>
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
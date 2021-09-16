<?php

	require('config.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Contact Us</title>
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

        </ol>
        <h2>Contact Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

		<section class="inner-page">
      <div class="container">

        <div class="container-fluid">
          <form method="post" action="contactus.php">
            <div class="row">
              <?php 
                  if (isset($_POST['submit'])=="Send") {
                    $cname = $_POST['name'];
                    $cmail = $_POST['email'];
                    $cenquiry = $_POST['enquiry'];

                    $query = "INSERT into contact(coname, comail, coenquiry)

                    VALUES(
                    '".mysql_real_escape_string($cname)."',
                    '".mysql_real_escape_string($cmail)."',
                    '".mysql_real_escape_string($cenquiry)."'
                    )";

                    $resultpat = mysql_query($query) or die (mysql_error());
                    $idpat     = mysql_insert_id();

                    printf("<script> alert('Thank you for your enquiry.'); window.location='index.php'</script>");

                  }
                ?>

               <div id="map">
               	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.3341730576703!2d103.61125581474491!3d1.5628346612894688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da76a2ab69b515%3A0x976a270604f01940!2sMylovelycat%20Houz!5e0!3m2!1sen!2smy!4v1626764348332!5m2!1sen!2smy" width="1250" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>


              <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="col-md-12">
                <label for="enquiry" class="form-label">Enquiry</label>
                <textarea name="enquiry" class="form-control" rows="3"></textarea> 
              </div>


              <br><br><br><br><br><br><br><br>

              

              <div class="row">
                <div class="col-12" align="center">
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Send"> 
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
      </div>
    </section>

  </main><!-- End #main -->


	
 	<?php include 'footer.php';?>


</body>
</html>
<?php
  include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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
          <li><a href="profile.php">Profile</a></li>

        </ol>
        <h2>Profile</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
    <form method="post">

      <div class="row">
        <?php

          $query = "SELECT * FROM customer WHERE email='" .$_SESSION['email']."'";
          $result = mysql_query($query) or die(mysql_error());
          $data = mysql_fetch_array($result);

          $cid = $data['id'];
          $cfname = $data['fname'];
          $clname = $data['lname'];
          $cemail = $data['email'];
          $cpnum = $data['pnum'];
          $caddr = $data['addr'];          
          
        ?>

        <?php

          if (isset($_POST['submit'])=="Update") {

            $upcfname = $_POST['firname'];
            $upclname = $_POST['laname'];
            $upcemail = $_POST['cemail'];
            $upcpnum = $_POST['cphnumber'];
            $upcaddr = $_POST['caddress'];          
          

            $upquery = "UPDATE customer SET 

            fname='".mysql_real_escape_string($upcfname)."', 
            lname='".mysql_real_escape_string($upclname)."',
            email='".mysql_real_escape_string($upcemail)."',
            pnum='".mysql_real_escape_string($upcpnum)."',
            addr='".mysql_real_escape_string($upcaddr)."'

            WHERE id='".mysql_real_escape_string($cid)."'"; 
            $resultpat =  mysql_query($upquery) or die(mysql_error());

            printf("<script> alert('Your profile has been updated.'); window.location ='profile.php?id=$cid' </script>");

            
          }
        ?>


        <div class="col-md-6">
          <label for="firname" name="firname" id="firname" class="form-label"><b>First Name</b></label>
          <textarea type="text" class="form-control" name="firname" id="firname"><?php echo htmlentities(ucwords($cfname)); ?></textarea>
          </div>

        <div class="col-md-6">
          <label for="laname" name="laname" id="laname" class="form-label"><b>Last Name</b></label>
          <textarea type="text" class="form-control" name="laname" id="laname"><?php echo htmlentities(ucwords($clname)); ?></textarea>
          </div>

          <div class="col-md-6">
            <label for="cemail" name="cemail" id="cemail" class="form-label"><b>Email</b></label>
          <textarea type="email" class="form-control" name="cemail" id="cemail"><?php echo htmlentities($cemail); ?></textarea>
          </div>

          <div class="col-md-6">
            <label for="cphnumber" name="cphnumber" id="cphnumber" class="form-label"><b>Phone Number</b></label>
          <textarea type="text" class="form-control" name="cphnumber" id="cphnumber"><?php echo htmlentities($cpnum); ?></textarea>
          </div>

          <div class="col-12">
             <label for="caddress" name="caddress" id="caddress" class="form-label"><b>Address</b></label>
          <textarea type="text" class="form-control" name="caddress" id="caddress" rows="5"><?php echo htmlentities(ucwords($caddr)); ?></textarea>
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
<?php
  require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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
          <li><a href="admlogin.php">Administrator Login</a></li>
        </ol>
        <h2>Administrator Login</h2>

      </div>
    </section><!-- End Breadcrumbs -->

     <section class="inner-page">
        <div class="container">
          <form method="post" action="admlogin_check.php">
            <div class="row">
            <div class="col">
              <input type="email" class="form-control" placeholder="Email" name="email" id="email">
            </div>
            <div class="col">
              <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            </div>
          </div>
          <div class="row">
            &nbsp;
              <div class="col-12" align="center">
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Login">
                </div>
              </div>
          </div>

          <br><br><br><br>

          
          </form>
          
          
        </div>
      </section>

  </main><!-- End #main -->

  
  <?php include 'footer.php';?>

</body>
</html>

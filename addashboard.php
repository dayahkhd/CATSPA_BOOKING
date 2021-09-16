<?php
	require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Dashboard</title>
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

	  <style type="text/css">
	    html,
	    body,
	    #chart {
	      width: 100%;
	      height: 100%;
	      margin: 0;
	      padding: 0;
	    }
	  </style>

	  

</head>
<body>

	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="addashboard.php">Mylovelycat Houz</a>
	  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
	  <div class="navbar-nav">
	    <div class="nav-item text-nowrap">
	      <a class="nav-link px-3" href="logout.php">Log out</a>
	    </div>
	  </div>
	</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          
          <li class="nav-item">
            <a class="nav-link" href="adappt.php">
              <!-- <span data-feather="file"></span> -->
              Appointment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adservices.php">
              <!-- <span data-feather="shopping-cart"></span> -->
              Grooming package
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aduser.php">
              <!-- <span data-feather="users"></span> -->
              Customer
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <!-- <span data-feather="bar-chart-2"></span> -->
              Report
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">Dashboard</h1> -->
      </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> 


    </main>
  </div>
</div>



</body>
</html>
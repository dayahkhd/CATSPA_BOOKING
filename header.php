<!-- ======= Header =======  -->

<?php

  session_start();

?>

  <header id="header" class="header fixed-top" style="background-color: white;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Mylovelycat Houz</span>
      </a>

      

          <?php
            if (isset($_SESSION["login"])=="OK") {
              if ($_SESSION["status"]=="1") { //admin
                      
          ?>
          <nav id="navbar" class="navbar">
          <ul>

          <!-- 1-admin -->
          <!-- <li><a class="nav-link scrollto active" href="addashboard.php">Home</a></li> -->
          <li><a class="nav-link scrollto" href="adappt.php">Appointment</a></li>
          <li><a class="nav-link scrollto" href="adservices.php">Package</a></li>  
          <li><a class="nav-link scrollto" href="aduser.php">Customer</a></li>
          <li><a class="nav-link scrollto" href="report.php">Report</a></li>

          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>

          <?php
            } else if ($_SESSION["status"]=="2") { //customer
          ?>
          <nav id="navbar" class="navbar">
          <ul>

          <!-- 2-customer -->
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="appt.php">Appointment</a></li>
          <li><a class="nav-link scrollto" href="services_cust.php">Groom</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>

          <?php
            }
          } else {
          ?>
          <nav id="navbar" class="navbar">
          <ul>

          <!-- <li><a class="nav-link scrollto active" href="index.php">Home</a></li> -->
          <li><a class="nav-link scrollto" href="services.php">Groom</a></li>
          <li><a class="nav-link scrollto" href="contactus.php">Contact Us</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

          <?php
            }

          ?>

    </div>
  </header><!-- End Header
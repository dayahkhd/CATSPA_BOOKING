<?php
  require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign-Up</title>
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
          <li><a href="register.php">Sign-Up</a></li>
        </ol>
        <h2>Sign-Up</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

        <div class="container-fluid">
          <form method="post" action="register.php">
            <div class="row">
              <?php 
                  if (isset($_POST['submit'])=="Sign-Up") {
                    $cfname = $_POST['fname'];
                    $clname = $_POST['lname'];
                    $caddr = $_POST['addr'];
                    $cpnum = $_POST['pnum'];
                    $cemail = $_POST['email'];
                    $cpword = $_POST['pword'];

                    $query = "INSERT into customer(fname, lname, addr, pnum, email, pword, status)

                    VALUES(
                    '".mysql_real_escape_string($cfname)."',
                    '".mysql_real_escape_string($clname)."',
                    '".mysql_real_escape_string($caddr)."',
                    '".mysql_real_escape_string($cpnum)."',
                    '".mysql_real_escape_string($cemail)."',
                    '".mysql_real_escape_string($cpword)."',
                    2
                    )";

                    $resultpat = mysql_query($query) or die (mysql_error());
                    $idpat     = mysql_insert_id();

                    printf("<script> alert('You have successfully registered!'); window.location='login.php'</script>");

                  }
                ?>

              <h3>Customer Information</h3>
              <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" required>
              </div>
              <div class="col-md-12">
                <label for="addr" class="form-label">Address</label>
                <textarea name="addr" class="form-control" rows="3"></textarea> 
              </div>
              <div class="col-md-6">
                <label for="pnum" class="form-label">Phone Number</label>
                <input type="text" name="pnum" class="form-control" required>
              </div>

              <br><br><br><br>

              <hr>

              <h3>Account Information</h3>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
              </div>
              <div class="col-md-6"> 
                <label for="pword" class="form-label">Password</label>
                <input type="password" name="pword" id="pword" class="form-control" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain 8 or more characters at least one number and lowercase letter"required><!-- password validation -->
              </div>

              <br><br><br><br> 

              <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>

              <div class="row">
                <div class="col-12" align="center">
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" id="signup" value="Sign-Up"> <!-- click twice to submit -->
                  </div>
                </div>
                  
                
             

              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script>
      var myInput = document.getElementById("pword");
      var letter = document.getElementById("letter");
      var number = document.getElementById("number");
      var length = document.getElementById("length");

      // When the user clicks on the password field, show the message box
      myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
      }

      // When the user starts to type something inside the password field
      myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
    </script>

  </main><!-- End #main -->

  
  <?php include 'footer.php';?>


</body>
</html>
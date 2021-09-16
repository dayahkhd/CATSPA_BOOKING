<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Appointment Report</title>
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
          <li><a href="report.php">Report</a></li>
        </ol>
        <h2> Appointment Report</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="row">

          <form action="process.php" method="post">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" name="submit" class="btn btn-outline-primary ">Download</button>
            </div>
            <br><br>
          </form>

        <div class="row">
          <div class="col-lg-12">
            <div class="table table-primary">
              <div class="table-body">
                <div class="dataTable_wrapper">
                  <table class="table table-striped table-bordered table-hover" id="dataTable-2">
                    <thead>
                      <tr class="primary" align="center">
                        <th>No</th>
                        <th>Owner</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Cat</th>
                        <th>Date</th>
                        <th>Time</th>         
                        <th>Package</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php

                        $query2 = "SELECT * FROM appointment"; //call by id 
                        $result = mysql_query($query2) or die(mysql_error());
                        $data = mysql_num_rows($result);

                        $apcid = $data['id_cust'];
                        $apcat = $data['cname'];
                        $apdate = $data['adate'];
                        $aptime = $data['atime'];
                        $appkg = $data['apackage'];
                        $apstatus = $data['apstatus'];

                        if($data < 1){
                              ?>
                              <tr><td colspan="5" align="center"> No appointment has been made. </td></tr>
                              <?php
                        }
                        else{
                          $sn =1;
                          while ($data2 = mysql_fetch_array($result)) {
                            $apid = $data2['id'];
                            $apcid = $data2['id_cust'];
                            $apcat = $data2['cname'];
                            $apdate = $data2['adate'];
                            $aptime = $data2['atime'];
                            $appkg = $data2['apackage'];
                            $apstatus = $data2['aptstatus'];

                            $queryc = "SELECT * FROM customer WHERE id='$apcid' ";
                            $resultc = mysql_query($queryc) or die(mysql_error());
                            $datac = mysql_fetch_array($resultc);

                            $cdet1 = $datac['fname'];
                            $cdet2 = $datac['pnum'];
                            $cdet3 = $datac['addr'];

                            $querytime = "SELECT * FROM gtime WHERE id='$aptime'";
                            $resulttime = mysql_query($querytime) or die(mysql_error());
                            $datatime = mysql_fetch_array($resulttime);

                            $aptime2 = $datatime['tname'];

                            $querypkg = "SELECT * FROM package WHERE id='$appkg'";
                            $resultpkg = mysql_query($querypkg) or die(mysql_error());
                            $datapkg = mysql_fetch_array($resultpkg);

                            $cpkg = $datapkg['pname'];

                            $queryst = "SELECT * FROM aptstatus WHERE id='$apstatus'";
                            $resultst = mysql_query($queryst) or die(mysql_error());
                            $datast = mysql_fetch_array($resultst);

                            $cst = $datast['aptstname'];



                      ?>

                      <tr class="odd gradeX">
                        <td align="center"><?php echo $sn?><input type="hidden" name="apid" value="<?php echo $apid?>"></td>
                        <td><?php echo htmlentities(ucwords($cdet1));?></td>
                        <td><?php echo htmlentities(strtoupper($cdet2));?></td>
                        <td><?php echo htmlentities(ucwords($cdet3));?></td>
                        <td><?php echo htmlentities(ucwords($apcat));?></td>
                        <td><?php echo htmlentities(strtoupper(date("d-m-Y", strtotime($apdate))));?></td>
                        <td><?php echo htmlentities(strtolower($aptime2));?></td>
                        <td><?php echo htmlentities(ucfirst($cpkg));?></td>
                        <td><?php echo htmlentities(strtoupper($cst));?></td>

                      </tr>

                      <?php

                            $sn++;
                          }
                        }
                        
                      ?>

                    </tbody>
                  </table>
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
<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Appointment List</title>

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

  <?php include 'header.php' ;?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="addashboard.php">Home</a></li>
          <li><a href="#"></a></li>
        </ol>
        <h2>Book Appointment List</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
      
        <div class="row">
          <div class="col-lg-12">
            <div class="table table-primary">
              <div class="table-body">
                <div class="dataTable_wrapper">
                  <table class="table table-striped table-bordered table-hover" id="dataTable-2">
                    <thead>
                      <tr class="primary" align="center">
                        <th>No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Cat Name</th>
                        
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php

                      $query = "SELECT * FROM appointment";
                      $result = mysql_query($query) or die(mysql_error());
                      $data = mysql_num_rows($result);

                      if ($data<1) {
                        ?>
                        <tr><td colspan="5" align="center"> You have no appointment yet.</td></tr>
                        <?php 
                      }

                      else{
                        $sn=1;
                        while ($data2=mysql_fetch_array($result)) {
                          $apid = $data2['id'];
                          $apdate = $data2['adate'];
                          $aptime = $data2['atime'];
                          $apcname = $data2['cname'];

                          $querytime = "SELECT * FROM gtime WHERE id='$aptime'";
                          $resulttime = mysql_query($querytime) or die(mysql_error());
                          $datatime = mysql_fetch_array($resulttime);

                          $aptime2 = $datatime['tname'];



                      ?>

                      <tr class="odd gradeX">
                        <td align="center"><?php echo $sn?><input type="hidden" name="apid" value="<?php echo $apid?>"></td>
                        <td><?php echo htmlentities(strtoupper($apdate)); ?></td>
                        <td><?php echo htmlentities(strtoupper($aptime2)); ?></td>
                        <td><?php echo htmlentities(strtoupper($apcname)); ?></td>
                       

                        <td align="center">
                          <p>
                            <a href="adupappt.php?id=<?php echo $apid;?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg></p>
                        </td>

                        <td align="center">
                          <p>
                            <a href="addelappt.php?id=<?php echo $apid;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg></p>
                        </td>

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

        
          <!-- <button onclick="window.location='adnewserv.php';" class="btn btn-primary">Add New</button> -->
        
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'footer.php'; ?>


</body>

</html>
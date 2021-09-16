<?php

include('config.php');

$query2 = "SELECT * FROM appointment"; 
$result2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_num_rows($result2);

$file="appointmentreport.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointment Report</title>
</head>
<body>
	 <div class="row">
          <div class="col-lg-12">
            <div class="table table-primary">
              <div class="table-head">
                <div class="table-head-text" align="center">Mylovelycat Houz Appointment Report</div>
              </div>
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
                        <td><?php echo htmlentities(strtoupper($cpkg));?></td>
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

</body>
</html>


      

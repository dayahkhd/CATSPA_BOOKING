<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      require('config.php');
      $output = '';  
      $query = "  
           SELECT * FROM appointment  
           WHERE adate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysql_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Customer ID</th>  
                     <th width="43%">Date</th>  
                     <th width="10%">Time</th>  
                     <th width="12%">Appointment Status</th>  
                </tr>  
      ';  
      if(mysql_num_rows($result) > 0)  
      {  
           while($row = mysql_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id"] .'</td>  
                          <td>'. $row["id_cust"] .'</td>  
                          <td>'. $row["adate"] .'</td>  
                          <td>'. $row["atime"] .'</td>  
                          <td>'. $row["aptstatus"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No appointment found.</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>

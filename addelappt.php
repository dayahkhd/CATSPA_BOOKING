<?php

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM appointment where id = '$id'";
mysql_query($query);

printf("<script>alert('You have cancel one of the  appointment.'); window.location='adappt.php'</script>");


?>



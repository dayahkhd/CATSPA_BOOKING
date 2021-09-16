<?php

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM appointment where id = '$id'";
mysql_query($query);

printf("<script>alert('You have cancelled your appointment.'); window.location='appt.php'</script>");


?>



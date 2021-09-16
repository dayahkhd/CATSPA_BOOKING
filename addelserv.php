<?php

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM package where id = '$id'";
mysql_query($query);

printf("<script>alert('You have delete one of the  grooming package.'); window.location='adservices.php'</script>");


?>



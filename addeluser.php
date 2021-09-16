<?php

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM customer where id = '$id'";
mysql_query($query);

printf("<script>alert('You have delete one of the user.'); window.location='aduser.php'</script>");


?>



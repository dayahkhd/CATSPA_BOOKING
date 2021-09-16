<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "catspa";

	$connection = mysql_connect($host, $username, $password, $database) or die ('Unable to connect');
	mysql_select_db($database) or ('Unable to select database');
?>
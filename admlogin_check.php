<?php

	include 'config.php';

	if (isset($_POST['submit'])) {

		$cemail = $_POST['email'];
		$cpword = $_POST['password'];

		$query = "SELECT * FROM admin WHERE aemail='$cemail' and apword='$cpword'";
		
		$result = mysql_query($query) or die(mysql_error());
		$data = mysql_fetch_array($result);

		$count= mysql_num_rows($result);

		if ($count==1) {
			session_start();

			$_SESSION["email"]=$cemail;
			$_SESSION["status"]=$data['status'];
			$_SESSION["login"] = "OK";

			header("location: admlogin_success.php");

		}
		else{
			echo "<center><strong>Your account is not registered. Please sign-up.</strong></center>";
			echo '<meta http-equiv="Refresh" content="3;url=index.php">';
		}
		
	}
	

	

?>
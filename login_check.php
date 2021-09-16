<?php

	include 'config.php';

	if (isset($_POST['submit'])) {

		$cemail = $_POST['email'];
		$cpword = $_POST['password'];

		$query = "SELECT * FROM customer WHERE email='$cemail' and pword='$cpword'";
		
		$result = mysql_query($query) or die(mysql_error());
		$data = mysql_fetch_array($result);

		$count= mysql_num_rows($result);

		if ($count==1) {
			session_start();

			$_SESSION["email"]=$cemail;
			$_SESSION["fname"]=$data['fname'];
			$_SESSION["lname"]=$data['lname'];
			$_SESSION["pnum"]=$data['pnum'];
			$_SESSION["addr"]=$data['addr'];
			$_SESSION["status"]=$data['status'];
			$_SESSION["login"] = "OK";

			header("location: login_success.php");

		}
		else{
			echo "<center><strong>Your account is not registered. Please sign-up.</strong></center>";
			echo '<meta http-equiv="Refresh" content="3;url=login.php">';
		}
		
	}
	

	

?>
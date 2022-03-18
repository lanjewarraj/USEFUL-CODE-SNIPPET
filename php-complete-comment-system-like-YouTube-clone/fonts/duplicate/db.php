<?php

$con = mysqli_connect("localhost:3308","root","","email_confirmations");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>

<?php
	
	$con = new mysqli( 'localhost', 'root', '', 'email_confirmations' );
	if (!$con) {
		# code...
		echo "Not connected to database".mysqli_error($con);
	}

	?>

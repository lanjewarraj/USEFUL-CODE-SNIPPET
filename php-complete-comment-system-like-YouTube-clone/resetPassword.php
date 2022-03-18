<?php
	$msg="";
	$conn = new mysqli('localhost', 'root', '', 'email_confirmations');
     if (!isset($_GET["code"])) {
	 
	 exit("Can't Find Page");
	 
	 }
	
    $code =	$_GET["code"];
	
	$getEmailQuery = mysqli_query($conn, "SELECT email FROM resetpasswords WHERE code='$code'");
	
	if(mysqli_num_rows($getEmailQuery) == 0) {
	
	}
	
	
	if (isset($_POST["password"])) {
	
	//check if new passwords matches
	$pw = $conn->real_escape_string ($_POST["password"]);
	$cpw =$conn->real_escape_string ($_POST["cpassword"]);
     if ($_POST['password']!= $_POST['cpassword'])
 {
      $msg="Oops! Password did not match! Try again.";
 }
	else {
	//		
	$pw = $_POST["password"];
	$pw = password_hash($pw, PASSWORD_BCRYPT);
	
	$row = mysqli_fetch_array($getEmailQuery);
	$email = $row["email"];
	
	$query = mysqli_query($conn, "UPDATE users SET password='$pw' WHERE email='$email'");
	//
	}
	
	if($query) {
	$query = mysqli_query($conn, "DELETE FROM resetPasswords WHERE code='$code'");
	exit("Passwords Updated!");
	}
	
	else {
	   exit ("Something went wrong!");
	}
	
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Vizew - Blog &amp; Magazine HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <?php include ("header.php");?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>We are here to help! </h4>
                            <div class="line"></div>
                        </div>
                      
					   <p style="margin-bottom:15px; color:#5cb85c;"><?php echo $msg; ?></p>
                        <form action="index.php" method="post">
                            <div class="form-group">
      <input class="form-control" name="password" type="password" placeholder="New password..."><br>
	  <input class="form-control" name="cpassword" type="password" placeholder="Confirm password..."><br>
                            </div>
                            
                            <div class="form-group">
                                
                            <button type="submit" name="submit" class="btn vizew-btn w-100 mt-20">Submit</button>
							</div>
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
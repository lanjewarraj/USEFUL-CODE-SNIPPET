<?php
		
	use PHPMailer\PHPMailer;
    //require_once "functions.php";
    $result="";
    if (isset($_POST['submit'])) {
       $conn = new mysqli('localhost', 'root', '', 'email_confirmation');
       $email = $conn->real_escape_string($_POST['email']);
	   
	   	//checking if email exits in the database for password reset
		$query = $conn->query("SELECT id FROM users WHERE email='$email'");
	     if(!$query->num_rows > 0){
		 exit('<p style="color:red;">Email address does not exist in the database!<br><br></p>
		  
		  <p><a href="https://www.bestquotesng.com/PHPEmailConfirmation/register.php"> CLick to Register</a></p>');
		
	    
	}
	
		$code = uniqid(true);
		$query = mysqli_query($conn, "INSERT INTO resetpasswords(code, email) VALUES ('$code', '$email')");
		if(!$query){
		
		exit("Erorr Occured");
		
		}
						
	
            require_once "PHPMailer/PHPMailer.php";
	        require_once "PHPMailer/Exception.php";

	        $mail = new PHPMailer\PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("support@bestquotesng.com", "BestQuotesNG");
	        $mail->Subject = "Reset Password";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi,<br><br>
	            
	            In order to reset your password, please click on the link below:<br>
				CLick<a href='https://bestquotesng.com/PHPEmailConfirmation/resetPassword.php?code=$code'> this link</a> to do so
	         
	            Kind Regards,<br>
	            Henry
	        ";

	        if ($mail->send())
    	        $result='Please Check Your Email Inbox!';
    	    else
    	        $result='<p style="color:red;">Something Wrong Just Happened! Please try again!</p>';
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
  
   
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Password Reset</li>
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
                      
					   <p style="margin-bottom:15px; color:#5cb85c;"><?php echo $result; ?></p>
                        <form action="" method="post">
                            <div class="form-group">
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your registered email address">
                            </div>
                            
                            <div class="form-group">
                                
                            <button type="submit" name="submit" class="btn vizew-btn w-100 mt-20">Reset Password</button>
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php include ("footer.php");?>
    <!-- ##### Footer Area End ##### -->

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
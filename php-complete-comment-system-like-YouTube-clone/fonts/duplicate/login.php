<?php
	include_once 'functions.php';
	//require("libs/fetch_data.php");
	//Start a session
	session_start();
	
	
	if (isset($_SESSION['email'])){
			
	   header ('location: login_dashboard/index.php');
	}
    $msg = '';
	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost:3308', 'root', '', 'email_confirmations');

		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		
			
		if ($email == "" || $password == "")
			$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email or password can not be empty!</div>";
		else {
			$sql = $con->query("SELECT id, password, isEmailConfirmed FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
                        $msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please verify your email inbox or spam folder!</div>";
                
                    else {
					// include session user here
			// $_SESSION['id'] = $id;
             $_SESSION['email'] = $email;	
			 	
				 date_default_timezone_set("Africa/Lagos");
                // getting the time query difference
                $sql1 = "SELECT TIMESTAMPDIFF(SECOND, date, NOW()) AS tdif FROM users WHERE email='$email'";  
                $result = $con->prepare($sql1);
                $result->execute();
				$result->store_result();
                $result->bind_result($tdif);
                $result->fetch();

                //var_dump($tdif);

                if ($tdif >= 86400) {  
          //following code suppose run once every 24hrs

        //update user's page rank
        $sql2 = "UPDATE users SET earning = earning + 10 WHERE email='$email'"; 
         $result2 = $con->query($sql2) or die("Unable to select and run query 1" .mysqli_error($con));

       //update last execution time
        $sql3 = "UPDATE users SET date = NOW() WHERE email='$email'";
       $result3 = $con->query($sql3) or die("Unable to select and run query 2".mysqli_error($con));
	   
       		 
		  //fetching earning value from database
	   $sql4 = $con->query("SELECT name, earning FROM users WHERE email='$email' limit 1");
	   
	   if($sql4->num_rows != 0){
	   //turn the result into an array
	   while($rows = $sql4->fetch_assoc())
	   {    
	        $name = $rows['name'];
	       $earning = $rows['earning'];
		  
		  // echo " My earning is: $earning";
		  }
		  
		  } 
		   
	  
	         /* $mail = new PHPMailer\PHPMailer();
                $mail->setFrom('support@bestquotesng.com', 'BestQuotesNG');
                $mail->addAddress($email, $name);
                $mail->Subject = "Update on Account earnings!";
                $mail->isHTML(true);
                $mail->Body = "
                   
				   Hi, $name<br>
                      
                       Your earnings has been updated with N10.<br>
					   You now have a total of N$earning in your account<br>
					   Always know that our daily login reward can increase or decrease.<br> <br>
					   
					    9jaEarn Cares.
				   ";
				
				 if ($mail->send())
                    $msg = " Money earned sent successfully!";
                else
                    $msg = "There was a problem sending mail!";
           */
	   
	   
	   
	   
	               }
	 
              
                    //login me in   
            redirectToIndexPage();
			
			
                  }
				  
				  }
           				
				else
	                $msg = '<div class="alert alert-danger alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please check your inputs!</div>';
			}
			
			 else {
				$msg = '<div class="alert alert-danger alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Wrong email or password, Please check your inputs!</div>';
			}
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
<style>
.pointer { cursor:pointer;
           
	    }

.pointer:hover {
color: #db4437;
text-decoration:underline;

}
</style>

<body>
   <?php 
   require("libs/fetch_data.php");
   include ("header.php"); ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
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
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>
                     
					   <p style="margin-bottom:7px;"> <?php echo $msg; ?></p>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                
                            <button type="submit" name="submit" class="btn vizew-btn w-100 mt-20">Login</button>
                        </form>
						 <a href="register.php" style="float:right; margin-top:17px;" class="pointer"> Not a member yet?</a></div>
						<div style="margin-top:10px;">
        <a href="requestReset.php" class="pointer"> Forgot Password?</a></div>
			
							</div>
							
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
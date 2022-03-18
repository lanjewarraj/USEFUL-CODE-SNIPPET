				

<?php
	
		$msg = "";
	

	if (isset($_POST['submit'])) {
		include("database/mydb.php");

	    $name = $con->real_escape_string($_POST['name']);
		$username = $con->real_escape_string($_POST['username']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);		
	    $refcode = $con->real_escape_string($_POST['refcode']);
		
		 
		$sql = $con->query("SELECT id FROM users WHERE username='$username'");
	
	
	if($sql->num_rows > 0){
	  $msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Username already exists in the database</div>";
	}

else {
    $sql1 = $con->query("SELECT * FROM users WHERE refcode = '$refcode' LIMIT 1");
	     if($sql1->num_rows !== 1 && $refcode !== ""){
	          
		     $msg = "<div class='alert alert-danger alert-dismissible'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		       Referal code you entered does not exist!</div>";
			  		}		
    	       				
elseif ($name == "" || $username == "" || $email == ""){
		
			$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please check your inputs, All fields are required, Refferal code is optional!</div>";

			}
	
	elseif(!preg_match("/^[a-zA-Z'. -]+$/", $name)){
			    
			    	   $msg = "<div class='alert alert-danger alert-dismissible fade show'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   Name should contain only letters and white spaces <strong>e.g John Doe</strong></div>";
			                            }
   
  	elseif ($password != $cPassword){
			$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your passwords does not match!</div>";
			

			}
			
	elseif(strlen($password) < 8){
			    
			    	$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Passwords must be atleast 8 characters!</div>";
			}
			
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			    
			    	$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Invalid Email Format!</div>";
			}	
	 
						
					
	else {  
	
			$sql = $con->query("SELECT id FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email already exists in the database!</div>";
            		
			} 
			
	 
		        
		else {     
		
		          //userrefcode generated
		          $length = 8;
                  $code   = strtoupper(substr(md5(time()), 0, $length));
				  $finalcode = '?'.$code;
				  $userrefcode = $email.$finalcode;
                 //userrefcode generated ended here  
		
					$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);  

				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

		    $con->query("INSERT INTO users (name, username, email, password, isEmailConfirmed, token, refcode, date)
					VALUES ('$name', '$username', '$email', '$hashedPassword', '0', '$token', '$userrefcode', NOW())");
         
		    include('mailer.php'); 
			}
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
    <link rel="stylesheet" href="styles.css">

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
  <?php //require("libs/fetch_data.php");?>
  <?php include ("header.php"); ?>
  
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading style-2 mb-4">
                        <h4>Registration Form</h4>
                        <div class="line"></div>
                    </div>

                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                                <!-- Contact Form Area -->
                    <div class="contact-form-area mt-10">
					<?php if ($msg != "") echo $msg . "<br>" ?>
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="name">Name*</label>
                      <input type="text" name="name" value="<?php if(isset($_POST['name'])){echo htmlentities ($_POST['name']);}?>" 
			          class="form-control" placeholder="Enter your full name..">
                            </div>
                            <div class="form-group">
                                <label for="username">Username*</label>
                      <input type="username" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities ($_POST['username']);}?>" class="form-control" placeholder="Enter your username..">
                            </div>
							<div class="form-group">
                                <label for="email">Email*</label>
                    <input name="email" value="<?php if(isset($_POST['email'])){echo htmlentities ($_POST['email']);}?>" 
					class="form-control" id="email" placeholder="Enter your email address..">
						
                            </div>
							
						    <div class="form-group">
							<label for="refcode">Refferal Code </label>
							 <input name="refcode" value="<?php if(isset($_POST['refcode'])){echo htmlentities ($_POST['refcode']);}?>" 
							 class="form-control" placeholder="Refferal code if any..."> 
							</div>
							
							<div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password..">
                            </div>
							<div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" name="cPassword" class="form-control" placeholder="Comfirm password..">
                            </div>
                           <input class="btn vizew-btn mt-20" type="submit" name="submit" value="Register">
                         
							 <a href="login.php" style="margin-top:20px; float:right;" class="pointer"> Already a member?</a>
                        </form>
						
						
                    </div>
				
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget newsletter-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Newsletter</h4>
                                <div class="line"></div>
                            </div>
                            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                            <!-- Newsletter Form -->
                            <div class="newsletter-form">
                                <form action="#" method="post">
                                    <input type="email" name="nl-email" class="form-control mb-15" id="emailnl" placeholder="Enter your email">
                                    <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget add-widget">
                            <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
<?php
	//Start a session
	session_start();
	require ("functions.php");
	require("libs/fetch_data.php");
	use PHPMailer\PHPMailer;
	
	           if (isset($_SESSION['email'])){
			   $email = $_SESSION['email'];
			   
			    $con = new mysqli('localhost:3308', 'root', '', 'email_confirmations');
	            date_default_timezone_set("Africa/Lagos");
                // getting the time query difference
                $sql1 = "SELECT TIMESTAMPDIFF(SECOND, date, NOW()) AS tdif FROM users WHERE email='$email'";  
                $result = $con->prepare($sql1);
                $result->execute();
				$result->store_result();
                $result->bind_result($tdif);
                $result->fetch();
				
			 if ($tdif >= 86400) {  
          //following code suppose run once every 180seconds

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

	}
?>
  <!-- Newsletter Form -->
							<?php
					     		$msg = '';
								include ("database/mydb.php");
								if(isset($_POST['submit'])){
								
								$name = $con->real_escape_string($_POST['name']);
								$email = $con->real_escape_string($_POST['email']);
								
								$sql = "SELECT * FROM newsletter WHERE email = '$email'";
								$result = $con->query($sql);
								if($result-> num_rows > 0){
								      $msg = "<div class='alert alert-danger alert-dismissible fade show'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$name." You have already subscribed our newsletter</div>";
								}
								
								elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			    
			    	   $msg = "<div class='alert alert-danger alert-dismissible fade show'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$name." you entered an invalid Email format</div>";
			                            }	
					
								
								else {
								
								$sql = "INSERT INTO newsletter (name, email) VALUES ('$name', '$email')";
								$result = $con->query($sql);
								if(!$result){
								      
									  $msg = "<div class='alert alert-danger alert-dismissible fade show'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$name." there was a problem on your subcription request</div>" .mysqli_error($con);
								}
								   else{
								       $msg = "<div class='alert alert-success alert-dismissible fade show'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$name." you have been successfully added</div>";
								   }
								}
								}
								
								
								?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta charset="UTF-8" name="description" content="<?php getshortdescription("titles");?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="<?php getkeywords("titles");?>" />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php getwebname("titles"); echo" | "; gettagline("titles");?></title>

    <!-- Favicon for shortlink icon -->
    <link rel="icon" href="img/core-img/favicon.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
.opacityhover:hover{
opacity:0.7;
cursor:pointer;
}
.opacityrelated:hover{
opacity:0.7;
cursor:pointer;
}
.bottomright {
  position: inherit;
  bottom: 8px;
  right: 0px;
  border-radius:3px;
  background-color: #000000;
  color:#FFFFFF;
  padding:3px;
  font-size:10px;
  text-align:center;
  
  }
  .sidepost {
  position: inherit;
  bottom: 8px;
  right: 0px;
  border-radius:3px;
  background-color: #000000;
  color:#FFFFFF;
  padding:3px;
  font-size:10px;
  text-align:center;
  
  }
.pagination1 {margin-bottom:20px;}
.pagination1 li{display:inline-block; margin:0 1px;}
.pagination1 li a{display:inline-block; text-decoration:none; padding:5px 7px; border-radius:3px; border:1px solid #666666;}
.pagination1 li a:hover{ text-decoration:none; background-color: #FFFFFF; color:red;}
.pagination1 li a.active1{font-weight:bold; color:#FFFFFF; background: #000000;}
</style>
<body>
    <?php include ("header.php"); ?>
	
    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content">
					
					<!----------started here---------------->
                        <?php getHeroFirst(); ?>
						
                       <?php getHeroSecond(); ?>
					   
					<?php getHeroThird();?>
                      
					    <?php getHeroFourth(); ?>
					   <?php getHeroFifth(); ?>
					    
					  <?php getHeroSixth();?>
					   
					  <?php getHeroSeventh(); ?>
				   
				    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav vizew-nav-tab" role="tablist">
					
            <!--------------from here the 7 blog posts started----->
                      <?php getPostFirst(); ?>
                       <?php getPostSecond(); ?>

                       <?php getPostThird();  ?>
                       <?php getPostFourth(); ?>
                       <?php getPostFifth(); ?>
                           
                         <?php getPostSixth(); ?>

                       <?php getPostSeventh(); ?>

                     
    <!------------7posts ends here---->	
	
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Trending Now</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
               
			  <?php getTrendingPosts("page_hits");?>
				
				<!---end--------->
            </div>

        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Technology</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                           
						  <?php getTechbig();?>
							
                        </div>

                            <div class="section-heading style-2">
                            <h4>Latest Jobs</h4>
                            <div class="line"></div>
                        </div>

						<div class="row">
                           
						 <?php getJobssmall(); ?>
							
							
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!--   Section Heading -->
                                <div class="section-heading style-2">
                                    <h4>Sport News</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Sports Video Slides -->
                                <div class="sport-video-slides owl-carousel mb-50">
                                   
								  <?php getlatestSport(); ?>

									
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4>Latest Article</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Business Video Slides -->
                                <div class="business-video-slides owl-carousel mb-50">
                                    
                                   	<?php getlatestArticleBiz(); ?>								
									
                                </div>
                            </div>
                        </div>
                        
                 <div class="section-heading style-2">
                            <h4>All Posts</h4>
                            <div class="line"></div>
                        </div>

                        <div class="row mb-30">
                            <!-- Single Blog Post -->
						<?php getallposts("blogs");?>
													
                        
                   
				   
						<!---- Pagination can go here perfectly---->
				  
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Agriculture</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                           
						 <?php getAgricbig();?>
							
                        </div>
                   <div class="section-heading style-2">
                            <h4>Jokes </h4>
                            <div class="line"></div>
                        </div>

                     <?php getJokes(); ?>
					              <div class="section-heading style-2">
                            <h4>Entertainment </h4>
                            <div class="line"></div>
                        </div>
                        <?php getEntertain(); ?>


                    </div>
                </div>

             </div><!-- this div is very important-->
			  <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

                    	 <!-- ***** Single Widget ***** -->
                        <div class="single-widget newsletter-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Newsletter</h4>
                                <div class="line"></div>
                            </div>
                            <p>Subscribe our newsletter to get notifications on new updates, informations, etc.</p>
                            <!-- Newsletter Form -->
                            <div class="newsletter-form">
                               <?php echo $msg; ?>
                                <form action="index.php#loadhere" id="loadhere" method="post">
<input type="text" name="name" value="<?php if(isset($_POST['name'])){echo htmlentities ($_POST['name']);}?>" class="form-control mb-15" placeholder="Enter your name" required>

     <input name="email" value="<?php if(isset($_POST['email'])){echo htmlentities ($_POST['email']);}?>" class="form-control mb-15" placeholder="Enter your email" required>
                                    <button type="submit" name="submit" class="btn vizew-btn w-100">Subscribe</button>
                                </form>
                            </div>
							
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget followers-widget mb-50">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>
                        </div>
						
						 <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Latest News</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                               
							<?php getNewsBig();  ?>
								
                            </div>
                       
                      <?php getNewsSmall(); ?>
                          
							
                        </div>


                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Education</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                               <?php  getEduBig(); ?>
								
                            </div>
                           
						     
                           <?php getEduSmall();?>                       
							
                        </div>

                        <!-- ***** Single Widget *****
                        <div class="single-widget add-widget mb-50">
                            <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                        </div> -->

                       
						
						 <!-- ***** Single Widget ***** -->
                        <div class="single-widget mb-50">
                          
						    <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Most Popular</h4>
                                <div class="line"></div>
                            </div>

                            <?php getpopularposts("page_hits"); ?>
                           							
							
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget mb-50">
                          
						    <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Older Posts</h4>
                                <div class="line"></div>
                            </div>

                            <?php getOlderPost();?>
                           							
							
                        </div>

                    </div>
                </div>
            </div>
        </div>
			 
    </section>
	
    <!-- ##### Vizew Psot Area End ##### -->

   
    <!-- ##### Footer Area End ##### -->
	<?php include ("footer.php");?>
	
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
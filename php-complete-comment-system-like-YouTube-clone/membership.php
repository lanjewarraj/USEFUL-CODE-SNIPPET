<?php
//require("libs/fetch_data.php");
require('database_connection.php');
session_start();
$message = '';

if(isset($_POST['edit_profile']))
{
 $file_name = '';
 if(isset($_POST['profile_image']))
 {
  $file_name = $_POST['profile_image'];
 }

 if($_FILES['profile_image']['name'] != '')
 {
  if($file_name != '' && is_file('images_user/'.$file_name)) 
  {
   unlink('images_user/'.$file_name);
 
  }
  
   
  $image_name = explode(".", $_FILES['profile_image']['name']);
  $extension = end($image_name);
  $temporary_location = $_FILES['profile_image']['tmp_name'];
  $file_name = rand() . '.' . strtolower($extension);
  $location = 'images_user/' . $file_name;
  move_uploaded_file($temporary_location, $location);
 }
 $check_query = "
 SELECT * FROM users WHERE username = :username AND email != :email
 ";
 $statement = $connect->prepare($check_query);
 $statement->execute(
  array(
   ':username'  =>  trim($_POST["username"]),
   ':email'  =>  $_SESSION["email"]
  )
 );
 $total_row = $statement->rowCount();
 if($total_row > 0)
 {
  $message = '<div class="alert alert-danger">Username Already Exists</div>';
 }
 else
 {
  $data = array(
   ':name'    => trim($_POST["name"]),
   ':profile_image' => $file_name,
   ':username'   => trim($_POST["username"]),
   ':acctname'    => trim($_POST["acctname"]),
    ':acctnumb'    => trim($_POST["acctnumb"]),
	 ':bankname'    => trim($_POST["bankname"]),
	  ':phone'    => trim($_POST["phone"]),
   ':email'   => $_SESSION["email"]
  );
  
  {
   $query = '
   UPDATE users SET name = :name, profile_image = :profile_image, username= :username, phone = :phone, acctname = :acctname, acctnumb = :acctnumb, bankname = :bankname WHERE email = :email
   ';
  }
  $statement = $connect->prepare($query);
  if($statement->execute($data))
  {
   $message = '<div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Profile Updated Successfully</div>';
  }


 }


}

if (!empty($_SESSION["email"])) {
 
$query = "SELECT * FROM users WHERE email = '".$_SESSION["email"]."'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

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
    <title>9jaEarn Members Profile Page</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css">
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

</head>
<style>

/*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
body {
  overflow-x: hidden;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}


</style>

<body>
   <?php include ("headprofile.php"); ?>
  
    
	<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Member Dashboard</div>
      <div class="list-group list-group-flush">
	        <a href="#" class="list-group-item text-white list-group-item-action bg-dark">Profile</a>		
		 <a href="logout.php" class="list-group-item text-white list-group-item-action bg-dark">LogOut</a>
		
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
        <button class="btn btn-light" id="menu-toggle">Menu</button>               
      </nav>

          <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                     					   
					    <!-- Section Title -->
                        <div class="section-heading mt-4">
                            <h4>Edit Profile!</h4>
                            <div class="line"></div>
							
                        </div>
    <?php
                       foreach($result as $row)
                        {
                       echo $message;
                         ?>
					   <p style="margin-bottom:15px;"> </p>

                        <form method="post" enctype="multipart/form-data">
						<label for="name">Profile Image:</label>
						<div class="form-group">
						 <input type="file" name="profile_image" id="profile_image" accept="image/*" />
         <?php
         if($row["profile_image"] !== '')
         {
          echo '<img src="images_user/'.$row["profile_image"].'" class="img-thumbnail" style="height="100px;" width="100px;"/>';
          echo '<input type="hidden" name="profile_image" value="'.$row["profile_image"].'" />';
         }
         ?>
						
						</div> 
						<label for="refcode"> Referal Code:</label>
						<h6 class="text-white mb-3"> <?php echo $row["refcode"]; ?> </h6>  
						<label for="name">Name:</label>
						     
                            <div class="form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Name.." required value="<?php echo $row["name"]; ?>">
                            </div>
							   <label for="name">Username:</label>
							 <div class="form-group">
<input type="text" name="username" pattern="^[a-zA-Z0-9_.-]*$" class="form-control" id="username" placeholder="Username" required value="<?php echo $row["username"];?>">
                            </div>
							
                               <label for="name">Contact Number:</label><div class="form-group">
         <input type="text" name="phone" id="phone" class="form-control" placeholder="Contact number.." required value="<?php echo $row["phone"]; ?>">
                            </div>
							<div class="section-heading">
                            <h4>Account Details</h4>
							<div class="line"></div>
							</div>
							
							<label for="name">Account Name:</label>
                            <div class="form-group">
            <input type="text" name="acctname" class="form-control" id="name" placeholder="Account Name.." required value="<?php echo $row["acctname"]; ?>">
                            </div>
			<label for="name">Account Number:</label>
                            <div class="form-group">
            <input type="text" name="acctnumb" class="form-control" id="name" placeholder="Account Number.." required value="<?php echo $row["acctnumb"]; ?>">
                            </div>
							<label for="name">Bank Name:</label>
                            <div class="form-group">
            <input type="text" name="bankname" class="form-control" id="name" placeholder="Bank Name.." required value="<?php echo $row["bankname"]; ?>">
                            </div>				
                            <div class="form-group">
                         
                            <button type="submit" name="edit_profile" id="edit_profile" class="btn vizew-btn w-100 mt-20">Update All</button>
							</div>
                        </form>
						 <?php
       }
       ?>
                    </div>
                </div>
            </div> 
		  </div>
			  
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  
  
	 <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
	

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
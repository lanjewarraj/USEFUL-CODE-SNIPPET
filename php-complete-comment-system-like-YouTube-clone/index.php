<?php
	//Start a session
	session_start();
	require ("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8" name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Home page</title>

    <!-- Favicon for shortlink icon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .opacityhover:hover {
        opacity: 0.7;
        cursor: pointer;
    }

    .opacityrelated:hover {
        opacity: 0.7;
        cursor: pointer;
    }

    .bottomright {
        position: inherit;
        bottom: 8px;
        right: 0px;
        border-radius: 3px;
        background-color: #000000;
        color: #FFFFFF;
        padding: 3px;
        font-size: 10px;
        text-align: center;

    }

    .sidepost {
        position: inherit;
        bottom: 8px;
        right: 0px;
        border-radius: 3px;
        background-color: #000000;
        color: #FFFFFF;
        padding: 3px;
        font-size: 10px;
        text-align: center;

    }

    .pagination1 {
        margin-bottom: 20px;
    }

    .pagination1 li {
        display: inline-block;
        margin: 0 1px;
    }

    .pagination1 li a {
        display: inline-block;
        text-decoration: none;
        padding: 5px 7px;
        border-radius: 3px;
        border: 1px solid #666666;
    }

    .pagination1 li a:hover {
        text-decoration: none;
        background-color: #FFFFFF;
        color: red;
    }

    .pagination1 li a.active1 {
        font-weight: bold;
        color: #FFFFFF;
        background: #000000;
    }
</style>

<body>
    <?php include ("header.php"); ?>
    <br><br><br><br>
    <div class="container mt-4">
        <div class="row">
            <?php 
include_once'database/db.php';
$query = mysqli_query($con, "SELECT * FROM video_post ORDER BY id DESC") or die(mysqli_error($con));
if ($query->num_rows > 0) {
  # code...
  while ($row = mysqli_fetch_array($query)) {
    # code...
    $id = $row['id'];

?>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="footer-widget mb-70">
                    <a href="single-post.php?id=<?php echo $id; ?>"><img width="420" height="345" src="<?php echo $row['video_image']; ?>"> </a>
                </div>
            </div>
            <?php 
}
}
else{
  echo'<p style="text-align: center;">No Video found...</p>
';
}
?>
        </div>
    </div>


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
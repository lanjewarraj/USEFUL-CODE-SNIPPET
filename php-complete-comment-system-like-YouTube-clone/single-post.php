<?php
    session_start(); 
    
    include('db.php');
    require ("functions.php");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Vizew - Blog &amp; Magazine HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <script src="jquery-3.2.1.min.js"></script>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="styles.css">

    <!--exte--->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

</head>
<style>
    .comment-dates {
        font-size: 14px;
        color: #a6a6a6;
        text-transform: lowercase;
        letter-spacing: 1px;
        margin-bottom: 0px;
        display: inline;
    }

    .pointer:hover {
        cursor: pointer;
    }

    textarea {
        border: none;
        border-bottom: 1px solid #1890ff;
        padding: -5px 10px;
        margin-bottom: 10px;
        width: 100%;
        outline: none;
        background: transparent;
        color: #fff;
        resize: none;
    }

    textarea:focus {
        border-color: #fff;
    }

    [placeholder]:focus::-webkit-input-placeholder {
        transition: text-indent 0.4s 0.4s ease;
        text-indent: -100%;
        opacity: 1;


    }

    .circle-img {
        border-radius: 50%;
        height: 68px;
        width: 100px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .circle-img-reply {
        border-radius: 50%;
        height: 50px;
        width: 50px;
        overflow: hidden;
        justify-content: center;
        align-items: center;
    }

    .dropdown-menu {
        min-width: 3rem;
        z-index: 9999;
        position: absolute;
    }

    .center {
        margin-top: 5px;
        position: absolute;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .first-five {
        display: none;
    }

    .contact-form-area {
        position: relative;
        z-index: 1;
    }
</style>

<body>
    <?php include ("header.php"); ?>


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Videos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->


    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-60">
        <div class="container">

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <?php 
                 $videoID = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM video_post WHERE id = '$videoID'") or die(mysqli_error());
if ($sql->num_rows > 0) {
  # code...
  $data =  mysqli_fetch_array($sql);
  $title = $data['title'];
  $video_link = $data['video_link'];
  $description = $data['brief_description'];
}
                  ?>
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <iframe width="630" height="345" src="https://www.youtube.com/embed/<?php echo $video_link; ?>"></iframe>
                            <!-- Post Content -->
                            <div class="post-content mt-0">

                                <a href="single-post.php" class="post-title mb-2"><?php echo $title; ?></a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By Jane</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">Sep 08, 2018</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <?php
                                //connection to database is at functions.php file
            $page_post = $_GET['id'];
            $query = "SELECT * FROM tbl_comment_post WHERE page_post = '$page_post'";
            $result = mysqli_query($con, $query);

            if ($result) { 
                $row = mysqli_num_rows($result); 
                mysqli_free_result($result); 
            } 
        ?>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $row; ?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                    </div>
                                </div>
                            </div>
                            <p><?php echo $description; ?></p>
                            <a href="#" class="post-cata cata-sm cata-danger">SHOW MORE</a>

                            <!-- Section Title -->
                            <div class="section-heading style-2" style="margin-bottom: 15px">
                                <h4>Comment <?php echo $row; ?></h4>
                                <div class="dropup">
                                    <span style="float: right; margin-top:-30px;" class="pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SORT BY <i class="fa fa-sort" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" id="newest" style="color:#db4437;">Newest</a>
                                        <a class="dropdown-item" href="#" id="oldest">Oldest</a>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </div>

                            <?php if(!isset($_SESSION['email'])): ?>
                            <br><a href="login.php"> <input type="button" class="btn btn-info btn-sm center" value="Login To Comment" /></a><br> <?php endif ?>

                            <?php if(isset($_SESSION['email'])):?>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">
                                <!-- Comment Form -->
                                <div class="contact-form-area">
                                    <form method="post" action="" id="post_form">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="post_content" id="post_content" class="comment" placeholder="Comment here 👻.."></textarea>
                                            </div>
                                            <div class="col-12">
                                                <input type="hidden" name="action" value="insert" />
                                                <input type="hidden" name="page_post" value="<?php echo $page_post; ?>" />
                                                <button type="button" class="btn btn-secondary btn-sm" id="cancel_comment" style="float: left; display: none;"> Cancel</button>
                                                <input type="submit" name="share_post" id="share_comment" style="float: right;" class="btn btn-danger btn-sm" value="Comment" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php endif ?>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-30">
                                <div id="post_list"></div>
                                <div id="older_comment" style="display: none;">
                                    <div id="loader" align="center"><img src="loader.gif" alt="Loader"></div>
                                </div>
                                <br>
                                <?php 
                             if ($row >= 5) {
                                echo '<a href="#" class="post-cata cata-sm cata-danger center view_more">View More</a>';
                             }
                             ?>


                            </div>
                            
                            
                            
                        </div>

                    </div>
                </div>
            </div>

            <!-- Sidebar Widget -->

            <!-- Modal -->
            <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                            <p class="modal-title" id="exampleModalLabel">Report Comment</p>

                            <hr>
                        </div>
                        <div class="modal-body" style="color: #000;">
                            <p class="responseMsg"></p>
                            <form id="radio_form">
                                <label><input type="radio" id="report" name="report" value="Unwanted Commercial Content or Spam" /> Unwanted Commercial Content or Spam</label><br>
                                <label><input type="radio" id="report" name="report" value="Pornography or Sexually Explicit Material" /> Porno or Sexually Explicit Material</label><br>
                                <label><input type="radio" id="report" name="report" value="Child Abuse" /> Child Abuse</label><br>
                                <label><input type="radio" id="report" name="report" value="Hate Speech or Graphic Violence" /> Hate Speech or Graphic Violence</label><br>
                                <label><input type="radio" id="report" name="report" value="Harrassment or Bullying" /> Harrassment or Bullying</label><br>


                                <div class="modal-footer">
                                    <button type='button' class='btn btn-secondary btn-sm' data-dismiss="modal">
                                        <strong>Cancel</strong></button>
                                    <button type='button' id="report_btn" class='btn btn-danger btn-sm' data-pageid="<?php echo $page_post; ?>">
                                        <strong>Report</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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

<?php include('single-post-js.php'); ?>


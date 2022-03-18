<?php
    //Start a session
    session_start();
    require ("functions.php");
    require("libs/fetch_data.php");
    
?>
<?php $getPostUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *azfter* these tags -->

    <!-- Title -->
    <title>Vizew - Blog &amp; Magazine HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
<script src="jquery-3.2.1.min.js"></script>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

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
     border:none;
    border-bottom: 1px solid #1890ff;
    padding: -5px 10px;
    margin-bottom: 10px;
    width: 100%;
    outline: none;
    background: transparent;
    color: #fff;
    resize: none;
   }
textarea:focus{
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
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Archives</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reunification of migrant toddlers</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

 

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-details-thumb mb-50">
                        <img src="img/bg-img/34.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                    
                        <!-- Blog Content -->
                        <div class="blog-content">
                        <?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
                            <!-- Post Content -->
                            <div class="post-content mt-0">
                            
                                <a href="#" class="post-cata cata-sm cata-danger">Game</a>
                <a href="single-post.php" class="post-title mb-2">Reunification of migrant toddlers, parents should be completed Thursday</a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By Jane</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">Sep 08, 2018</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                     <?php
                                //connection to database is at functions.php file
                        $query = "SELECT * FROM tbl_samples_post";
$result = mysqli_query($con, $query);

 if ($result) { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
               
        // close the result. 
        mysqli_free_result($result); 
            
    } 
    
    
?>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $row; ?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                    </div>
                                </div>
                            </div>

                            <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>

                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>

                            <blockquote class="vizew-blockquote mb-15">
                                <h5 class="blockquote-text">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>
                                <h6>Ollie Schneider - CEO Deercreative</h6>
                            </blockquote>

                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>

                            <h4>Immediate Dividends</h4>

                            <ul class="unordered-list mb-0">
                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>
                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>
                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>
                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>
                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>
                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>
                            </ul>

                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
                                <ul>
                                    <li><a href="#">HealthFood</a></li>
                                    <li><a href="#">Sport</a></li>
                                    <li><a href="#">Game</a></li>
                                </ul>
                            </div>

                            <!-- Post Author -->
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="img/bg-img/30.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">Calantha Flower</a>
         <p>Hello! My name is Nicolas Sarkozy. I’m a web designer and front-end web developer with over fifteen years of professional.</p>
                                    <div class="post-author-social-info">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Related Post</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">

                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="img/bg-img/11.jpg" alt="">

                                                <!-- Video Duration -->
                                                <span class="video-duration">05.03</span>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                                                <a href="single-post.php" class="post-title">Warner Bros. Developing ‘The accountant’ Sequel</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- Single Blog Post -->
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">

                                                <img src="img/bg-img/12.jpg" alt="">

                                                <!-- Video Duration -->
                                                <span class="video-duration">05.03</span>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-danger">Game</a>
                                                <a href="single-post.php" class="post-title">Searching for the 'angel' who held me on Westminste</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 28</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 17</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                         
                             <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2" style="margin-bottom: 15px">

                                    <h4>Comment <?php echo $row; ?></h4>
          
         <div class="dropup">
   <span style="float: right; margin-top:-30px;" class="pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SORT BY <i class="fa fa-sort" aria-hidden="true"></i></span>
  <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="#" id="top">Top</a>
    <a class="dropdown-item" href="#" id="newest" style="color:#db4437;">Newest</a>
    <a class="dropdown-item" href="#" id="oldest">Oldest</a>

  </div>
</div>

                                    <div class="line"></div>
                                </div>
                           <?php if(!isset($_SESSION['email'])): ?>
                             <!-- Comment Form -->
                                <div class="contact-form-area">
                                    
       <a href="login.php"> <input type="button" class="btn btn-info btn-md" value="Login To Comment" /></a>
  

                                </div>
                           <?php else: ?>
                           <?php if(isset($_SESSION['email']))?>
                           <?php $page_post = $_GET['id']; ?>

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
                            <div class="comment_area clearfix mb-50">                             

                                             
                            <div id="post_list"></div>
                         <div id="append_post_list" style="display: none;"></div>

                            <div id="older_comment" style="display: none;">
   <div id="loader" align="center"><img src="loader.gif" alt="Loader"></div>   
                            </div>                   
                            
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
          <label><input type="radio" id="report" name="report" value="Unwanted Commercial Content or Spam"/> Unwanted Commercial Content or Spam</label><br>
    <label><input type="radio" id="report" name="report" value="Pornography or Sexually Explicit Material"/> Porno or Sexually Explicit Material</label><br>
    <label><input type="radio" id="report" name="report" value="Child Abuse"/> Child Abuse</label><br>
    <label><input type="radio" id="report" name="report" value="Hate Speech or Graphic Violence"/> Hate Speech or Graphic Violence</label><br>
    <label><input type="radio" id="report" name="report" value="Harrassment or Bullying"/> Harrassment of Bullying</label><br>    
    
     
      <div class="modal-footer">
       <button type='button' class='btn btn-secondary btn-sm' data-dismiss="modal">
    <strong>Cancel</strong></button> 
      <button type='button' id="report_btn" class='btn btn-danger btn-sm' data-pageid="<?php echo $page_post; ?>">
                <strong>Report</strong></button>
          </form>     
      </div>
    </div>
  </div>
</div>
           </div>
      </div>

<!---modal form ends here --->

            </div>
        </div>
    </section>
  

    <!-- ##### Post Details Area End ##### -->

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
<?php //include('test.js.php'); ?>

<?php include('single-post-js.php'); ?>


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-area d-flex align-items-center">
                            <div class="news-title">
                                <a href="index.php"><p>HOME</p></a>
                            </div>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="single-post.php">Welcome to Colorlib Family.</a></li>
                                    <li><a href="single-post.php">Boys 'doing well' after Thai</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                            <!-- Top Social Info -->
                            <div class="top-social-info">
                                <?php 
                                if (!empty($_SESSION["email"])) {
                                    # code...
                                    echo '
                                  <a href="logout.php" title="Logout"><i class="fa fa-sign-out"></i></a>
                                <a href="membership.php" title="Dashboard"><i class="fa fa-laptop"></i></a>
                                    ';
                                }
                                else{
                                    echo ' 
                                  <a href="login.php" title="Login"><i class="fa fa-sign-in"></i></a>
                                    ';
                                }
                                ?>
                               
                                <!---<a href="#"><i class="fa fa-youtube-play"></i></a>---->
                            </div>
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="search.php" method="post" name="form">
                          <input type="search" class="form-control" name="search[keyword]" id="topSearch" placeholder="Search here..." required>
                                    <button type="submit" name="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- Login -->
                    <?php if(!isset($_SESSION['email'])): ?>
                                
                            <a href="login.php" title="LogIn" class="login-btn">
                           Login
                            <!---<i class="fa fa-user" style="font-size:15px;" aria-hidden="true"></i>--->
                            </a>
                                                
                            <a href="register.php" title="Register" class="login-btn">
                            Register </a>
                        <?php else: ?>
                         <?php if(isset($_SESSION['email']))
                           {
                           $usersData = getUsersData(getId($_SESSION['email']));
                             }
                             ?>
                
                     <li>
                     <a href="#"> 
                     <i class="fa fa-user" style="font-size:15px;" aria-hidden="true">
                     <strong style="20px;"><?php echo $usersData ['name'].""; ?></strong>
                     
                     </i>
                     </a>
                         
                     </li>
                    
                     <?php endif ?>
                        
                            
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </header>
    <!-- ##### Header Area End ##### -->

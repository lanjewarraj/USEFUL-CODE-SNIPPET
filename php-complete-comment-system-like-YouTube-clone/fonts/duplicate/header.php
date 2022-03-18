<!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
                                <p>Breaking News:</p>
                            </div>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="single-post.php"><?php getbannertext("titles","1") ?></a></li>
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
                                <a href="#" title="Our Facebook page"><i class="fa fa-facebook"></i></a>
                                <a href="#" title="Our Twitter page"><i class="fa fa-twitter"></i></a>
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

        <!-- Navbar Area -->
        <div class="vizew-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="vizewNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/9jaEarn.png" alt=""></a>

                        <!-- Navbar Toggler -->

                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                   
                                    <li><a href="#">Categories</a>
                                        <ul class="dropdown">
                                          <?php getcategoriesmenu("blog_categories"); ?>
                                            
                                        </ul>
                                    </li>
									<?php if(isset($_SESSION['email'])): ?>
							<li><a href="archive-list.php">Earning( &#8358; <?php echo number_format($usersData ['earning']); ?> )</a>
														
							</li>
									 <?php endif; ?>
							
									 <li><a href="society.php">Society</a></li>
                                    <li><a href="#">How it Works</a>
                                                <ul class="dropdown">
                                                <li><a href="faq.php">- FAQ</a></li>
                                                <li><a href="archive-list.php">- Procedures</a></li>
                                                <li><a href="archive-grid.php">- Terms </a></li>
                                                <li><a href="single-post.php">- Privacy Policy</a></li>
                                                <li><a href="video-post.php">- Disclaimer</a></li>
                                                <li><a href="contact.php">- Advertise</a></li>
                                                
                                          </ul>
                                                                              
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
									<?php if(isset($_SESSION['email'])): ?>
									  <li><a href="#">Profile</a>
									  <ul class="dropdown">
                                    <li><a href="logout.php">- LogOut</a></li>
                                      <li><a href="membership.php">- My Dashboard</a></li>							
									  </ul>
									  </li>
									  <?php endif; ?>
							
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

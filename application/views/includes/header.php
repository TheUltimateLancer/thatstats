<body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
		
		       <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!--form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form-->


                            <ul class="nav navbar-nav navbar-right pull-right">

								<?php if($this->session->userdata("logged_in")=='1')
								{
									?>
									 <li class="dropdown">
                                    <a href='' class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo $this->session->userdata('profile_img');?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url()?>/Profile"><i class="ti-user m-r-5"></i> Profile</a></li>
                                        <li><a href="<?php echo site_url()?>/Dashboard/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            
									
							<?php	}
								else{
									?>
									<li class="hidden-xs">
									<a href="<?php echo $login_url;?>" class="btn btn-info ">Log In</a>
									</li>
							<?php	}
								?>
                               </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

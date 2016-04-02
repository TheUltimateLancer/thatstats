		<link href="<?php echo base_url();?>/assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

<style>.overlay {
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:rgba(0, 0, 0, 0.85);
    background: url(data:;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAABl0RVh0U29mdHdhcmUAUGFpbnQuTkVUIHYzLjUuNUmK/OAAAAATSURBVBhXY2RgYNgHxGAAYuwDAA78AjwwRoQYAAAAAElFTkSuQmCC) repeat scroll transparent\9;
    z-index:9999;
    color:white;
	text-align:center;
	display:none;
	transition:all 2s linear ;
}
.overlay a{
	position:absolute;
    top:330px;
}
@media screen and (max-width:600px){
  .overlay a {top:150px;}	
}
</style>
<div class="overlay" ><a class="btn btn-warning" href="<?php echo $login_url ;?>">Please Login to Vote </a></div>  
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                           <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?php echo $this->session->userdata("profile_img");?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h4 class="m-b-5"><b><?php echo $this->session->userdata("user_name");?></b></h4>
                                    </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    	<div class="col-md-4">
                    		
                    		<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><b>Personal Information</b></h4>
								<div class="p-20">
									<div class="about-info-p">
                                        <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $this->session->userdata("user_name");?></p>
                                    </div>
                                   
                                    <div class="about-info-p">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $this->session->userdata("user_email");?></p>
                                    </div>
                                   
								</div>
							</div>
							
						
												
												
                        </div>
                        
                        
                        <div class="col-md-8">
                        	
                        	<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><b>Activity</b></h4>
								<div class="p-20">
								<?php 
									foreach($activity as $act)
									{
										?>
										<div class="timeline-2">
	                                    <div class="time-item">
	                                        <div class="item-info">
	                                            <div class="text-muted">5 minutes ago</div>
	                                            <p><strong><a href="#" class="text-info"><?php echo $act['user'][0]['user_name'];  ?></a></strong> Voted For  <span class="label label-default"> <?php echo $act['poll'][0]['poll_description']?></span><strong> <?php echo $act['my_vote']['option_text'];?></strong></p>
	                                        </div>
	                                    </div>
									</div>
										
										
							<?php		}
								?>

									
								
								</div>
							</div>
                        	
                        </div>
                        
                        
                    </div>
                    
                   
                </div> <!-- container -->
              
  </div>				
                     	
						
						
						
						
						
						
						
						
						
						
						

                    </div> <!-- container -->
                               
                </div> <!-- content -->
	<link href="<?php echo base_url()  ;?>assets/css/pages.css" rel="stylesheet" type="text/css" />
  
	<?php  require_once("includes/footer.php");?>
	
		<script src="<?php echo base_url()  ;?>assets/pages/jquery.dashboard_crm.js"></script>
        <script src="<?php echo base_url()  ;?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url()  ;?>assets/js/jquery.app.js"></script>
       
            </div>
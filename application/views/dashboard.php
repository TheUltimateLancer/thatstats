		<link href="<?php echo base_url();?>/assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
<?php 
											   foreach($topics as $topic)
											   {
												   ?>
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
<div class="overlay" ><div class="fb-share-button" data-href="<?php echo site_url() ; ?>/Poll/<?php echo md5($this->config->item("salt").$topic['id']) ;?>/<?php echo  $topic['id']; ?>" data-layout="button_count"></div></div>  
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                   </div>
                        </div>
						<div class="row">
							<div class="col-sm-9">
								<div class="card-box">
									<div class="row">
										<div class="col-sm-12">
											<h4 class=" m-t-0 header-title"><b>TRENDING POLLS</b></h4>
											
												    <h3 class="text-center "><?php echo $topic['poll_description']?></h3>
												     <?php 
		   $votes_casted = $this->global_model->votesCasted($topic['id']);
		   $colors = array (
		   "red" ,
		   "green" ,
		   "blue" ,
		   "yellow" 
		   
		   );
		   echo "<span class='label label-default'>Votes Count  </span> ";
		  					foreach($votes_casted as $i=>$voted)
							{
								echo " <span class='label label-success' style='background:".$colors[$i]."'>".$voted['option_text']." ". $voted['count']."</span> ";
								}
			 $votes_casted = $this->global_model->percentage($votes_casted);
		 				
		   ?>
												
												  
     											  <br>  <div class="col-md-3"></div>
												   <div class="col-md-6">
												  
												    
														<div id="bar-chart-<?php echo $topic['id'] ;?>" ></div>			   
									
												   </div>
												   
												   <div class="col-md-12">
															   
                                <div class="portlet">
                                    <div class="portlet-heading bg-primary">
                                        <h6 class="portlet-title">
                                           <?php echo  $topic['poll_title'] ;?>
                                        </h6>
                                        <div class="portlet-widgets">
										    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-primary1" class="panel-collapse text-center">
                                        <div class="portlet-body" id="portal" >
												<h4><?php echo $topic['poll_description'] ;?></h4>
									<?php
 									 if($this->session->userdata('logged_in')== '1')
									 {
										 $my_vote =  $this->global_model->myVote($topic['id'] , $this->session->userdata("user_id"));
									      if($my_vote['status'] == 1)
										  {
											  ?>
											  <i class="fa fa-check"></i> You Have Already Voted <b><?php echo  $my_vote['option_text']; ?></b>
										<?php  } 
										else
										{
											?>
											
												<form method="post"  id="form-<?php echo $topic['id'] ;?>">
													 <input type="hidden" value="<?php echo md5($this->config->item("salt").$topic['id']) ;?>" name="hashed_id">
													 <input type="hidden" value="<?php echo $topic['id'] ;?>" name="id">
										 
													<?php 
												    $poll_options = json_decode(htmlspecialchars_decode($topic['poll_options']));
												    foreach($poll_options as $key=>$option)
													{
														?>
															    <div class="radio radio-pink radio-inline radio-circle">
																	
																	<input type="radio" name="poll[<?php echo $topic['id'] ;?>]"   id="inlineRadio<?php echo $topic['id']."-".$key?>" value="<?php echo $key ; ?>" onclick="$('#form-<?php echo $topic['id'] ;?>').submit();">
																	<label for="inlineRadio<?php echo $topic['id']."-".$key?>"> <?php echo $option ;?></label>
																</div>
														<?php
													}
												?>
												
												
												</form>
												<p></p>
										</div>
                                    </div>
                                </div>
                            
   
									<script>
									     $("#form-<?php echo $topic['id'] ;?>").submit(function(event){
		 event.preventDefault();
		 var formdata =   new FormData(this);
			
			$('#indicator').show();
				$.ajax({
						url: "<?php echo site_url()."/Dashboard/Cast" ?>",
						type: "POST",
						data:  formdata,
						contentType: false,
						cache: false,
						processData:false,
				success: function(data)
				{
					
					if(data==1)
					{
						$('#indicator').show();
						$("#form-<?php echo $topic['id'] ;?>").html("<span class='bounceInLeft'><i class='fa fa-check bounceOut'></i> Your Vote Has Been Casted<style>#form-<?php echo $topic['id'] ;?>{opacity:0.7;}</style></span>");
					}	
					else{
						
						
					}
				},
				error: function(){
				} 	        
				}); 
									

			
	 });
									
									</script>
							
												   </div>
								<?php	}	
										
									 } 
									 else{
										 ?>
										 
										 	<form method="post"  id="form-<?php echo $topic['id'] ;?>">
													 <input type="hidden" value="<?php echo md5($this->config->item("salt").$topic['id']) ;?>" name="hashed_id">
													 <input type="hidden" value="<?php echo $topic['id'] ;?>" name="id">
										 
													<?php 
												    $poll_options = json_decode(htmlspecialchars_decode($topic['poll_options']));
												    foreach($poll_options as $key=>$option)
													{
														?>
															    <div class="radio radio-pink radio-inline radio-circle">
																	
																	<input type="radio" name="poll[<?php echo $topic['id'] ;?>]"   id="inlineRadio<?php echo $topic['id']."-".$key?>" value="<?php echo $key ; ?>" disabled>
																	<label for="inlineRadio<?php echo $topic['id']."-".$key?>"> <?php echo $option ;?></label>
																</div>
														<?php
													}
												?>
												
												
												</form>
												<script>
													$(".portlet-body").hover(function(){
														//$("div.overlay").css("display","block");
													});
												</script>
											
										 
									 <?php }
									
									?>
									   
												   
												   
												   
											<?php    }
											
											?>
											
											
										<br>
										<br>
										
											
										</div>
										<form action="<?php echo site_url()."/Dashboard";?>" method="post" class="col-md-6">
										  <input type="hidden" value="<?php echo $topic['id'] ;?>" name="id">
										  <input type="hidden" value="<?php echo md5($this->config->item("salt").$topic['id']) ;?>" name="hashed_id">
										   <input type="hidden" value="prev" name="type">
									    
									    <button type="submit" class="btn btn-info waves-effect waves-left pull-left">
                                                   <span class="btn-label btn-label-left"><i class="fa fa-arrow-left"></i>
                                                   </span>Prev
										</button>
										</form>
									
										<form action="<?php echo site_url()."/Dashboard";?>" method="post" class="col-md-6">
										  <input type="hidden" value="<?php echo $topic['id'] ;?>" name="id">
										   <input type="hidden" value="<?php echo md5($this->config->item("salt").$topic['id']) ;?>" name="hashed_id">
									       <input type="hidden" value="next" name="type">
									    
									    <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Next
										   <span class="btn-label btn-label-right"><i class="fa fa-arrow-right"></i>
										   </span>
										</button>
                                        
										</form>
									</div>
									<br></br>
								
                                    <div class="row">
					<div class="fb-share-button" data-href="<?php echo site_url() ; ?>/Poll/<?php echo md5($this->config->item("salt").$topic['id']) ;?>/<?php echo  $topic['id']; ?>" data-layout="button_count"></div>
				  				<div class="row">
							
									
  <div class="fb-comments" data-href="https://thatstats.com/poll/<?php echo md5($this->config->item("salt").$topic['id']) ;?>/<?php echo $topic['id']?>" data-width="100%" data-numposts="5"></div>	
									</div> 
								</div>
							</div>
						</div>
					

                     
  </div>
                        
						
						
						
						
						
						
						
						
						
						
						
						

                    </div> <!-- container -->
                               
                </div> <!-- content -->
	<link href="<?php echo base_url()  ;?>assets/css/pages.css" rel="stylesheet" type="text/css" />
       
	<link rel="stylesheet" href="<?php echo base_url()  ;?>assets/plugins/morris/morris.css">

	<?php  require_once("includes/footer.php");?>
	 <script src="<?php echo base_url()  ;?>assets/plugins/jquery-knob/jquery.knob.js"></script>
        <!--Morris Chart CSS -->
	
		  <!--Morris Chart-->
		<script src="<?php echo base_url()  ;?>assets/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url()  ;?>assets/plugins/raphael/raphael-min.js"></script>
		
		<!-- Flot chart -->
		

        
		
		
		
		<script src="<?php echo base_url()  ;?>assets/pages/jquery.dashboard_crm.js"></script>
        <script src="<?php echo base_url()  ;?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url()  ;?>assets/js/jquery.app.js"></script>
       
                <script>
			$(function() {
				$(".knob").knob();
			});
			
			
			
			
			
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var MorrisCharts = function() {};
   //creates Bar chart
    MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },
    MorrisCharts.prototype.init = function() {

      
         },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
	 
}(window.jQuery);
 var $barData  = [{
         
<?php 
$html =" y : '%' ,";
$html2 = "[";
$html3 = "[";
$html4 = "[";
$key_count = count($votes_casted);

   foreach($votes_casted as $key =>$votes_percent)
   {
	   if($key == $key_count-1)
	   {
		    $html .= "'a".$key ."':". $votes_percent['percent']  ; 
	        $html2 .= "'a".$key."' ";  
	        $html3 .= "'".$votes_percent['option_text']."' ";  
	        $html4 .= "'".$colors[$key]."' ";  
             
	   } 
	   else{
		   
		    $html .= "'a".$key."':". $votes_percent['percent'].","  ; 
	        $html2 .= "'a".$key."' ,";  
	        $html3 .= "'".$votes_percent['option_text']."' ,";  
	        $html4 .= "'".$colors[$key]."' ,";  
   
	   }
     }
   $html2 .= "]";
   $html3 .= "]";
   $html4 .= "]";
   echo $html ;
?>
 } ];
$.MorrisCharts.createBarChart('bar-chart-<?php echo $topic['id']; ?>', $barData, 'y', <?php echo $html2 ;?>, <?php echo $html3 ;?>,<?php echo $html4 ;?>);

	
		
					</script>
		<style>
			.item{
				height:500px;
				text-align:center;
				vertical-align:center;
			}
		</style>


            </div>
		    
          <script src="<?php echo base_url();?>assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
       <script>
		!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
       

    //Success Message
	<?php 
	if($this->session->userdata("logged_in")!= '1')
	{
		
	
	  ?>
	  $('#portal').click(function(){
        swal("Please Login", "Login here to coninue ", "info")
    });

	<?php 
		
	}
	?>
    
    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);
	   
	   
	   </script>
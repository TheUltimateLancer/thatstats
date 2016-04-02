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
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											
											<p class="text-muted m-b-30 font-13">Add captions to your slides easily with the <code>.carousel-caption</code> element within any <code>.item</code>. </p>
											
											<!-- START carousel-->
											<div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
												<ol class="carousel-indicators">
													<li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
													<li data-target="#carousel-example-captions" data-slide-to="1"></li>
													<li data-target="#carousel-example-captions" data-slide-to="2"></li>
												</ol>
												
												<div role="listbox" class="carousel-inner">
												
												<?php 
														foreach($topics as $topic)
														{
															?>
													<div class="item">
													  <?php  echo $topic['poll_description'];?>
														          <div class="col-lg-12">
                                <div class="portlet">
                                    <div class="portlet-heading bg-primary">
                                        <h6 class="portlet-title">
                                           <?php echo  $topic['poll_title'] ;?>
                                        </h6>
                                        <div class="portlet-widgets">
										    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div  class="panel-collapse collapse in">
                                        <div class="portlet-body">
												<h4><?php echo $topic['poll_description'] ;?></h4>
									
												<form method="post"  id="form-<?php echo $topic['id'] ;?>">
													<?php 
												    $poll_options = json_decode(htmlspecialchars_decode($topic['poll_options']));
												    foreach($poll_options as $key=>$option)
													{
														?>
															    <div class="radio radio-pink radio-inline radio-circle">
																	
																	<input type="radio" name="poll<?php echo $topic['id'] ;?>"   id="inlineRadio<?php echo $topic['id']."-".$key?>" value="<?php echo $key ; ?>" onclick="$('#form-<?php echo $topic['id'] ;?>').submit();">
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
        </div>
      
														<div class="carousel-caption">
														
															<h3 class="text-white font-600"></h3>
															<p>
																
																
															</p>
														</div>
													</div>
												
															
															
												<?php			
														}
												?>												
													
													<div class="item active">
													<div class="col-md-3"></div>
													<div class="col-md-6" >
														<div id="morris-bar-example" style="height: 300px;"></div>
											                 <div class="col-lg-12">
                                <div class="portlet">
                                    <div class="portlet-heading bg-primary">
                                        <h6 class="portlet-title">
                                           <?php echo  $topic['poll_title'] ;?>
                                        </h6>
                                        <div class="portlet-widgets">
										    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div  class="panel-collapse collapse in">
                                        <div class="portlet-body">
												<h4><?php echo $topic['poll_description'] ;?></h4>
									
												<form method="post"  id="form-<?php echo $topic['id'] ;?>">
													<?php 
												    $poll_options = json_decode(htmlspecialchars_decode($topic['poll_options']));
												    foreach($poll_options as $key=>$option)
													{
														?>
															    <div class="radio radio-pink radio-inline radio-circle">
																	
																	<input type="radio" name="poll<?php echo $topic['id'] ;?>"   id="inlineRadio<?php echo $topic['id']."-".$key?>" value="<?php echo $key ; ?>" onclick="$('#form-<?php echo $topic['id'] ;?>').submit();">
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
        </div>
      
													</div>
														
														
													</div>
														
												</div>
												<a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
												<a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
											</div>
											<!-- END carousel-->
										</div>
										
									</div>
								</div>
							</div>
						</div>
					

                      <script>
					     
					   </script>
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

var $barData  = [
            { y: '2009', a: 100, b: 90 , c: 40 },
            
        ];
$.MorrisCharts.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ['Series A', 'Series B', 'Series C'], ['#5fbeaa', '#5d9cec', '#ebeff2']);

	
		
					</script>
		<style>
			.item{
				height:500px;
				text-align:center;
				vertical-align:center;
			}
		</style>


            </div>
            
         
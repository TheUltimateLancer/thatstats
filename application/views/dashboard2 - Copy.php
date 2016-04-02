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
							<div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-info">
													<i class="icon-layers"></i>
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5"><b>Active</b></h4>
											   <h5 class="text-muted m-b-0 m-t-0">120 Deals</h5>
											</div>
                                            <div class="table-detail text-right">
                                                <span data-plugin="peity-bar" data-colors="#34d3eb,#ebeff2" data-width="120" data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1</span>
                                            </div>

										</div>
									</div>
								</div>
							</div>

                            <div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-custom">
													<i class="icon-trophy"></i>
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5"><b>Won</b></h4>
											   <h5 class="text-muted m-b-0 m-t-0">95 Deals</h5>
											</div>
                                            <div class="table-detail text-right">
                                                <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                                            </div>

										</div>
									</div>
								</div>
							</div>

                            <div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-danger">
													<i class="icon-close"></i>
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5"><b>Lost</b></h4>
											   <h5 class="text-muted m-b-0 m-t-0">85 Deals</h5>
											</div>
                                            <div class="table-detail text-right">
                                                <span data-plugin="peity-donut" data-colors="#f05050,#ebeff2" data-width="50" data-height="45">1/5</span>
                                            </div>

										</div>
									</div>
								</div>
							</div>
						</div>

                       <div class="row">
									<div class="col-sm-12">
								<div class="portlet">
									<!-- /primary heading -->
									<div class="portlet-heading">
										<h3 class="portlet-title text-dark"> Bar Chart </h3>
										<div class="portlet-widgets">
											<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
											<span class="divider"></span>
											<a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
											<span class="divider"></span>
											<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div id="bg-default" class="panel-collapse collapse in">
										<div class="portlet-body">
											<div class="text-center">
												<ul class="list-inline chart-detail-list">
													<li>
														<h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Series A</h5>
													</li>
													<li>
														<h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Series B</h5>
													</li>
													<li>
														<h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Series C</h5>
													</li>
												</ul>
											</div>
											</div>
									</div>
								</div>
								<div id="morris-bar-example" style="height: 300px;"></div>
										
								<!-- /Portlet -->
							</div>
					
					   </div>
						<div class="row">
                        	
                        	<div class="col-lg-12">
                        		<div class="card-box">
                        			<h4 class="text-dark header-title m-t-0"></h4>
                        			<p class="text-muted font-13">
										Trending Topics
									</p>
                        			
                        			<div class="nicescroll p-20" style="height: 320px;">
											<?php 
                                                  if(!empty($topics))
												  {
													  foreach($topics as $topic)
													  {
														 ?>
       <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-primary">
                                        <h3 class="portlet-title">
                                           <?php echo  $topic['poll_title'] ;?>
                                        </h3>
                                        <div class="portlet-widgets">
										    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="bg-primary1" class="panel-collapse collapse in">
                                        <div class="portlet-body">
												<h4><?php echo $topic['poll_description'] ;?></h4>
									
												<form method="post" onsubmit="ajaxPost('#form-<?php echo $topic['id'] ;?>')" id="form-<?php echo $topic['id'] ;?>">
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
        </div>
                            
                     
											<?php 			  
													  }
													  
												  } 

                                            ?>											
																					
									</div>
                                    
                        		</div>
                        	</div>
                        	<!-- end col -->
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
		<script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="<?php echo base_url()  ;?>assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>


        <script src="<?php echo base_url()  ;?>assets/plugins/peity/jquery.peity.min.js"></script>

		<script src="<?php echo base_url()  ;?>assets/pages/jquery.dashboard_crm.js"></script>
  <script src="<?php echo base_url()  ;?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url()  ;?>assets/js/jquery.app.js"></script>
        <script src="<?php echo base_url()  ;?>assets/pages/morris.init.js"></script>
        
                <script>
			$(function() {
				$(".knob").knob();
			});
			
		function	ajaxPost(param)
		{
			param.preventDefault;
			
			var formdata = new FormData();
			
			console.log(formdata);
			$.ajax
					({
						  type: "POST",
						  url: '<?php echo site_url();?>',
						  data: formdata,
						  success: "",
						  dataType: "json"
					});
		}
			 
			 
			 
			
		</script>


            </div>
            
         
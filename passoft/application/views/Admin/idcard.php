
<div class="container">
	<div class="row">
	    	
		<div class="col-md-12">
		    <?php if($this->uri->segment(3)==5) { ?>
		    <div style="height:30px; background-color:lightgreen">
    				        <?php echo "Please Enter Valid ID.";?>   
    			</div>
    			<?php } ?>
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Search ID Card And Print</span></h4>
					<div class="panel-tools">
						<div class="dropdown">
							<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
								<i class="fa fa-cog"></i>
							</a>
							<ul class="dropdown-menu dropdown-light pull-right" role="menu">
								<li>
									<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
								</li>
								<li>
									<a class="panel-refresh" href="#">
										<i class="fa fa-refresh"></i> <span>Refresh</span>
									</a>
								</li>
								<li>
									<a class="panel-config" href="#panel-config" data-toggle="modal">
										<i class="fa fa-wrench"></i> <span>Configurations</span>
									</a>
								</li>
								<li>
									<a class="panel-expand" href="#">
										<i class="fa fa-expand"></i> <span>Fullscreen</span>
									</a>
								</li>
							</ul>
						</div>
						<a class="btn btn-xs btn-link panel-close" href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
			
				<div class="panel-body">
					<div class="row form-group">
                        <div class="col-md-12">
                            
                            <div class="col-md-6">
                                <form method="post" action="<?php echo base_url();?>adminController/idcardd">
                               <input type="text"  name="userid" placeholder="User ID" style="width:250px" class="form-control" required/>
                               <br>
                               <input type="submit" name="submit" value="Get ID" class="btn btn-primary"/>
                               </form>
                            </div>
                            <div class="col-md-6">
                            
                            </div>
                        </div>
                    </div>
                      <div class="row" style="padding-top:20px;">
                        <div class="col-md-12" id="amount_list">
                            
                        </div>
                      </div>                  
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
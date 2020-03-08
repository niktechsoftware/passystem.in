
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			    <div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Subscriber View</span></h4>
				</div>
				<div class="panel-body">
				    <div style="text-align:center;" class="alert btn-purple">
				    	<!-- <button data-dismiss="alert" class="close"></button> -->
                        <h4 class="media-heading text-center">Welcome to Subscriber View Area </h4>
                        <p>In This Section You can give your View and your experience about PASSYSTEM.<br>
                        </p> 
                    </div>
                    
                        <?php if($this->uri->segment(3)=='5'){?>
                            <div class="alert btn-green">
                                <p> Your View submitted Successfully.</p>
                            </div>
                        <?php }?>
                    
				    
					<div class="row">
						<div class="col-md-12 space20">
                            <?php if($sub_fd->num_rows()>0) { if(strlen($sub_fd->row()->viewmsg)>0) {?>
                            <form method="post" action="<?php echo base_url();?>subscriberController/insertfeedback/"<?php echo $username;?>>
                                <div class="dt-responsive ">
                                    <div class="row">
                                        <div class="col-md-3 text-center"><h4 style="color:brown">Your Last View</h4></div>
                                        <div class="col-md-9">
                                            <textarea name="feedbackold" class="form-control" style=" margin-bottom:30px; width:500px" readonly><?php echo $sub_fd->row()->viewmsg;?></textarea>
                                        </div>
                                        <div >
                                            
                                        </div>
                                        <div class="col-md-3 text-center"><h4 style="color:brown">Update Your View</h4></div>
                                        <div class="col-md-9">
                                            <textarea name="feedback" class="form-control" style="width:500px" placeholder="Enter your View" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top:20px;">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-info btn-md">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } } else {?>
                            <form method="post" action="<?php echo base_url();?>subscriberController/insertfeedback/<?php echo $username;?>">
                                <div class="dt-responsive ">
                                    <div class="row">
                                        <div class="col-md-3 text-center"><h4 style="color:brown">Fill Your View</h4></div>
                                    
                                        <div class="col-md-9">
                                            <textarea name="feedback" class="form-control" placeholder="Enter your View" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top:20px;">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary btn-md">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->

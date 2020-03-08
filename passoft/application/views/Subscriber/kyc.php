
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			    <div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Subscriber Update KYC</span></h4>
				</div>
				<div class="panel-body">
				    <div style="text-align:center;" class="alert btn-purple">
				    	<!-- <button data-dismiss="alert" class="close"></button> -->
                        <h4 class="media-heading text-center">Welcome To Update Your KYC Area </h4>
                        <p>In This Section You can upload your Aadhaar Card and Pan Card.For upload Aadhar card click on upload image then select image then click on upload Button.
                For Pan card click on upload pan card tab , then click on upload image then select image then click on upload Button. <br>
                        </p> 
                    </div>
                    
                        <?php if($this->uri->segment(3)=='5'){?>
                            <div class="alert btn-green">
                                <p> Your KYC submitted Successfully.</p>
                            </div>
                        <?php } elseif($this->uri->segment(3)=='6'){  ?>
                        <div class="alert btn-green">
                                <p> Your KYC submitted Successfully.</p>
                            </div>
                            <?php } ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 space20">
                            
                                <div class="dt-responsive ">
                                    <div class="row">
                                        <form method="post" action="<?php echo base_url();?>subscriberController/uploadimg" enctype="multipart/form-data" >
                                        <div class="col-md-6 text-center" style="height:250px; background-color:lightblue">
                                            <h3 style="color:black">UPLOAD AADHAAR CARD IMAGE</h3>
                                            <div class="card">
                                                <div style="margin:30px;"><input type="file" name="ad1" required/></div>
                                                <div style="margin:30px;"><input type="file" name="ad2" required/></div>                                            
                                                <div><input type="submit" name="upload_ad" class="btn btn-primary" value="upload aadhaar"/></div>
                                            </div>
                                        </div>
                                        </form>
                                        <form method="post" action="<?php echo base_url();?>subscriberController/uploadimg" enctype="multipart/form-data" >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5 text-center" style="height:250px; background-color:lightblue">
                                            <h3 style="color:black">UPLOAD PAN CARD IMAGE</h3>
                                            <div class="card">
                                                <div style="margin:30px;"><input type="file" name="pan" required/></div>
                                                <div style="margin:30px;"><input type="submit" name="upload_pan" class="btn btn-primary" value="upload pan"/></div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>                                     
                                </div>
                            
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->

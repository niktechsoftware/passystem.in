<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Branch Registration </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to a New Branch Registration Area</h3>
		        
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Branch Registration is Successfully Done!!!!!
							</div>
							<?php }?>
						</div>
				<form action="<?php echo base_url();?>index.php/branchController/saveBranch"  method ="post" role="form" id="form">
			
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Branch Name<span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" id="branchName" name="b_name" minlength="1" maxlength="30" style="text-transform:uppercase" required="required"/>
                   				<span id="branchmsg"></span>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Owner Name<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text"  class="form-control"  name="name"  minlength="1" maxlength="30" style="text-transform:uppercase" required="required"/>
                   				</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Mobile Number<span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="mob_no" pattern="^[6-9]\d{9}$"  required="required"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Aadhaar Number<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text" data-type="adhaar-number" class="form-control" name="aadhar" minlength="14" maxlength="14" required ="required"/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 District <span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="district"  required="required" style="text-transform:uppercase"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 E-mail <span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="email" class="form-control" name="email" />
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Password <span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="password"  class="form-control" name="password" id="password" required="required"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Confirm Password <span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="password" class="form-control" name="cpassword" id="conformpassword" />
                    			<span id="message"></span>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				</div>
                   				 <div class="col-md-8">
                   				 </div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				
                    		</div>
                			<div class="col-md-8">
                    			<button type="submit" class= "btn btn-success" id="subbutton">Create Branch</button>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            </form>
            </div>
          </div>
         </div> 
    </div>       
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Complain Solution Page </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to a Complain Solution Area</h3>
		        
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Give a Solution of Subscriber is Successfully Done!!!!!
							</div>
							<?php }?>
						</div>
				<form action="<?php echo base_url();?>index.php/adminController/complainSolution"  method ="post" role="form" id="form">
			
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-3">

                   				  <label style="font-size:18px;"> Complain No.</label><span class="symbol required"></span></div>

                   				 <div class="col-md-9">
                   				 <input type="text"  class="form-control" id="branchName" name="b_name" minlength="1" maxlength="30" style="text-transform:uppercase" required="required" value="<?php echo $view->complain_id;?>"/>
                   				<span id="branchmsg"></span>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">

                   		 <label style="font-size:18px;">Complain</label><span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                                <input type="hidden" name="c_id" value="<?php echo $view->complain_id;?>">
                                <textarea class ="form-control" style="width:350px;" ><?php echo $view->message;?></textarea>
                    			<!--<input type="textarea"  class="form-control"  name="name"  minlength="1" maxlength="30" style="text-transform:uppercase" required="required" value="<?php //echo $view->message;?>"/>-->

                   				</div>
               			</div>               
               		</div>	 
            	</div>

            <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-12">

                    <div class="col-md-3">
                          <label style="font-size:18px;"> Solution<label><span style="color:red">*</span></div>
                           <div class="col-md-9">
                            <textarea class ="form-control" id="solution" name="solution" style="width:550px;" required></textarea>
                           <!--<input type="text"  class="form-control" id="solution" name="solution" minlength="1" maxlength="30" style="text-transform:uppercase" required="required" />-->

                          <span id="branchmsg"></span>
                          </div>
                      </div>
                                    
                  </div>   
              </div>   
               <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-12 text-center">
                      <button class="btn btn-primary btn-md " >Submit</button>
                      </div>
                                    
                  </div>   
              </div>      
            </form>
            </div>
          </div>
         </div> 
    </div>       
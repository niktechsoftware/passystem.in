<div style="background-color:green" >
<?php if($this->uri->segment(3)==6){?>
<span style="color:white" > Registration Unsuccessful !! Duplicate Aadhar Number.</span>
<?php } ?>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title"> Subscriber Registration </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to New Subscriber Full Profile Area</h3>
		         Here you can register a new Subscriber Full Profile , by filling this form.
		         
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Subscriber  is Successfully Updated!!!!!
							</div>
							<?php }?>
						</div>
           
				<form action="<?php echo base_url();?>index.php/subscriberController/customer_value/"  method ="post" role="form" id="form">
          <div>
			   <div class="row"> 
           <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Upline Username like PSU1C201,PSU1C202 :</label> 
                            <input type="text"  id="joinerid" name="joinerid" class="form-control" required=""  onkeyup="this.value = this.value.toUpperCase();" placeholder="Upline Username like PSU1C201, PSU1C202 ">
                            <span class="form-bar" id="message1"></span>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Upline Password :</label> 
                            <input type="password"  id="joinerpass" name="joinerpass" class="form-control" required=""  onkeyup="this.value = this.value.toUpperCase();" placeholder="Upline Password ">
                            <span class="form-bar" id="message1"></span>
                        </div>
                        </div>
			</div>
          <div id="aarju" class="row">
               <div class="col-md-12 space20">
                 
               </div>
              </div>
               <div class="row">
                  <div class="col-md-10 space20">
                    
                    <p class="text-inverse text-left"><a href="https://passystem.in/"><b >Back to
                          website</b> </a>, Already user <a href="<?php echo base_url();?>login"> <b> Login Panel</b> </a>
                    </p>
                  </div>
                  <!--<div class="col-md-2">-->
                  <!--  <img src="<?php echo base_url();?>assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">-->
                  <!--</div>-->
                </div>
            	<div class="row"> 
					 <!-- <div class="col-md-12 space20">
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
                    			<button type="submit" class= "btn btn-success">Create Subscriber</button>
                    		</div>
               			</div>               
               		</div>	  -->
            	</div>
            </div>
            </form>
         
            </div>
          </div>
         </div> 
    </div>       
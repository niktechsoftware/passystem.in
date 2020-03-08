<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">New Employee Registration </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to Employee Registration Area </h3>
		         Here you can Register New Employee  by filling this form.
		         
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Employee Registration is Successfully Done!!!!!
							</div>
							<?php }?>
						</div>
				<form action="<?php echo base_url();?>index.php/employeeController/saveEmp"  method ="post" role="form" id="form">
			
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Employee Name<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                                    <input type="text" name="e_name" id="name" class="form-control"  style="text-transform:uppercase"
                                  onkeyup="customerName()"  onkeypress="return isalphabate(event)" required="" >
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Father Name<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                            <input type="text" name="fname" id="fname"  onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			        onkeyup="fatherName()" required="required" >
                              <span class=""></span>
                              </div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Mobile Number<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                   				 <input type="text" pattern="^[6-9]\d{9}$" name="mobile" id="contactno" onkeypress="return isNumber(event)" maxlength="10" name="mob_no" class="form-control" required>
                             <span class="" id="messageno"></span>
                             </div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Email
                    		</div>
                			<div class="col-md-8">
                            <input type="text" name="email" id="email" onkeyup="emailId()" class="form-control"  >
                             <span id="emailID" style="color:red;" class=""></span>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Date Of Birth<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                                    <input type="date" name="dob" id="date-input"  onchange="getObject();" class="form-control" required="" >
                              <span class="" id="valid"></span>
                              </div>
                   		</div>
                   		<div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Address<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                                    <input  type="text" id="address" name="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase" required="" >
                             <span class=""></span>
                             </div>
                   		</div>               
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 State<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                                    <input type="text" name="state" id="customerstate" value="UP" class="form-control"style="text-transform:uppercase"
                               onkeyup="customerState()" required>
                             <span class="" id="messagee"></span>
                             </div>
                   		</div>
                   		<div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Pin Code<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                                    <input type="text" id="pincode" name="pincode" class="form-control" required="" onkeypress="return isNumber(event)" pattern="^[2-9]\d{5}$" maxlength="6" minlength="6">
                             <span class=""></span>
                             </div>
                   		</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Country<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                            <input type="text" id="country" name="country" value="India" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerCity()" required="" >
                             <span class=""></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Aadhaar Number<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                            <input type="text" class="form-control" data-type="adhaar-number" id="aadhar" onkeypress="return isNumber(event)"  minlength="14" maxlength="14" name="aadhar" required >
                            <span class="" style="color:red" id="aadharmsg"></span>
                            </div>
               			</div> 
                   		              
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Employee Type<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                    			<?php if($empType->num_rows()>0){
                                    $emp= $empType->result();
                                    ?>
                                        <select class="form-control" name="emptype" id="emptype" required="required">
                                            <option value="">-Select Employee Type-</option>
                                            <?php foreach($emp as $row):?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->type; ?></option>
                                            <?php
                                                endforeach;?>
                                        </select>
                                    <?php
                                }?>
                    		</div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Employee SubType<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                    			<select class="form-control" id="empSubType" name="empSubType" required="required">
                                </select>
                    		</div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Branch Name<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                    			<?php if($branch->num_rows()>0){
                            $bname= $branch->result();
                                    ?>
                                        <select class="form-control" name="branch" id="branch" required="required">
                                            <option value="">-Select Branch Name-</option>
                                            <?php foreach($bname as $row1):?>
                                            <option value="<?php echo $row1->id;?>"><?php echo $row1->b_name; ?></option>
                                            <?php
                                                endforeach;?>
                                        </select>
                                    <?php
                                }?>
                    		</div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Sub Branch Name
                    		</div>
                			<div class="col-md-8">
                    			<select class="form-control" id="subbranch" name="subbranch" >
                                </select>
                    		</div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Password<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                            <input type="password" id="password" name="password" class="form-control" required="" >
                             <span class="form-bar"></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Confirm Password<span class="symbol required"></span>
                    		</div>
                			<div class="col-md-8">
                            <input type="password" id="conformpassword" style="text-transform:uppercase" name="" class="form-control" required="" >
                            <span class="form-bar" id="message"></span>
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
                    			<button type="submit" class= "btn btn-success">submit</button>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            </form>
            </div>
          </div>
         </div> 
    </div>       
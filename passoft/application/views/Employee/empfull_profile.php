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
		          <h3 class="media-heading text-center">Welcome to Update Employee </h3>
		         Here you can Update Employee Details by filling this form.
		         
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==0){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Employee Detail Update is Successfully Done!!!!!
							</div>
							<a href="<?php echo base_url();?>login/index" class="btn btn-success">Back</a>
							<?php }?>
						</div>
                        <?php if($view->num_rows()>0){
                            $row= $view->row();?>
							
				<form action="<?php echo base_url();?>index.php/employeeController/updateEmp/<?php echo $row->id;?>"  method ="post" role="form" id="form" enctype="multipart/form-data" >
                <div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-10">

                   				 <img src="<?php echo $this->config->item('asset_url'); ?>/images/employee/<?php echo $row->photo;?>" style="width:100px;height:90px;">
                   				<input type="file" name="image"/>
								<span style="color:brown;">Image Size less than 50kb</span>
                                   </div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Username
                    		</div>
                			<div class="col-md-8">
                            <input type="text" name="Username" id="username"  onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			         required="" value="<?php echo $row->username;?>"readonly="readonly">
                              <span class=""></span>
                              </div>
               			</div>               
               		</div>	 
            	</div>
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Employee Name</div>
                   				 <div class="col-md-8">
                                    <input type="text" name="e_name" id="name" class="form-control"  style="text-transform:uppercase"
                                  onkeyup="customerName()"  onkeypress="return isalphabate(event)" required="" value="<?php echo $row->name;?>">
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Father Name
                    		</div>
                			<div class="col-md-8">
                            <input type="text" name="fname" id="fname"  onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			        onkeyup="fatherName()" required="" value="<?php echo $row->father_name;?>">
                              <span class=""></span>
                              </div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Mobile Number</div>
                   				 <div class="col-md-8">
                   				 <input type="text" pattern="^[6-9]\d{9}$" name="mobile" value="<?php echo $row->mobile;?>" readonly id="contactno" onkeypress="return isNumber(event)" maxlength="10" name="mob_no" class="form-control" required>
                             <span class="" id="messageno"></span>
                             </div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Email
                    		</div>
                			<div class="col-md-8">
                            <input type="text" name="email" id="email" onkeyup="emailId()" class="form-control"  required value="<?php echo $row->email;?>">
                             <span id="emailID" style="color:red;" class=""></span>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Date Of Birth</div>
                   				 <div class="col-md-8">
                                    <input type="date" name="dob" id="date-input"  onchange="getObject();" class="form-control" required="" value="<?php echo $row->dob;?>">
                              <span class="" id="valid"></span>
                              </div>
                   		</div>
                   		<div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Address</div>
                   				 <div class="col-md-8">
                                    <input  type="text" id="address" name="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase" required="" value="<?php echo $row->address;?>">
                             <span class=""></span>
                             </div>
                   		</div>               
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 State</div>
                   				 <div class="col-md-8">
                                    <input type="text" name="state" id="customerstate" value="<?php echo $row->state;?>" class="form-control"style="text-transform:uppercase"
                               onkeyup="customerState()" required>
                             <span class="" id="messagee"></span>
                             </div>
                   		</div>
                   		<div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Pin Code</div>
                   				 <div class="col-md-8">
                                    <input type="text" id="pincode" name="pincode" class="form-control" required="" onkeypress="return isNumber(event)" pattern="^[2-9]\d{5}$" maxlength="6" minlength="6" value="<?php echo $row->pincode;?>">
                             <span class=""></span>
                             </div>
                   		</div>               
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Country
                    		</div>
                			<div class="col-md-8">
                            <input type="text" id="country" name="country" value="<?php echo $row->country;?>" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerCity()" required="" >
                             <span class=""></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Aadhaar Number
                    		</div>
                			<div class="col-md-8">
                            <input type="text" class="form-control" data-type="adhaar-number" id="aadhar" onkeypress="return isNumber(event)"  minlength="14" maxlength="14" name="aadhar" required value="<?php echo $row->aadhar_no;?>">
                            <span class="" style="color:red" id="aadharmsg"></span>
                            </div>
               			</div> 
                   		              
               		</div>	 
            	</div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 EmpLoyee Type
                    		</div>
                			<div class="col-md-8">
							<input type="hidden" name="empType" value="<?php echo $row->emp_type;?>">
							<?php $this->db->where('id',$row->emp_type);
							$empType=$this->db->get('emp_type')->row();?>
                    			<input type="text" class="form-control" name="" value="<?php echo $empType->type;?>" readonly>
                    		</div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Employee SubType
                    		</div>
                			<div class="col-md-8">
							<input type="hidden" name="empsubType" value="<?php echo $row->emp_subtype;?>">
							<input type="text" class="form-control" name="" value="<?php if($row->emp_subtype==0){ echo "None";}
							else { $this->db->where('id',$row->emp_subtype);
							$empsubtype=$this->db->get(' emp_sub_type')->row(); echo $empsubtype->sub_type;}?>" readonly>
                    		</div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Branch Name
                    		</div>
                			<div class="col-md-8">
							<input type="hidden" name="district" value="<?php echo $row->district;?>">
							<?php $this->db->where('id',$row->district);
							$branch=$this->db->get('branch')->row(); 
						?>
                            <input type="text" class="form-control" name="" value="<?php echo $branch->b_name;?>" readonly>
                    		</div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Sub Branch Name
                    		</div>
                			<div class="col-md-8">
							<input type="hidden" name="subBranch" value="<?php echo $row->sub_branchid;?>">
							<?php $this->db->where('id',$row->sub_branchid);
							$subbranch=$this->db->get('sub_branch')->row(); ?>
                            <input type="text" class="form-control" name="" value="<?php echo $subbranch->bname;?>" readonly>
                    		</div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Password
                    		</div>
                			<div class="col-md-8">
                            <input type="text" id="password" name="password" class="form-control" required="" value="<?php echo $row->password;?>">
                             <span class="form-bar"></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Bank Name
                    		</div>
                			<div class="col-md-8">
                            <input type="text"  style="text-transform:uppercase" name="bank_name" class="form-control" required="" value="<?php echo $row->bank_name;?>">
                            <span class="form-bar" id="message"></span>
                            </div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Account No
                    		</div>
                			<div class="col-md-8">
                            <input type="text" id="acc_no" name="acc_no" class="form-control" required="" value="<?php echo $row->account_no;?>">
                             <span class="form-bar"></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				Branch Name
                    		</div>
                			<div class="col-md-8">
                            <input type="text"  style="text-transform:uppercase" name="branch_name" class="form-control" required="" value="<?php echo $row->branch_name;?>">
                            <span class="form-bar" id="message"></span>
                            </div>
               			</div> 
                   		              
               		</div>	 
            	</div>
                <div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   				IFSC Code
                    		</div>
                			<div class="col-md-8">
                            <input type="text" id="ifsc" name="ifsc" class="form-control" required="" value="<?php echo $row->ifsc_code;?>">
                             <span class="form-bar"></span>
                             </div>
               			</div> 
                     <div class="col-md-6">
                    		 <div class="col-md-4">
                   			
                    		</div>
                			<div class="col-md-8">
                           
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
                    			<button type="submit" class= "btn btn-success">Update Employee Details</button>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            </form>
                            <?php }?>
            </div>
          </div>
         </div> 
    </div>       
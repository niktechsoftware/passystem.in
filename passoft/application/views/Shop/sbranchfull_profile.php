<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title"> Shop Registration </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to New Shop Full Profile Area</h3>
		         Here you can see a  Shop Full Profile and update details also, by filling this form.
		          A Sub Branch Should be one  or more in a District..<p>Note: Image should be lessthan 50 kb </p>
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Shop  is Successfully Updated!!!!!
							</div>
							<?php }?>
						</div>
            <?php if($view->num_rows()>0){
              $row= $view->row();
              ?>
				<form action="<?php echo base_url();?>index.php/shopController/UpdateSubBranch/<?php echo $row->id;?>" method ="post" role="form" id="form" enctype="multipart/form-data">
			   <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-10">
                           <?php if(strlen($row->image)>0) {?>
                           <img src="<?php echo $this->config->item('asset_url'); ?>/images/subbranch/<?php echo $row->image;?>" style="width:100px;height:90px;">
                           <?php } else{
                             ?>
                             <img src="<?php echo $this->config->item('asset_url'); ?>/images/userlogo.png" style="width:100px;height:90px;">
                             <?php
                           }?>                          <input type="file" name="image"  />
                          <span style="color:brown;">Image should be lessthan 50 kb</span>
                          </div>
						  
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                          <!--  Image -->
                        </div>
                      <div class="col-md-8">
                        <!--   <input type="file" class="form-control" name="image"  /> -->
                        </div>
                    </div>               
                  </div>   
              </div>
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				Sub Branch Name<span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control"  name="bname" minlength="1" maxlength="30" style="text-transform:uppercase" required="required" onkeypress="return isalphabate(event)" value="<?php echo $row->bname;?>" readonly= "readonly"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Owner Name<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text"  class="form-control"  name="ownername"  minlength="1" maxlength="30" style="text-transform:uppercase" required="required" onkeypress="return isalphabate(event)" value="<?php echo $row->ownername;?>"/>
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
                   				 <input type="text"  class="form-control" name="mob_no" pattern="^[6-9]\d{9}$"  required="required" value="<?php echo $row->mob_no;?>" readonly= "readonly"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Aadhaar Number<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text" data-type="adhaar-number" class="form-control" name="adhar_no" minlength="14" maxlength="14" required ="required" value="<?php echo $row->adhar_no;?>" readonly= "readonly"/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
              <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           Pan Number<span class="symbol required"></div>
                           <div class="col-md-8">
                           <?php if($this->session->userdata("login_type")<3){
                           	?>
                           	 <input type="text"  class="form-control" name="pan_no"   id="panNumber" required="required"  maxlength="10" minlength="10" value="<?php echo $row->pan_no;?>"/>
                          
                           	<?php 
                           }
                           else{?>
                            <input type="text"  class="form-control" name="pan_no"   id="panNumber" required=""  maxlength="10" minlength="10" value="<?php echo $row->pan_no;?>"readonly= "readonly"/>
                          
                          <?php  }?>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                           GST Number
                        </div>
                      <div class="col-md-8">
                       <?php if($this->session->userdata("login_type")<2){
                           	?>
                          <input type="text"  class="form-control" name="gst_no" onkeypress="return isalphabate(event)" style="text-transform:uppercase"  value="<?php echo $row->gst_no;?>"/>
                        	<?php 
                           }
                           else{?>
                            <input type="text"  class="form-control" name="gst_no" onkeypress="return isalphabate(event)" style="text-transform:uppercase"  value="<?php echo $row->gst_no;?>" readonly= "readonly"/>
                        
                           
                          <?php  }?>
                        </div>
                    </div>               
                  </div>   
              </div>
                <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           Address<span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="address"  required="required" value="<?php echo $row->address;?>" style="text-transform:uppercase"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                          City<span class="symbol required">
                        </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" required="required" name="city" style="text-transform:uppercase" value="<?php echo $row->city;?>"/>
                        </div>
                    </div>               
                  </div>   
              </div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				  Branch Name</div>
                   				 <div class="col-md-8">
                   				     <?php $this->db->where('id',$row->district);
                   				     $b_row = $this->db->get('branch')->row();
                   				     ?>
                                     <input type="text"  class="form-control" name="shopname" value="<?php echo $b_row->name;?>" readonly/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Street<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text" class="form-control" name="street" onkeypress="return isalphabate(event)" style="text-transform:uppercase" required="required" value="<?php echo $row->street;?>"/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
                <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           PinCode<span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="number"  class="form-control" name="pin"  required="required" maxlenght="6" minlenght="6" pattern="^[2-9]\d{5}$" value="<?php echo $row->pin;?>"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                          City<span class="symbol required">
                        </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" required="required" name="city" style="text-transform:uppercase" onkeypress="return isalphabate(event)" value="<?php echo $row->city;?>"/>
                        </div>
                    </div>               
                  </div>   
              </div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Password</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="password"  required="required"value="<?php echo $row->password;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                           Email Id <span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="email"  class="form-control" name="email"  required="required"value="<?php echo $row->email_id;?>"/>
                          </div>
                      </div>              
               		</div>	 
            	</div>
              <div class="row"> 
           <div class="col-md-12 space20">
                  <div class="col-md-6">
                         <div class="col-md-4">
                           Bank Name
                        </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="bank_name" onkeypress="return isalphabate(event)" value="<?php echo $row->bank_name;?>" style="text-transform:uppercase"/>
                        </div>
                    </div>
                     <div class="col-md-6">
                    <div class="col-md-4">
                           Account Number</div>
                           <div class="col-md-8">
                           <input type="number"  class="form-control" name="acc_no" value="<?php echo $row->account_no;?>"/>
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
                          <input type="text" class="form-control" name="branch_name"  onkeypress="return isalphabate(event)" value="<?php echo $row->branch_name;?>"/>
                        </div>
                    </div> 
                     <div class="col-md-6">
                    <div class="col-md-4">
                           IFSC Code</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="ifsc" value="<?php echo $row->ifsc;?>" style="text-transform:uppercase"/>
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
                    			<button type="submit" class= "btn btn-success">Update Sub Branch</button>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            </form>
          <?php } ?>
            </div>
          </div>
         </div> 
    </div>       
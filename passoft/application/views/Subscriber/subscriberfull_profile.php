<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title"> Subscriber Full Profile </h4>
			</div>
			<div class="panel-body">
			
			<div class="col-md-12">
			<div class="alert alert-info">
		          <button data-dismiss="alert" class="close"></button>
		          <h3 class="media-heading text-center">Welcome to  Subscriber Full Profile Area</h3>
		         Here you can see a  Subscriber Full Profile and update details also, by filling this form.
		       
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
            <?php if($view->num_rows()>0){
              $row= $view->row();
              ?>
				<form action="<?php echo base_url();?>index.php/subscriberController/updateSubscriber/<?php echo $row->id;?>"  method ="post" role="form" id="form" enctype="multipart/form-data">
			   <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-10">
                           
                           <img src="<?php echo $this->config->item('asset_url'); ?>/images/subscriber/<?php echo $row->image;?>" style="width:100px;height:90px;">
                          <input type="file" name="image" />
                          <span style="color:brown;">Image should be lessthan 50 kb</span>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                         Joiner ID
                        </div>
                      <div class="col-md-8">
											<?php $this->db->where('id',$row->parentID);
										$joinerID =	$this->db->get('customers');
										if($joinerID->num_rows()>0){
											$row1= $joinerID->row();
											?>
                          <input type="text" class="form-control" name="joinerId" value="<?php echo $row1->name;?>"  readonly="readonly"/>
										<?php }?>
											  </div>
                    </div> 
										              
                  </div>   
              </div>
							<div class="row"> 
					 <div class="col-md-12 space20">
					 <div class="col-md-6">
                    <div class="col-md-4">
                          Username</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="username"  required="required"value="<?php echo $row->username;?>" readonly="readonly"/>
                          </div>
                      </div> 
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Password</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="password"  required="required" value="<?php echo $row->password;?>"/>
                   				</div>
                   		</div>
                   	             
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				Subscriber Name</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control"  name="name" minlength="1" maxlength="30" style="text-transform:uppercase" required="required" onkeypress="return isalphabate(event)" value="<?php echo $row->name;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Father Name
                    		</div>
                			<div class="col-md-8">
                    			<input type="text"  class="form-control"  name="father_name"  minlength="1" maxlength="30" style="text-transform:uppercase" required="required" onkeypress="return isalphabate(event)" value="<?php echo $row->father_name;?>"/>
                   				</div>
               			</div>               
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Mother Name</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="m_name"  required="required" style="text-transform:uppercase" onkeypress="return isalphabate(event)" value="<?php echo $row->m_name;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                           Date Of Birthday</div>
                           <div class="col-md-8">
                           <input type="date"  class="form-control" name="dob"  required="required"value="<?php echo $row->dob;?>"/>
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
                   				 <input type="text"  class="form-control" name="mob_no" pattern="^[6-9]\d{9}$"  required="required" value="<?php echo $row->mobile;?>" readonly= "readonly"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Email ID
                    		</div>
                			<div class="col-md-8">
                    			<input type="email"  class="form-control" name="email" required ="required" value="<?php echo $row->email;?>" />
                    		</div>
               			</div>               
               		</div>	 
            	</div>
							<div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           Address</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="address"    value="<?php echo $row->address;?>" style="text-transform:uppercase"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                           State
                        </div>
                      <div class="col-md-8">
                      <input type="text" class="form-control" name="state" style="text-transform:uppercase" onkeypress="return isalphabate(event)" value="<?php echo $row->state;?>"/>
                        </div>
                    </div>               
                  </div>   
              </div>
							<div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           District</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="district" onkeypress="return isalphabate(event)" required="required" value="<?php echo $bid->row()->b_name;?>" readonly="readonly"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                          Pin Code
                        </div>
                      <div class="col-md-8">
											<input type="number"  class="form-control" name="pin"  required="required" maxlenght="6" minlenght="6" pattern="^[2-9]\d{5}$" value="<?php echo $row->pin;?>"/>
                        </div>
                    </div>               
                  </div>   
              </div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Permanet Address</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="p_address"  required="required" style="text-transform:uppercase" onkeypress="return isalphabate(event)" value="<?php echo $row->pr_address;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                    Aadhar Number</div>
                           <div class="col-md-8">
                           <input type="text" data-type="adhaar-number" class="form-control" name="adhar_no" minlength="14" maxlength="14" required ="required" value="<?php echo $row->adhar;?>" readonly= "readonly"/>
                          </div>
                      </div>              
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
					 <div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Pan Number
                    		</div>
                			<div class="col-md-8">
                            <input type="text"  class="form-control" name="pan_no"   id="panNumber" required=""  maxlength="10" minlength="10" value="<?php echo $row->pan;?>"readonly= "readonly"/>
                    		</div>
               			</div> 
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Nominee Name1</div>
                   				 <div class="col-md-8">
														<input type="text"  class="form-control" name="nom1"  required="required"value="<?php echo $row->nom1;?>" style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
                   				</div>
                   		</div>
                                
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                             Nominee 1 Aadhar Number</div>
                   				 <div class="col-md-8">
                   				 <input type="text" data-type="adhaar-number" class="form-control" name="nom_ad1" minlength="14" maxlength="14" required ="required" value="<?php echo $row->nom_ad1;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                    Nominee 1 Relation</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="nom_rel1"  required="required"value="<?php echo $row->nom_rel1;?>" style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
                          </div>
                      </div>              
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                             Nominee Name 2</div>
                   				 <div class="col-md-8">
                   				 <input type="text" class="form-control" name="nom2"  required ="required" value="<?php echo $row->nom2;?>"  style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                    Nominee 2 Aadhar Number</div>
                           <div class="col-md-8">
                           <input type="text" data-type="adhaar-number" class="form-control" name="nom_ad2" minlength="14" maxlength="14" required ="required" value="<?php echo $row->nom_ad2;?>" />
                          </div>
                      </div>              
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
                     <div class="col-md-6">
                    <div class="col-md-4">
                    Nominee 2 Relation</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="nom_rel2"  required="required"value="<?php echo $row->nom_rel2;?>"/>
                          </div>
                      </div> 
											<div class="col-md-6">
                         <div class="col-md-4">
                         Gender
                        </div>
                      <div class="col-md-8">
                          <select class="form-control" name="gender">
                            <option>-Select Gender-</option>
                            <option value="Male" <?php if($row->gender == '0'): ?> selected="selected"<?php endif; ?>>Male</option>
                            <option value="Female" <?php if($row->gender == '1'): ?> selected="selected"<?php endif; ?>>Female</option>
                          </select>
                        </div>
                    </div>            
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Registration Fees</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="registerFee"  required="required"value="<?php echo $row->amount;?>" readonly="readonly"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                           Bank Name</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="bank_name"  value="<?php echo $row->bank_name;?>" style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
                          </div>
                      </div>              
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Account Number</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="account_no"  value="<?php echo $row->account_no;?>"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    <div class="col-md-4">
                           Branch Name</div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="branch_name"   value="<?php echo $row->branch_name;?>" style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
                          </div>
                      </div>              
               		</div>	 
            	</div>
							<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 IFSC Code</div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control" name="ifsc"  value="<?php echo $row->ifsc;?>" style="text-transform:uppercase" onkeypress="return isalphabate(event)"/>
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
                    			<button type="submit" class= "btn btn-success">Update Subsciber</button>
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
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
		          <h3 class="media-heading text-center">Welcome to New Shop Registration Area</h3>
		         Here you can Register a new Shop in your District, by filling this Registration form.
		          A Shop should be one in a district..
        		</div>
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i>Shop Registration is Successfully Done!!!!!
							</div>
							<?php }?> 
						</div>

				<form action="<?php echo base_url();?>index.php/shopController/saveSubBranch"  method ="post" role="form" id="form" enctype="multipart/form-data">
			
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				Shop Name<span class="symbol required"></span></div>
                   				 <div class="col-md-8">
                   				 <input type="text"  class="form-control "  name="bname" minlength="6" id="sbname" maxlength="30" style="text-transform:uppercase"    required="required" onkeypress="return isalphabate(event)" />
                   				<span id="namemsg"></span>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				Owner Name<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text"  class="form-control"  name="ownername"  minlength="" maxlength="30" style="text-transform:uppercase" required="required" onkeypress="return isalphabate(event)" />
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
                   				 <input type="text"  class="form-control" name="mob_no" pattern="^[6-9]\d{9}$"  onkeypress="return isNumber(event)" required="required" maxlength="10" minlength="10"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Aadhaar Number<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text" data-type="adhaar-number" class="form-control" id="aadhar" name="adhar_no" minlength="14" maxlength="14" onkeypress="return isNumber(event)" required ="required"/>
                    		    <span class="" style="color:red" id="aadharmsg"></span>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
              <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           Pan Number <span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="pan_no"   id="panNumber" required="required"  maxlength="10" minlength="10" style="text-transform:uppercase;"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                           GST Number
                        </div>
                      <div class="col-md-8">
                          <input type="text"  class="form-control" name="gst_no"  style="text-transform:uppercase;"  />
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
                           <input type="text"  class="form-control" name="address"  required="required"  style="text-transform:uppercase;" onkeyup="stuAddress()"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                          City <span class="symbol required">
                        </div>
                      <div class="col-md-8">
                          <input type="text" required="required" class="form-control" name="city" style="text-transform:uppercase"  onkeypress="return isalphabate(event)"/>
                        </div>
                    </div>               
                  </div>   
              </div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Select Branch <span class="symbol required"></div>
                   				 <div class="col-md-8">
                            <?php
                              if($this->session->userdata('login_type')== 1)
                              {
                                ?>
                                  <script>
                                  $(document).ready(function (){
                                      $.ajax({
                                        url : '<?php echo base_url();?>shopController/fetchBranch',
                                        type :'post',
                                        dataType: 'json',
                                        success : function (msg){
                                            $('#branch').html('');
                                            var c = '';
                                            c = "<option>---------select----------</option>";
                                            $.each(msg,function(i,item){
                                              c += '<option value='+item.id+'>'+item.b_name+'</option>';
                                            });
                                            $('#branch').html(c);
                                          },
                                        error : function (msg){
                                          alert('failed');
                                        }
                                    });
                                  });
                                </script>
                                <select id="branch" name="district" class="form-control" required="required">
                                </select>
                                <?php
                              }
                              else{?>
                                  <input type="hidden" class="form-control" name="district" value="<?php echo $bid->row()->id;?>">
                   				        <input type="text" readonly  class="form-control" name="district3"  required="required"
                                   value="<?php echo $bid->row()->b_name;?>" />
                                <?php
                              }
                            ?>
                            
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Street <span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="text" class="form-control" name="street" onkeypress="return isalphabate(event)" required="required"/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
                <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           PinCode <span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="text"  class="form-control" name="pin"  required="required" maxlenght="6" minlenght="6" pattern="^[2-9]\d{5}$" onkeypress="return isNumber(event)"/>
                          </div>
                      </div>
                     <div class="col-md-6">
                         <div class="col-md-4">
                           Image
                        </div>
                      <div class="col-md-8">
                          <input type="file" class="form-control" name="image"  />
                        </div>
                    </div>               
                  </div>   
              </div>
            	<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-4">
                   				 Password<span class="symbol required"></div>
                   				 <div class="col-md-8">
                   				 <input type="password"  class="form-control" name="password" id="password" required="required"/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-4">
                   				 Confirm Password<span class="symbol required">
                    		</div>
                			<div class="col-md-8">
                    			<input type="password" class="form-control" id="conformpassword" name="cpassword" />
                    			<span id="message1"></span>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
              <div class="row"> 
           <div class="col-md-12 space20">
                   <div class="col-md-6">
                    <div class="col-md-4">
                           Email Id <span class="symbol required"></div>
                           <div class="col-md-8">
                           <input type="email"  class="form-control" name="email"  required="required"/>
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                           Bank Name
                        </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="bank_name" onkeypress="return isalphabate(event)"  style="text-transform:uppercase"/>
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
                           <input type="text"  class="form-control" name="acc_no" onkeypress="return isNumber(event)"  style="text-transform:uppercase" />
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="col-md-4">
                           Branch Name
                        </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control" name="branch_name"  onkeypress="return isalphabate(event)"  style="text-transform:uppercase"/>
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
                           <input type="text"  class="form-control" name="ifsc"   style="text-transform:uppercase"/>
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
                    			<button type="submit" class= "btn btn-success">Create Sub Branch</button>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            </form>
            </div>
          </div>
         </div> 
    </div>       
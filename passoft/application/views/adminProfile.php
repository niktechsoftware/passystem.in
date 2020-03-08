<div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel">
                                                <div class="panel-heading panel-blue border-light">
                                                <center>  <h5 class="panel-title">Admin Full Profile</h5></center>
                                                </div>
                                                <div class="panel-body">
                   <div class="dt-responsive table-responsive">
              <table id="h" class="table table-striped table-bordered nowrap">
								 <?php 
								 $unm=$this->session->userdata("username");
              	 $this->db->where("admin_username",$unm);
                 $row= $this->db->get("general_settings")->row();
                  ?>
                
                  <tr>
                    
                    <td><strong> Owner Name</strong></td>
                    <td><?php echo $row->owner_name;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
										 <th><strong>Institute Name</strong></th>
                    <td><?php echo $row->institute_name;?></td>
                      
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                </tr>
                <tr>
								<th><strong>Mobile Number</strong></th>
                    <td><?php echo $row->mobile_number;?></td>
                      <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
											<th><strong>Email Id</strong></th>
                     <td><?php echo $row->email1;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                </tr>
               
                <tr>
                <th><strong>Address</strong></th>
                    <td><?php echo $row->address_1;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                     <th><strong>City Name</strong></th>
                    
                      <td><?php echo $row->city;?></td>
      
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                   
                      </tr>
											<tr>
                <th><strong>State Name</strong></th>
                    <td><?php echo $row->state;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                     <th><strong>Pin Code</strong></th>
                    
                      <td><?php echo $row->pin;?></td>
      
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                   
                      </tr>
                 <tr>
                    <th><strong>username</strong></th>
                    <td><?php echo $row->admin_username;?></td>
                     <td></td>
                       <th><strong>Password</strong></th>
                    <td><?php echo $row->admin_password;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                </tr>
                
                <!-- <tr>
                    <th><strong>Bank Name</strong></th>
                    <td><?php echo $row->bank_name;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                     
                     <th><strong>Account No.</strong></th>
                    <td><?php echo $row->	account_no;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
            
                </tr> -->
                <!-- <tr>
                    <th><strong>Branch Name</strong></th>
                    <td><?php echo $row->branch_name;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                     <th><strong>IFSC Code.</strong></th>
                    <td><?php echo $row->ifsc;?></td>
                     <td><a href="<?php echo base_url();?>adminController/adminedit/<?php echo $row->id;?>" ><i class="fa fa-pencil "></i></a></td>
                   
                </tr> -->
               
              
                
                
                 
                  
                 
                
              </table>
              </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>


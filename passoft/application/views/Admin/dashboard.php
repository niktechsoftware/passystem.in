
<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                <a href="<?php echo base_url();?>adminController/subcriberlist/3">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <span>Today's Permanent Inactive Subscribers</span>
	                	<br/>
	                	      <?php
															$d=date('Y-m-d');
                                                            $this->db->where('Date(created)',$d);
																$this->db->where("pstatus",1);
																$this->db->where('status',0);
														$totalbranch =$this->db->get('customers')->num_rows();
                                                          if( $totalbranch>0){?>
                                                          <h5 ><?php echo $totalbranch; ?></h5>
                                                    <?php }else{?>

                                                    <h5 ><?php echo "0"; ?></h5>
                                                    <?php }?>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                <a href="<?php //echo base_url();?>adminController/subcriberlist/5">
                <div class="padding-20 core-content">
                  
                    <h4 class="title block no-margin">Total Permanent Subscribers:</h4>
					<br/>
					<div class="row">
						<div class="col-sm-6">
						     <?php //$this->db->where("pstatus",1);
													//	$totalbranch =$this->db->get('customers')->num_rows();
                                                      //    if( $totalbranch>0){?>
						<h6 class="block no-margin"><?php //echo $totalbranch; ?></h6>
					
						</div>
						 <?php// }else{?>
						<div class="col-sm-6">
						<h6 class="block no-margin"><?php //echo 0; ?></h6>
						
						</div>
						<?php// } ?>
					</div>
					
					
                </div>
                </a>
            </div>
        </div>
    </div> -->
<!-- pcode -->

<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <div class="core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                   
					<a href="<?php echo base_url();?>subscriberController/subscActiveList">
					<div class="row" style="margin:15px;">
						<div class="col-lg-8">
                            <span>Total Subscribers:</span>
						</div>						 
						<div class="col-lg-4">
                            <?php $sb1 =$this->db->get('customers')->num_rows();
                                if( $sb1>0){?>
                            <span><?php echo $sb1; ?></span>
                            <?php }else{?>
                            <span><?php echo 0; ?></span>
                            <?php } ?>
						</div>						
					</div>
                    </a>
                    <div class="row" style="margin-right:35px;">
						<div class="col-lg-6">
                            <div class="col-lg-9">
                                <span> Permanent:</span>
                            </div>
                            <div class="col-lg-3">
                                <?php $this->db->where("pstatus",1);
                                $sb_p =$this->db->get('customers')->num_rows();
                                    if( $sb_p>0){?>
                                <span><?php echo $sb_p; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						 
						<div class="col-lg-6">
                            <div class="col-lg-9">
                                <span> Temporary:</span>
                            </div>
                            <div class="col-lg-3">
                                <?php $this->db->where("tstatus",1);
                                $sb_t =$this->db->get('customers')->num_rows();
                                    if( $sb_t>0){?>
                                <span><?php echo $sb_t; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						
					</div>

					
					
                </div>
               
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <div class="core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                   
					<a href="<?php echo base_url();?>adminController/subcriberlist/5">
					<div class="row" style="margin:15px;">
						<div class="col-lg-10">
                            <span>Permanent Subscribers:</span>
						</div>						 
						<div class="col-lg-2">
                            <?php $this->db->where("pstatus",1);
                            $sb_pp =$this->db->get('customers')->num_rows();
                                if( $sb_pp>0){?>
                            <span><?php echo $sb_pp; ?></span>
                            <?php }else{?>
                            <span><?php echo 0; ?></span>
                            <?php } ?>
						</div>						
					</div>
                    </a>
                    <div class="row" style="margin-right:10px;">
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span> Active:</span>
                            </div>
                            <div class="col-lg-6">
                                <?php $this->db->where("pstatus",1);
                                $this->db->where("status",1);
                                $sb_pA =$this->db->get('customers')->num_rows();
                                    if( $sb_pA>0){?>
                                <span><?php echo $sb_pA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						 
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span> Inactive:</span>
                            </div>
                            <div class="col-lg-6">
                                <?php $this->db->where("pstatus",1);
                                 $this->db->where("status",0);
                                $sb_pIA =$this->db->get('customers')->num_rows();
                                    if( $sb_pIA>0){?>
                                <span><?php echo $sb_pIA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						
					</div>			
					
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <div class="core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                   
					<a href="#">
					<div class="row" style="margin:15px;">
						<div class="col-lg-10">
                            <span>Temporary Subscribers:</span>
						</div>						 
						<div class="col-lg-2">
                            <?php $this->db->where("tstatus",1);
                            $sb_tt =$this->db->get('customers')->num_rows();
                                if( $sb_tt>0){?>
                            <span><?php echo $sb_tt; ?></span>
                            <?php }else{?>
                            <span><?php echo 0; ?></span>
                            <?php } ?>
						</div>						
					</div>
                    </a>
                    <div class="row" style="margin-right:10px;">
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span> Active:</span>
                            </div>
                            <div class="col-lg-6">
                                <?php $this->db->where("tstatus",1);
                                $this->db->where("status",1);
                                $sb_tA =$this->db->get('customers')->num_rows();
                                    if( $sb_tA>0){?>
                                <span><?php echo $sb_tA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						 
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span> Inactive:</span>
                            </div>
                            <div class="col-lg-6">
                                <?php $this->db->where("tstatus",1);
                                 $this->db->where("status",0);
                                $sb_tIA =$this->db->get('customers')->num_rows();
                                    if( $sb_tIA>0){?>
                                <span><?php echo $sb_tIA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                            </div>
						</div>						
					</div>			
					
                </div>
               
            </div>
        </div>
    </div> 
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <div class="core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                   
				
					<div class="row" style="margin:15px;">
						<div class="col-lg-10">
                            <span>Branch:</span>
						</div>						 
						<div class="col-lg-2">
                            <?php 
                            $branch =$this->db->get('branch')->num_rows();
                                if( $branch>0){?>
                            <span><?php echo $branch; ?></span>
                            <?php }else{?>
                            <span><?php echo 0; ?></span>
                            <?php } ?>
						</div>						
					</div>
                   
                    <div class="row" style="margin-right:10px;">
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span>Active:</span>
                            </div>
                            <div class="col-lg-6">
                              <a href="<?php echo base_url();?>branchController/branchListActive">  <?php 
                                $this->db->where("status",1);
                                $branch_A =$this->db->get('branch')->num_rows();
                                    if( $branch_A>0){?>
                                <span><?php echo $branch_A; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?></a>
                            </div>
						</div>						 
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span> Inactive:</span>
                            </div>
                            <div class="col-lg-6">
                                 <a href="<?php echo base_url();?>branchController/branchListinActive"><?php 
                                 $this->db->where("status",0);
                                $branch_IA =$this->db->get('branch')->num_rows();
                                    if( $branch_IA>0){?>
                                <span><?php echo $branch_IA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                                </a>
                            </div>
						</div>						
					</div>			
					
                </div>
               
            </div>
        </div>
    </div> 
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <div class="core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                   
					<div class="row" style="margin:15px;">
						<div class="col-lg-10">
                            <span>Shop:</span>
						</div>						 
						<div class="col-lg-2">
                            <?php 
                            $subbranch =$this->db->get('sub_branch')->num_rows();
                                if( $subbranch>0){?>
                            <span><?php echo $subbranch; ?></span>
                            <?php }else{?>
                            <span><?php echo 0; ?></span>
                            <?php } ?>
						</div>						
					</div>
                  
                    <div class="row" style="margin-right:10px;">
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span>Active:</span>
                            </div>
                            <div class="col-lg-6">
                                 <a href="<?php echo base_url();?>shopController/subBranchList"><?php 
                                $this->db->where("status",1);
                                $subbranch_A =$this->db->get('sub_branch')->num_rows();
                                    if( $subbranch_A>0){?>
                                <span><?php echo $subbranch_A; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                                </a>
                            </div>
						</div>						 
						<div class="col-lg-6">
                            <div class="col-lg-6">
                                <span>Inactive:</span>
                            </div>
                            <div class="col-lg-6">
                                <a href="<?php echo base_url();?>shopController/subBranchInactiveList"> <?php 
                                 $this->db->where("status",0);
                                $subbranch_IA =$this->db->get('sub_branch')->num_rows();
                                    if( $subbranch_IA>0){?>
                                <span><?php echo $subbranch_IA; ?></span>
                                <?php }else{?>
                                <span><?php echo 0; ?></span>
                                <?php } ?>
                                </a>
                            </div>
						</div>						
					</div>			
					
                </div>
               
            </div>
        </div>
    </div> 

    <!-- /////////////////// -->
   

    <!-- ///////// -->
       
<!-- pcode end -->
<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="<?php echo base_url();?>adminController/inactivesubcriberlist/3">
                <div class="padding-20 core-content">
                    <span>Today's Temporary Inactive Subscribers</span>
                    <br/>
                      <?php 
															   $d=date('Y-m-d');
                                                            $this->db->where('Date(created)',$d);
                                                             $this->db->where("status",0);
															   $this->db->where("tstatus",1);
														$totalbranch =$this->db->get('customers')->num_rows();
                                                          if( $totalbranch>0){?>
                                                         
                                                  

                    <span class="subtitle">  <?php echo $totalbranch; ?> </span>
                      <?php } else{?>
                      <span class="subtitle">  <?php echo 0; ?> </span>
                      <?php } ?>
                </div>
                </a>
            </div>
        </div>
    </div>
    
    <!--/////////////-->
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
               
                <div class="padding-20 core-content">
                     <a href="<?php echo base_url(); ?>adminController/adminorderapprove/3">
                   <span>Today's Order Hold Invoice</span>
                    <br/>
                      <?php 
					   $count=0;
					   $cust=  $this->db->get('customers')->result();
                        foreach($cust as $data)
                        {
                            $d=date('Y-m-d');
                            $this->db->where('Date(order_date)',$d);
							$this->db->where('cust_id',$data->id);
							$this->db->where('status',0);
							$order=  $this->db->get('order_serial')->num_rows();
							$count=$count+$order;
						}
                  if( $count>0){?>


                    <span class="subtitle">  <?php echo $count; ?> </span>
                      <?php } else{?>
                      <span class="subtitle">  <?php echo 0; ?> </span>
                      <?php } ?>
                       </a>
                      <br>
                        <a href="<?php echo base_url(); ?>adminController/adminorderapprove/5">
                       <span>Total Order Hold Invoice:</span><br>
        	             <div class="row">
                 <?php 
        		$count=0;
        		   $cust=  $this->db->get('customers')->result();
                    foreach($cust as $data)
                    {
        				$this->db->where('cust_id',$data->id);
        				$this->db->where('adminpayment_receive',0);
        				$order=  $this->db->get('order_serial')->num_rows();
        				$count=$count+$order;
        			}
              if( $count>0){?>
					   <div class="col-sm-6">
					   <span><?php echo $count;?></span>
						
					   </div>
					    <?php }else{?>
					   <div class="col-sm-6">
					   <span><?php echo 0;?></span>
					  
					   <!-- <span class="subtitle">Total Todays Enroll New Students. </span> -->
					 
					   </div>
					    <?php } ?>
					    </a>
                </div>
               
            </div>
        </div>
    </div>
   
    <!--.................-->
    <!--<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/schedulingReport">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Time Table</h4>
                    <br/>
                    <span class="subtitle"> Access the time table. </span>
                </div>
                </a>
            </div>
        </div>
	</div>-->
	<!-- <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-blue text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                   
                    	
                </div>
                <a href="<?php //echo base_url();?>adminController/inactivesubcriberlist/5">
				<div class="padding-20 core-content">
				  
				   <h4 class="title block no-margin"> Total Temporary Subscribers :</h4><br>
				   <div class="row">
				                                    <?php //$this->db->where("tstatus",1);
													//	$totalbranch =$this->db->get('customers')->num_rows();
                                                         // if( $totalbranch>0){?>
					   <div class="col-sm-6">
					   <h6 class="block no-margin"><?php //echo $totalbranch;?></h6>
						
					   </div>
					    <?php// }else{?>
					   <div class="col-sm-6">
					   <h6 class="block no-margin"><?php //echo 0;?></h6>
					  
					   
					 
					   </div>
					    <?php// } ?>
				   </div>
				  
                </div>
                </a>
            </div>
        </div>
    </div> -->
    

</div>






<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                <a href="<?php echo base_url();?>adminController/showotherlist/3">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <span>Today's Other<br> Product<br> Demand</span>
	                	<br/>
	                	      <?php 
                                    $d=date('Y-m-d');
                                $this->db->where('Date(date)',$d);
									$totalbranch =$this->db->get('demand_list')->num_rows();
                              if( $totalbranch>0){?>
                              <span><?php echo $totalbranch; ?></span>
                        <?php }else{?>

                        <span><?php echo "0"; ?></span>
                        <?php }?>
	                </div>
                </a>
            </div>
        </div>
    </div>
  
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                <a href="<?php echo base_url();?>adminController/showotherlist/5">
                <div class="padding-20 core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                    <span>Total Other Product Demand:</span>
					<br/>
					<div class="row">
						<div class="col-sm-6">
						     <?php $totalbranch =$this->db->get('demand_list')->num_rows();
                                                          if( $totalbranch>0){?>
                                                         
						<span><?php echo $totalbranch; ?></span>
					
						</div>
						 <?php }else{?>
						<div class="col-sm-6">
						<span><?php echo 0; ?></span>
						
						</div>
						<?php } ?>
					</div>
					
					
                </div>
                </a>
            </div>
        </div>
    </div>
<!--'''''''''''''''''''-->

<!--//////////////////////-->

    <!--<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/schedulingReport">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Time Table</h4>
                    <br/>
                    <span class="subtitle"> Access the time table. </span>
                </div>
                </a>
            </div>
        </div>
	</div>-->


</div>


<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                 <?php $id=$this->session->userdata('id');
                $this->db->where('id',$id);
                $value=   $this->db->get('general_settings')->row();
                  ?>
                <a href="#">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <h3 class="title block no-margin">Owner Name-<?php echo $value->owner_name;?></h3>
	                  <p>(Admin)</p>
	                	<br/>
	                	  <div class="panel-body">
                             <h6 >Information</h6>
                              <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Owner Name</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->owner_name;?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Username</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->admin_username;?></h6>
                            </div>
                        </div>
                             <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->email1;?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Phone</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->mobile_number;?></h6>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Address</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->address_1;?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">City</p>
                                <h6 class="text-muted f-w-400"><?php echo $value->city;?></h6>
                            </div>
                        </div>
                        
                       

                        <!--<h5 ><?php// echo "0"; ?></h5>-->
                     
	                </div>
                </a>
            </div>
        </div>
    </div>
    </div>

<!--<div class="col-md-6 col-lg-3 col-sm-6">-->
<!--        <div class="panel panel-default panel-white core-box">-->
<!--            <div class="panel-body no-padding">-->
<!--                <div class="partition-pink text-center core-icon">-->
<!--                    <i class="fa fa-users fa-2x icon-big"></i>-->
<!--                     <br>-->
<!--                    	<span class="subtitle"> </span>-->
<!--                </div>-->
                <!--<a href="<?php echo base_url(); ?>adminController/adminsubscriberdemandList/3">-->
                <!--<div class="padding-20 core-content">-->
                <!--    <span>Today's Product<br> Demand<br> List</span>-->
                <!--    <br/>-->
                      <?php 
    //                   $d=date('Y-m-d');
    //                     $this->db->where('Date(date)',$d);
				// 	$favourite_list =$this->db->get('favourite_list')->num_rows();
				// 	$totalbranch =$favourite_list;
				
					
    //                   if( $totalbranch>0){
                      ?>
                     
              

                    <!--<span class="subtitle">  <?php //echo $totalbranch; ?> </span>-->
                      <?php // } else{?>
                      <!--<span class="subtitle"> -->
                      <?php //echo 0; ?>
                      <!--</span>-->
                      <?php //} ?>
                <!--</div>-->
                <!--</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/schedulingReport">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Time Table</h4>
                    <br/>
                    <span class="subtitle"> Access the time table. </span>
                </div>
                </a>
            </div>
        </div>
	</div>-->
	<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-blue text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                   
                    	<!-- <span class="subtitle"> -->
                </div>
                
				<div class="padding-20 core-content">
				   <!-- <h4 class="title block no-margin">Student Admission</h4>-->
				   <h4 class="title block no-margin">Total Product Demand List </h4><br>
				   <a href="<?php echo base_url(); ?>adminController/adminsubscriberdemandList/5">
				   Click Here </a>
	             <!--<div class="row">-->
                    <?php 
						
				// 		$favourite_list =$this->db->get('favourite_list')->num_rows();
					
    //                       if($favourite_list>0){?>
					   <!--<div class="col-sm-6">-->
					   <!--<h6 class="block no-margin">-->
					       <?php // echo $favourite_list;?>
					       <!--</h6>-->
						
					   <!--</div>-->
					    <?php // }else{ ?>
					   <!--<div class="col-sm-6">-->
					   <!--<h6 class="block no-margin"><?php echo 0;?></h6>-->
					  
					   <!-- <span class="subtitle">Total Todays Enroll New Students. </span> -->
					 
					   <!--</div>-->
					    <?php // } ?>
				   <!--</div>-->
				  
                </div>
               
            </div>
        </div>
    </div>
    

</div>


</div>

                         
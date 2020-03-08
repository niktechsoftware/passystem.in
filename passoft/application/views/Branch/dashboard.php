
<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                <a href="<?php echo base_url()?>/index.php/subscriberController/subscActiveList">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <h5 class="title block no-margin">Today's Registered Subscribers</h5>
	                <div>
                         <?php 
								 $d=date('Y-m-d');
							//	 print_r($d);
                             $this->db->where('district',$this->session->userdata('id'));
                            $this->db->where('Date(created)',$d);
								$totalbranch =$this->db->get('customers')->num_rows();
								//print_r($totalbranch);
                          if( $totalbranch>0){?>
                    <h5 class=""><?php echo $totalbranch; ?> </h5>
                    <?php }else{?>
                                                   
                    <h5 class=""><?php echo "0"; ?></h5>
                    <?php }?>
	                </div>
	                	<br/>
	                	<span class="subtitle"> Total Subscribers:  </span>
                            <?php
								 $this->db->where('district',$this->session->userdata('id'));
                                $totalbranch =$this->db->get('customers')->num_rows();
                              //  print_r($this->session->userdata('id'));
                                  if( $totalbranch>0){?>
                            <label><?php echo $totalbranch; ?></label>
                            <?php }else{?>

                            <label><?php echo "0"; ?></label>
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
                <a href="<?php echo base_url(); ?>index.php/shopController/subBranchList">
                <div class="padding-20 core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                    <h5 class="title block no-margin">ActiveSub Branch</h5>
                    <?php $id= $this->session->userdata('id');
                    $this->db->where('district',$id);
                    $total= $this->db->get('sub_branch');
                    if($total->num_rows()>0){
                    $total1=$total->num_rows();?>
                        <h6 class="">
                        <?php echo $total1; ?></h6></a>
                        <?php }else{ ?> <h6 class="text-white m-b-0"><?php echo "No Any Subscriber"; ?></h6>
                        <?php } ?> 
                    
					<br/>
					<!--<div class="row">-->
					<!--	<div class="col-sm-6">-->
					<!--	<h6 class="block no-margin">Debit Amount</h6>-->
					
					<!--	</div>-->
					<!--	<div class="col-sm-6">-->
					<!--	<h6 class="block no-margin">Credit Amount</h6>-->
						
					<!--	</div>-->
					<!--</div>-->
					
					
                </div>
                </a>
            </div>
        </div>
    </div>

<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="<?php echo base_url()?>/index.php/subscriberController/subsciberActiveList">
                <div class="padding-20 core-content">
                    <h5 class="title block no-margin">Today Active Subscriber List</h5>
                    <div>
                    <?php 
							   $d=date('Y-m-d');
                             $this->db->where('district',$this->session->userdata('id'));
                            $this->db->where('Date(created)',$d);$this->db->where("status",1);
						$totalbranch =$this->db->get('customers')->num_rows();
                          if( $totalbranch>0){?>
                    <h5 class=""><?php echo $totalbranch; ?>
                    <?php }else{?>

                    <h4 class=""><?php echo "0"; ?></h4>
                    <?php }?>
                    </div>
                    <br/>
                    <span class="subtitle"> Total. </span>
                    <div>
                    <?php $this->db->where("status",1);
                            $this->db->where('district',$this->session->userdata('id'));
							$totalbranch =$this->db->get('customers')->num_rows();
                              if( $totalbranch>0){?>
                        <label><?php echo $totalbranch; ?></label>
                        <?php }else{?>
                        <label><?php echo "0"; ?></label>
                        <?php }?>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
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
                <a href="<?php echo base_url(); ?>index.php/subscriberController/perSubscriber">
				<div class="padding-20 core-content">
				   <!-- <h4 class="title block no-margin">Student Admission</h4>-->
				   <h5 class="title block no-margin"> Today Permanent Subscriber</h5><br>
				   <div class="row">
					   <div class="col-sm-6">
						 <div class="">
                             <?php 
							$d=date('Y-m-d');
								 $this->session->userdata('id');
                                 $this->db->where('district',$this->session->userdata('id'));
                                $this->db->where('Date(created)',$d);
                                $this->db->where("pstatus",1);
							$totalbranch =$this->db->get('customers')->num_rows();
                              if( $totalbranch>0){?>
                        <h5 class=""><?php echo $totalbranch; ?>
                        <?php }else{?>
                        <h5 class=""><?php echo "0"; ?></h5>
                        <?php }?>
                                                             
					   </div>
					   <div class="col-sm-6">
					   <h6 class="block no-margin">Total</h6>
                            <?php 
							 $this->db->where('district',$this->session->userdata('id'));
							$this->db->where("pstatus",1);
							$totalbranch =$this->db->get('customers')->num_rows();
                              if( $totalbranch>0){?>
                        <label><?php echo $totalbranch; ?></label>
                        <?php }else{?>
                        <label><?php echo "0"; ?></label>
                        <?php }?>
					   <!-- <span class="subtitle">Total Todays Enroll New Students. </span> -->
					 
					   </div>
				   </div>
				  
                </div>
                </a>
            </div>
        </div>
    </div>
    

</div>

</div>
<!---2nd row start---->

<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                <a href="<?php echo base_url()?>/index.php/subscriberController/tempSubscriber">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <h6 class="title block no-margin">Today's Temporary Subscribers</h6>
	                <div class="col-4 text-right">
                       <?php 
					   $d=date('Y-m-d');
                     $this->db->where('district',$this->session->userdata('id'));
                    $this->db->where('Date(created)',$d);$this->db->where("tstatus",1);
				$totalbranch =$this->db->get('customers')->num_rows();
                  if( $totalbranch>0){?>
                    <h6 class=""><?php echo $totalbranch; ?>
                    <?php }else{?>
                    <?php echo "0"; ?></h6>
                    <?php }?>
					</div>
	                	<br/>
	                	<span class="subtitle"> Total Subscribers:  </span>
                        <?php 
						 $this->db->where('district',$this->session->userdata('id'));
						$this->db->where("tstatus",1);
						$totalbranch =$this->db->get('customers')->num_rows();
                          if( $totalbranch>0){?>
                    <label><?php echo $totalbranch; ?></label>
                    <?php }else{?>
                    <label><?php echo "0"; ?></label>
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
                <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberdemandList">
                <div class="padding-20 core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                    <h6 class="title block no-margin">Today's Demand List</h6>
                    <?php 
					$stckdt=$this->db->get('stock_products')->num_rows();
					$favourite_list =$this->db->get('favourite_list')->num_rows();
					$totalbranch =$stckdt-$favourite_list;
                      if( $totalbranch>0){?>
                <h5 class="text-white m-b-0"><?php echo $totalbranch; ?>
                <?php }else{?>
                <h6 class="text-white m-b-0"><?php echo "0"; ?></h6>
                <?php }?>
					<br/>
					<span class="subtitle"> Total:  </span>
             <?php 
					$stckdt=$this->db->get('stock_products')->num_rows();
					$favourite_list =$this->db->get('favourite_list')->num_rows();
					$totalbranch =$stckdt-$favourite_list;
                      if( $totalbranch>0){?>
                <label><?php echo $totalbranch; ?></label>
                <?php }else{?>
                <label><?php echo "0"; ?></label>
                <?php }?>
                </div>
                </a>
            </div>
        </div>
    </div>

<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="<?php echo base_url()?>/index.php/subscriberController/subscriberOtherDemandList">
                <div class="padding-20 core-content">
                    <h5 class="title block no-margin">Today Other Product Demand List</h5>
                    <div>
                    <?php 
                         $d=date('Y-m-d');
                         $this->db->where('district',$this->session->userdata('id'));
                         $dt= $this->db->get('sub_branch')->result();
                         $todayTotal=0;
                         foreach($dt as $row):
                          $dtt=  $row->id;
                         $this->db->where('Date(date)',$d);
                            $this->db->where('sub_branchid',$dtt);
                        $totalbranch =$this->db->get('demand_list');
                         if( $totalbranch->num_rows()>0){?>
                      <?php $todayTotal += $totalbranch->num_rows(); ?>
                      <?php  }  endforeach; echo $todayTotal; ?>
                    </div>
                    <br/>
                    <span class="subtitle"> Total. </span>
                    <div>
                    <?php 
                    $this->db->where('district',$this->session->userdata('id'));
                    $dt= $this->db->get('sub_branch')->result();
                    $Total=0;
                    foreach($dt as $row):
                     $dtt=  $row->id;
                       $this->db->where('sub_branchid',$dtt);
                     $totalbranch =$this->db->get('demand_list');
                      if( $totalbranch->num_rows()>0){?>
                <label><?php $Total += $totalbranch->num_rows(); ?></label>
                <?php }endforeach; echo $Total;?>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
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
                <a href="<?php echo base_url(); ?>index.php/branchController/paidInvoice">
				<div class="padding-20 core-content">
				   <!-- <h4 class="title block no-margin">Student Admission</h4>-->
				   <h5 class="title block no-margin"> Today Paid Invoice</h5><br>
				   <div class="row">
					   <div class="col-sm-6">
                           <?php  
                           $count=0;
                           $this->db->where('district',$this->session->userdata('id'));
                            $cust=  $this->db->get('customers')->result();
                            foreach($cust as $data)
                            { $d=date('Y-m-d');
                            $this->db->where('cust_id',$data->id);
                            $this->db->where('Date(order_date)',$d);
                               $this->db->where('status',1);
                             $order=  $this->db->get('order_serial')->num_rows();
                             $count=$count+$order; }
                      if( $count>0){?>
                <h6 class=""><?php echo $count; ?>
                <?php }else{?>
                <?php echo "0"; ?></h6>
                <?php }?>
				</div>
					   <div class="col-sm-6">
					   <h6 class="block no-margin">Total</h6>
                            <?php 
                            $count=0;
                            $this->db->where('district',$this->session->userdata('id'));
                                    $cust=  $this->db->get('customers')->result();
                                    foreach($cust as $data)
                                    { $this->db->where('cust_id',$data->id);
                                       $this->db->where('status',1);
                                     $order=  $this->db->get('order_serial')->num_rows();

                                     $count=$count+$order; }
                              if( $count>0){?>
                        <label><?php echo $count; ?></label>
                        <?php }else{?>

                        <label><?php echo "0"; ?></label>
                        <?php }?>
					   <!-- <span class="subtitle">Total Todays Enroll New Students. </span> -->
					 
					   </div>
				   </div>
				  
                </div>
                </a>
            </div>
        </div>
    </div>
    

</div>

</div>
<!---2nd row end---->



<!-- end: PAGE CONTENT-->
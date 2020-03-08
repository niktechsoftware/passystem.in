
<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
               <!-- <a href="<?php echo base_url();?>shopController/shoptotal">-->
               <a href="#">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <h3 class="title block no-margin">Total Collection</h3>
	                
	                	<br/>
	                	<?php    $id= $this->session->userdata('username');
                            $date=date("y-m-d");
                       $this->db->select_sum('amount');
                       
                      // $this->db->where('pay_date',$date);
                       $this->db->where('paid_to',$id);
                    $val=$this->db->get('day_book')->row();?>
	                	<!--<span class="subtitle"> <a href="<?php echo base_url();?>shopController/shoptotal"><?php if($val->amount>0){ echo "Rs".$val->amount."/-"; } else { echo "0"; } ?></a></span>-->
	                <span class="subtitle"> <a href="#"><?php if($val->amount>0){ echo "Rs".$val->amount."/-"; } else { echo "0"; } ?></a></span>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <!--<div class="col-md-6 col-lg-3 col-sm-6">-->
    <!--    <div class="panel panel-default panel-white core-box">-->
    <!--        <div class="panel-body no-padding">-->
    <!--            <div class="partition-azure text-center core-icon">-->
    <!--                <i class="fa fa-book fa-2x icon-big"></i>-->
    <!--                	 <span class="subtitle">-->
					
    <!--            </div>-->
     <!--           <a href="<?php// echo base_url(); ?>index.php/login/daybook">-->
     <!--           <div class="padding-20 core-content">-->
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
     <!--               <h4 class="title block no-margin">Today DayBook</h4>-->
					<!--<br/>-->
					<!--<div class="row">-->
					<!--	<div class="col-sm-6">-->
					<!--	<h6 class="block no-margin">Debit Amount</h6>-->
					
					<!--	</div>-->
					<!--	<div class="col-sm-6">-->
					<!--	<h6 class="block no-margin">Credit Amount</h6>-->
						
					<!--	</div>-->
					<!--</div>-->
					
					
     <!--           </div>-->
     <!--           </a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Today's Collection </h4>
                    <br/>
                     <?php    $id= $this->session->userdata('username');
                                $date=date("y-m-d");
                           $this->db->select_sum('amount');
                           
                           $this->db->where('pay_date',$date);
                           $this->db->where('paid_to',$id);
                        $val=$this->db->get('day_book')->row(); ?>
                    <span class="subtitle"><h5 class="text-black m-b-0"><?php if($val->amount>0){ echo $val->amount; } else { echo "0"; } ?></h5></span>
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
               <!-- <a href="<?php echo base_url();?>shopController/invoce_d/5">-->
                    <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Pending Order </h4>
                    <br/>
                    <span class="subtitle"> <?php $dt=date('d-M-Y h:i:s a');?>
                        <div class="card-footer">
                            <!-- <a href="<?php echo base_url()?>index.php/product/pendinginvoice"> -->
                             <a href="#"> 
                       <h5 class="text-black m-b-0">
                               <?php   $d=date('Y-m-d');
                               $id= $this->session->userdata('id');
                                $this->db->where('sub_branchid',$id);
                               // $this->db->where('status',0);
                                $this->db->where('ad_rec_pay',0);
                                $this->db->from('order_serial');
                                $val=$this->db->count_all_results();
                           
                                echo $val; ?>
                                </h5></a>
                          </div></span>
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
               <!-- <a href="<?php echo base_url();?>shopController/sborder">-->
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Pending Invoice </h4>
                    <br/>
                    <span class="subtitle"> <?php $dt=date('d-M-Y h:i:s a');?>
                    <div class="card-footer">
                       <!--  <a href="<?php echo base_url()?>index.php/shopController/sborder"> -->
                         <a href="#"> 
                   <h5 class="text-black m-b-0"><?php   $d=date('Y-m-d');
                           $id= $this->session->userdata('id');
                            $this->db->where('sub_branchid',$id);
                            $this->db->where('status',0);
                            // $this->db->where('order_date',$d);
                            //$this->db->from('order_serial');
                            $val=$this->db->get('order_serial');
                       if($val->num_rows()>0){
                            echo $val->num_rows();} else{ echo"0";} ?></h5></a>
                      </div></span>
                </div>
                </a>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Demand List</h4>
                    <br/>
                    <span class="subtitle"><?php   $d=date('Y-m-d');
                                                           $id= $this->session->userdata('id');
                                                            $this->db->where('sub_branchid',$id);
                                                            $this->db->where('order_date',$d);
                                                            $this->db->from('order_serial');
                                                            $val=$this->db->count_all_results();
                                                       if($val){
                                                            echo $val;} else{ echo"0";}?></span>
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
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Today Placeed Order</h4>
                    <br/>
                    <span class="subtitle"><?php   $d=date('Y-m-d');
                                                           $id= $this->session->userdata('id');
                                                            $this->db->where('sub_branchid',$id);
                                                            $this->db->where('order_date',$d);
                                                            $this->db->from('order_serial');
                                                            $val=$this->db->count_all_results();
                                                       if($val){
                                                            echo $val;} else{ echo"0";}?></span>
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
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Today's Sale Product </h4>
                    <br/>
                     <?php 
                        $d=date('Y-m-d');
                       $id= $this->session->userdata('id');
                       
                       $this->db->select_sum('sale_quantity');
                          $this->db->where('Date(date)',$d);
                        //$this->db->where('DATE(date)',$d);
                       $this->db->where('subbranch_id',$id);
                    $val=$this->db->get('subbranch_wallet')->row();
                       ?>
                    <span class="subtitle"> <?php $dt=date('d-M-Y h:i:s a');?>
                        <div class="card-footer">
                            <!-- <a href="<?php echo base_url()?>index.php/product/subsaleproduct"> -->
                              <a href="#"> 
                       <h5 class="text-black m-b-0"><?php if($val->sale_quantity) {echo $val->sale_quantity; } else{ echo"0";}?></h5></a>
                          </div></span>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <?php  
                $edate = date('Y-m-d');
                $sub_id = $this->session->userdata('id');
                $this->db->where('order_date',$edate);
                  $this->db->where('order_date',$edate);
                 $this->db->where('sub_branchid',$sub_id);
                 $od_ser = $this->db->get('order_serial');
                 
                  $this->db->where('order_date',$edate);
                 $this->db->where('ad_rec_pay',0);
                
                  $this->db->where('order_date',$edate);
                 $this->db->where('sub_branchid',$sub_id);
                 $od_sert = $this->db->get('order_serial');
                 
                 
                  $this->db->where('order_date',$edate);
                 $this->db->where('ad_rec_pay',1);
                
                  $this->db->where('order_date',$edate);
                 $this->db->where('sub_branchid',$sub_id);
                 $od_sertc = $this->db->get('order_serial');
                 ?>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Todays Maching Status.</h4>
                    <br/>
                    <span class="subtitle"> <?php echo 'Pending ='. $od_sert->num_rows().' Conpleated ='.$od_sertc->num_rows().' Total='.$od_ser->num_rows();?> </span>
                </div>
                </a>
            </div>
        </div>
	</div>
	<!--<div class="col-md-6 col-lg-3 col-sm-6">-->
 <!--       <div class="panel panel-default panel-white core-box">-->
 <!--           <div class="panel-body no-padding">-->
 <!--               <div class="partition-blue text-center core-icon">-->
 <!--                   <i class="fa fa-users fa-2x icon-big"></i>-->
                   
                    	<!-- <span class="subtitle"> -->
 <!--               </div>-->
 <!--               <a href="<?php echo base_url(); ?>index.php/login/newAdmission">-->
	<!--			<div class="padding-20 core-content">-->
				   <!-- <h4 class="title block no-margin">Student Admission</h4>-->
	<!--			   <h4 class="title block no-margin"> New Registration</h4><br>-->
	<!--			   <div class="row">-->
	<!--				   <div class="col-sm-6">-->
	<!--				   <h6 class="block no-margin">Total Students</h6>-->
						
	<!--				   </div>-->
	<!--				   <div class="col-sm-6">-->
	<!--				   <h6 class="block no-margin">Current Year Students</h6>-->
					   <!-- <span class="subtitle">Total Todays Enroll New Students. </span> -->
					 
	<!--				   </div>-->
	<!--			   </div>-->
				  
 <!--               </div>-->
 <!--               </a>-->
 <!--           </div>-->
 <!--       </div>-->
 <!--   </div>-->
    

</div>

</div>


                          


<!--<div class="row" Style="margin-left:2px;">-->
<!-- <div class="col-md-4 col-lg-4">-->
<!--        <div class="panel panel-default panel-white ">-->
<!--            <div class="panel-body no-padding">-->
<!--                <div class="partition-green padding-20 text-center text-bold">-->
<!--                 <a href="#" class="text-white">-->
<!--                    Click for SMS Panel-->
<!--                    </a>-->
<!--                </div>-->

<!--	                <div class="padding-20 core-content">-->
<!--	                	<h2 class="title block no-margin"></h2>-->
<!--	                	<br/>-->
<!--	                	<span class="subtitle"></span>-->
<!--	                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--</div>-->


<!-- end: PAGE CONTENT-->
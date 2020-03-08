<style>
blink{
    animation:blinker 0.6s linear infinite;
    color:#FF0000;
}
@keyframes blinker{
    50%{ opacity:0; }
}

</style>
<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i><br>
                   
					<span class="subtitle">
						
                    </span>
                </div>
                <a href="<?php echo base_url();?>employeeController/order_details">
	                <div class="padding-20 core-content">
	                <!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	                <h3 class="title block no-margin"><blink>Delivery order</blink></h3>
	                	<br/>
						<?php 
						
					
						$this->db->where('del_boy_id',$this->session->userdata("id"));
						
						$this->db->where('detail_delivery',0);
						$this->db->where('order_status',1);
						$od_number= $this->db->get('order_serial');?>
	                	<span class="subtitle">  <h3><blink ><?php echo $od_number->num_rows(); ?></blink></h3>   </span>
                        
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
                <a href="#">
                <div class="padding-20 core-content">
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
                    <h4 class="title block no-margin">Total Delivered Order</h4>
					<br/>								
					<?php $this->db->where('del_boy_id',$this->session->userdata("id"));
						$this->db->where('detail_delivery',1);
						$this->db->where('order_status',1);
						$od_placed= $this->db->get('order_serial')->num_rows();?>
	                	<span class="subtitle"> <?php echo $od_placed; ?>  </span>
                </div>
                </a>
            </div>
        </div>
    </div>
	<?php 	$this->db->where('id',$this->session->userdata("id"));
                    $emppv = 	$this->db->get("emp_pv");
                    	if($emppv->num_rows()>0){
                    	    $pv = $emppv->row()->pv;
                    	    $pvr=$emppv->row()->rupee;
                    	}
                    	else{
                    	    $pv=0;
                    	     $pvr=0;
                    	}
                    ?>
<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle">  </span>
                    
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Total PV In Your A/C</h4>
                    <br/>
                    <span class="subtitle"><?php echo $pv; ?> </span>
                </div>
                </a>
            </div>
        </div>
    </div> 
	<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-blue text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                   
                    	
                </div>
                <a href="<?php //echo base_url(); ?>index.php/login/newAdmission">
				<div class="padding-20 core-content">
				   
				   <h4 class="title block no-margin"> Total Rupees in Your A/C</h4><br>
				   <div class="row">
					   <div class="col-sm-6">
					   <h6 class="block no-margin"><?php echo  $pvr;?></h6>
						
					   </div>
					   <div class="col-sm-6">
					   <h6 class="block no-margin"></h6>
					   
					 
					   </div>
				   </div>
				  
                </div>
                </a>
            </div>
        </div>
    </div>


  

</div>
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-dark">
        <div class="panel-heading text-center">
            <h4 class="panel-title">Delivery order Details</h4>
            <div class="panel-tools">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-white">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                        <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                        </li>
                        <li>
                            <a class="panel-refresh" href="#">
                                <i class="fa fa-refresh"></i> <span>Refresh</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                                <i class="fa fa-wrench"></i> <span>Configurations</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-expand" href="#">
                                <i class="fa fa-expand"></i> <span>Fullscreen</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        
        <div class="panel-body no-padding">
            <!--<div class="partition-green padding-15 text-center">-->
            <!--    <h4 class="no-margin">Last 4 Transaction</h4>-->
            <!--</div>-->
           
                            
            <div id="accordion" class="panel-group accordion accordion-white no-margin">
                <div class="panel no-radius">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
                                <i class="icon-arrow"></i>
                               <span class="label label-danger pull-left">Click on + or Details.</span>
                            </a></h4>
                    </div>
                   <div class="panel-collapse collapse" id="collapseOne">
                        <div class="panel-body no-padding partition-light-grey">
                            <table class="table">
								<thead>
									<th>#</th>
									<th>Subscriber Name</th>
									<th>Order No</th>
								</thead>
                                <tbody>
                               <?php $i=1; foreach($od_number->result() as $od_data1){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
										<?php $this->db->where('id',$od_data1->cust_id);
										$sb_data=$this->db->get('customers')->row();?>
									<td><?php echo $sb_data->name; ?></td>
									<td><a href="<?php echo base_url();?>employeeController/abc"><?php echo $od_data1->order_no; ?></a></td>                                
                                </tr>
							   <?php $i++; } ?>
                                <!-- <tr>
                                    <td class="center"><h2>Home Work not define ...</h2></td>
                                </tr> -->
                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
	</div>
</div>

  
<!-- end: PAGE CONTENT-->
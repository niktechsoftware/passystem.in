<!--<h1>zdfdf</h1>-->
<!--<h1><?php //echo $type = $this->session->userdata("emp_type");?></h1>-->

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
	                <h3 class="title block no-margin"><blink>Today Meetings</blink></h3>
	                	<br/>
						<?php 
						$date= date('Y-m-d');
						$this->db->where('ao',$this->session->userdata("username"));
						$this->db->where('date_of_advising',$date);
						$mt_number= $this->db->get('entry_table');?>
	                	<span class="subtitle">  <h3><blink ><?php echo $mt_number->num_rows(); ?></blink></h3>   </span>
                        
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
                    <h4 class="title block no-margin">Total Add Subscribers</h4>
					<br/>								
					<?php $this->db->where('ao',$this->session->userdata("username"));
						$ao_count= $this->db->get('customers')->num_rows();
						if($ao_count>0) { ?>
	                	<span class="subtitle"> <?php echo $ao_count; ?>  </span>
	                	<?php } else { echo "0"; } ?> 
                </div>
                </a>
            </div>
        </div>
    </div>
	<?php 	$this->db->where('emp_id',$this->session->userdata("username"));
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
            <h4 class="panel-title">Today Meeting Details</h4>
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
									<th>Name</th>
									<th>Address</th>
									<th>Mobile No</th>
								</thead>
                                <tbody>
                               <?php $i=1; foreach($mt_number->result() as $mt_data1){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
										<?php $this->db->where('id',$od_data1->cust_id);
										$sb_data=$this->db->get('customers')->row();?>
									<td><?php echo $mt_data1->visitor_name; ?></td>
									<td><?php echo $mt_data1->address; ?></td>
									<td><?php echo $mt_data1->contact_no; ?></td>
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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Order List </span></h4>
					<div class="panel-tools">
						<div class="dropdown">
							<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
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
				<div class="panel-body">				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>
										<a href="#" class="export-pdf" data-table="#sample-table-2" >
											Save as PDF
										</a>
									</li>
									<li>
										<a href="#" class="export-png" data-table="#sample-table-2">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#sample-table-2" >
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#sample-table-2" >
											Save as TXT
										</a>
									</li>
									<li>
										<a href="#" class="export-xml" data-table="#sample-table-2" >
											Save as XML
										</a>
									</li>
									<li>
										<a href="#" class="export-sql" data-table="#sample-table-2" >
										Save as SQL
										</a>
									
									
										<a href="#" class="export-json" data-table="#sample-table-2" >
											Save as JSON
										</a>
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#sample-table-2" >
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#sample-table-2">
											Export to PowerPoint
										</a>
									</li>
								
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                    <th>#</th>
                                    	<th>Order No</th>
									<th>Subscriber Name[mobile No.]</th>
										<th>Subscriber Branch.</th>
										<th>Total Amount</th>
										<th>Date</th>
										<th>Status</th>
										<th>Pay Amount</th>
								
                                    </tr>
								</thead>
                                <tbody>
                                <?php $this->db->where('del_boy_id',$this->session->userdata("id"));
                                    $this->db->where('shop_order',1);
                                    $this->db->where('order_status',0);
                                    $od_number= $this->db->get('order_serial');?>
                               <?php $i=1; foreach($od_number->result() as $od_data1){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    	<td><a href="<?php echo base_url();?>employeeController/new_invoice/<?php echo $od_data1->order_no; ?>" class ="alert alert-info"><?php echo $od_data1->order_no; ?></a></td> 
										<?php $this->db->where('id',$od_data1->cust_id);
										$sb_data=$this->db->get('customers')->row();?>
									<td><?php echo $sb_data->name."[".$sb_data->mobile."]"; ?></td>
								
									
										<td><?php $this->db->where("id",$sb_data->sub_branchid);
									$rty =	$this->db->get("sub_branch");echo $rty->row()->bname;?></td>
										<td><?php echo $od_data1->total_amount; ?></td>
											<td><?php echo $od_data1->order_date; ?></td>
											
												<td><?php if($od_data1->order_status){echo '<div class ="btn btn-success">Paid </div>';}else{echo '<div class ="btn btn-danger">Pending</div>'; }?></td>
								<td><?php if($od_data1->order_status){}else{?><a href="<?php echo base_url();?>employeeController/deliverypayment/<?php echo $od_data1->order_no; ?>"  class ="alert alert-warning"  >pay Amount</a><?php }?></td> 
										                               
                                </tr>
							   <?php $i++; } ?>
                               </tbody>
							</table>
						</div>
						<!-- <a style=" margin:10px;" class="btn btn-warning" href="<?php// echo base_url();?>subscriberController/my_phlist">Goto Next Step</a> -->
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
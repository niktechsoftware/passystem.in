
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Active Subscriber List</span></h4>
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
				    			<div class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
                                    <h4 class="media-heading text-center">Welcome to Registered Subscriber Active List </h4>
                                <p>Now you can Inactive a Subscriber By clicking given Active Button in concern row.<br>
                                    </p> </div>
				    
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
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#sample-table-2">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-csv" data-table="#sample-table-2" >-->
									<!--		Save as CSV-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-txt" data-table="#sample-table-2" >
											Save as TXT
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									
									<!--	<a href="#" class="export-json" data-table="#sample-table-2" >-->
									<!--		Save as JSON-->
									<!--	</a>-->
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
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
				
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
									<th>S.No.</th>
                                      <th>Sub Branch</th>
                                      <th>Invoice Number</th>
                                      <th>Order Number</th>
                                      <th>Total Amount</th>
                                      <th>Subscriber Username</th>
									</tr>
								</thead>
							 <tbody>
                <?php 
                $count=0;
                $this->db->where('district',$this->session->userdata('id'));
              $sub=  $this->db->get('sub_branch');
              foreach($sub->result() as $sb):
                  $this->db->where('sub_branchid',$sb->id);
				   $cust=  $this->db->get('customers')->result();
				   $i=1;
                    foreach($cust as $data)
                    {
						$this->db->where('cust_id',$data->id);
						$this->db->where('status',1);
						$order=  $this->db->get('order_serial')->result();;
					 
                  foreach($order as $row):
                   ?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <td><?php echo $sb->bname;?></td>
                  <td><?php echo $row->invoice_no;?></td>
                  <td><a href="<?php echo base_url()?>index.php/shopController/invoiceDetail/<?php echo $row->order_no;?>" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
                  <td><?php echo $row->total_amount;?></td>
                  <td><?php echo $row->cust_username;?></td>
                </tr>
                <?php  $i++;
                endforeach;
                        
                    }
                    endforeach;
                   ?>
              </tbody>
							</table>
						</div>
				
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
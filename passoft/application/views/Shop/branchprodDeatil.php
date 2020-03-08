
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Inactive Branch List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Registered Inactive List </h4>
<p>Now you can Active a Sub Branch By clicking given Inactive Button in consern row.<br>
</p> </div>
				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
								
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
							<thead>
                  <tr>
                    <th>SNO</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Quantity</th>
                    <th>Price/Product</th>
                    <th> Total Amount</th>
                    <th>Order Date</th>
                    <th>Status</th> 
                   <!--  <th>Activity</th>  -->
                  </tr>
                </thead>
							 <tbody>
                  <?php
                      // $username=$this->session->userdata('username');
                      //  $this->db->where('cust_username',$username);
                      $this->db->where('order_no',$invoice);
                 $dt= $this->db->get("order_detail")->result();
                  ?>
                  <?php  $i=1;
                  foreach($dt as $row):?>
                  <tr class="text-uppercase">
                    <td><?php echo $i;?></td>
                     <?php 
                          $this->db->where('id',$row->p_code);
                          $dt1= $this->db->get("stock_products")->row();

                          $this->db->where('order_no',$invoice);
                          $dt2= $this->db->get("order_serial")->row();
                           ?>
                      <td><?php echo  $dt1->name;?></td>
                      <td><?php echo $dt1->hsn;?></td>
                      <td><?php echo $row->quantity;?></td>
                      <td><?php echo $dt1->selling_price;?></td>       
                      <td><?php echo $row->subtotal;?></td>
                      <td><?php echo $row->date;?></td>
                     <td><?php if($dt2->status==0){?><a href="#" class="btn btn-warning"><?php echo "Pending"?></a><?php } else {?><a href="#" class="btn btn-danger"><?php echo "Verified";?></a><?php }?></td>
                     <!-- <td><?php if($dt2->status==0){?><a href="<?php echo base_url();?>wallet/deleteorder/<?php echo $row->order_no;?>" class="btn btn-primary">Delete</a><?php } else { ?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $row->order_no?>" class="btn btn-primary">Show</a><?php }?></td> -->
                  </tr>
                  <?php  $i++;
                endforeach;
                   ?>
                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
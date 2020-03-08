
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Active Branch List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Registered Active List </h4>
<p>Now you can Inactive a Branch By clicking given inactive Button in consern row.<br>
</p> </div>
				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>-->
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
							<table class="table table-striped table-hover" id="sample-table-2">
							 <thead>
                                  <tr >
                                    <th>SNO</th>
                                    <th>Order Number</th>
                                    <th>Subscriber Name</th>
                                     <th>Subscriber Mobile</th>
                                    <th>Total Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Order Date</th>
                                    <th>Invoice Detail</th>
                                     <th>Order status</th>
                                   <!--  <th>Activity</th> -->
                                  </tr>
                                </thead>
								<tbody>
								<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
							
                  <?php
                     if($view->num_rows()>0){
                  ?>
                  <?php  $i=1;
                  foreach($view->result() as $row):
                  //print_r($row);exit();?>
                  <tr class="text-uppercase text-center">
                    <td><?php echo $i;?></td>
                      <td><a href="#" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
                      <?php 
                             $this->db->select_sum('quantity');
                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$row->order_no);
                           // $this->db->where('cust_username',$row->cust_username);
                            // $this->db->where('date',$row->order_date);
                             $dt1= $this->db->get("order_detail")->row();
                             // $username=$this->session->userdata('username');
                             $this->db->where('id',$row->cust_id);
                             $custdetail=$this->db->get('customers')->row();
                           ?>
                      <td><?php echo $custdetail->name;?></td>
                       <td><?php echo $custdetail->mobile;?></td>   
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                     <td><?php if($row->status==1){?><a href="<?php echo base_url();?>employeeController/new_invoice/<?php echo $row->order_no;?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }?></td>
                     <td><?php if($row->order_status ==1) { ?><button type="submit" class="btn btn-danger" >Order Delivered </button><?php } else { ?>
                        <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
                     <button type="submit" class="btn btn-warning" id="product<?php echo $i;?>">Not Deliver </button><div id="deliverydata<?php echo $i;?>"></div><?php }?></td> 
              </tr>  
              <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                  <script>
                  $(document).ready(function() {
                 $('#product<?php echo $i;?>').click(function(){
              var orderno=$('#orderno1<?php echo $i;?>').val();
                //alert(orderno);
              $.post("<?php echo site_url('wallet/deliverstatus')?>", {orderno:orderno}, function(data){
                   $('#product<?php echo $i;?>').hide();
                 $('#deliverydata<?php echo $i;?>').html(data);
                      })
                    });
                    });
                    </script>  
                  <?php  $i++;
                endforeach;
                   } ?>
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
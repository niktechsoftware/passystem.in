
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Subscriber Order Invoice List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Subceriber Order Invoice List </h4>
<p>Now you can see Order Invoice List of subscirber.<br>
</p> </div>
<center>  <h5 style="color:#01a9ac;font-size:20px;"><?php echo  "[".$view."]";?> Order List</h5></center>
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>
										<a href="#" class="export-pdf" data-table="#orderList" >
											Save as PDF
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#orderList">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-csv" data-table="#orderList" >-->
									<!--		Save as CSV-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-txt" data-table="#orderList" >
											Save as TXT
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#orderList" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#orderList" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									<!--</li>-->
									<!-- <li>
										<a href="#" class="export-json" data-table="#orderList" >
											Save as JSON
										</a> -->
									<li>
										<a href="#" class="export-excel" data-table="#orderList" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#orderList" >
										Export to Word
									</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#orderList">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								
							</div>
						</div>
					</div>
					
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="orderList">
							<thead>
                  <tr style="background-color: #1ba593; color: white;">
                    <th style="width:10px;">#</th>
                    <th style="width:10px;">Pro.Name</th>
                    <th style="width:10px;">P.Type</th>
                    <th style="width:10px;">Volume</th>
                    <th style="width:10px;">Pro Code</th>
                    <th style="width:10px;">Pro Qty</th>
                    <th style="width:10px;">Price/Product</th>
                    <th style="width:10px;"> Total Amount</th>
                    <th style="width:10px;">Order Date</th>
                    <th style="width:10px;">Status</th> 
                   <!--  <th>Activity</th>  -->
                  </tr>
                </thead>
                 <tbody>
                  <?php
                      $this->db->where('order_no',$view);
								 $dtt= $this->db->get("order_detail");
								 if($dtt->num_rows()>0){
									 $dt= $dtt->result();
                  ?>
                  <?php  $i=1; $tq=0;$tp=0;$tt=0;
                  foreach($dt as $row):?>
                  <tr class="text-uppercase">
                    <td style="width:10px;" class="text-center"><?php echo $i;?></td>
                     <?php 
                          $this->db->where('id',$row->p_code);
													$dt11= $this->db->get("stock_products");
													if($dt11->num_rows()>0){
														$dt1= $dt11->row();
                          $this->db->where('order_no',$view);
													$dt22= $this->db->get("order_serial");
													if($dt22->num_rows()>0){
														$dt2= $dt22->row();
                           ?>
                      <td style="width:10px;"><?php echo  $dt1->name;?></td>
                      <td style="width:10px;" class="text-center"><?php  echo $dt1->p_type;?></td>
                      <td style="width:10px;"  class="text-center"><?php  echo $dt1->size;?></td> 
                      <td style="width:10px;"><?php echo $dt1->hsn;?></td>
                      <td style="width:10px;" class="text-center"><?php $tq+=$row->quantity; echo $row->quantity;?></td>
                      <td style="width:10px;" class="text-center"><?php $tp+=$dt1->selling_price; echo $dt1->selling_price;?></td> 
                      <td style="width:10px;" class="text-center"><?php $tt+=$row->subtotal; echo $row->subtotal;?></td>
                      <td style="width:10px;"><?php echo $row->date;?></td>
                     <td style="width:10px;"><?php if($dt2->status==0){?><a href="#" class="btn btn-warning"><?php echo "Pending"?></a><?php } else {?><a href="#" class="btn btn-danger"><?php echo "Verified";?></a><?php }?></td>
                     <!-- <td><?php if($dt2->status==0){?><a href="<?php echo base_url();?>wallet/deleteorder/<?php echo $row->order_no;?>" class="btn btn-primary">Delete</a><?php } else { ?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $row->order_no?>" class="btn btn-primary">Show</a><?php }?></td> -->
								 <?php }
								 } ?>
									</tr>
                  <?php  $i++;
                endforeach;
							 } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="width:10px;">Grand Total</th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"><span style="color:black;"><strong><?php echo $tq;?></strong></span></th>
                    <th style="width:10px;"><span style="color:black;"></span></th>
                    <th style="width:10px;"><span style="color:black;"><strong><?php echo $tt.".00";?></strong></span></th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>    
                      
                  </tr>  
                </tfoot>

              </table>
					
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Receive Payment Verify</span></h4>
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
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
					            </ul>
								
							</div>
						</div>
					</div>
					<!--<div class="row">-->
					<!--	<div class="col-md-12 space20">-->
					<!--	    <form method="post" action="<?php echo base_url();?>adminController/matching_daybookdata">-->
					<!--	    <div class="col-md-4">-->
					<!--	        <lebel>From :</lebel>-->
					<!--	        <input type="date" name="d1"/>-->
					<!--	    </div>-->
					<!--	    <div class="col-md-4">-->
					<!--	        <lebel>To :</lebel>-->
					<!--	        <input type="date" name="d2"/>-->
					<!--	    </div>-->
					<!--	    <div class="col-md-4">-->
						        <!--<lebel>To :</lebel>-->
					<!--	        <input type="submit" name="submit" class="btn btn-info"/>-->
					<!--	    </div>-->
					<!--	    </form>-->
					<!--	 </div>-->
					<!--</div>-->
				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Order No</th>
                                        <th width:"10px">Amount</th>
                                        <th width:"10px">Paid Amount</th>
                                        <th width:"10px">From</th>
                                        <th width:"10px">Payment Mode</th>
                                        <th width:"10px">Payment Date</th>
                                        <th width:"10px">Transaction ID</th>
                                        <th width:"10px">Balance Amount</th>
                                        <th width:"10px">Status</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php $this->db->where('sender_status',1);
                                     $this->db->where('receiver_status',0);
                                         $e = $this->db->get('transfer_product_paydetail');
                                        // print_r($e);
                                          $i=1;
                                         foreach($e->result() as $e_data) {
                                      ?>
												<tr class="text-uppercase text-center">
												    <td width:"10px"><?php echo $i; ?></td>
													<td width:"10px"><a class="btn btn-primary" href="<?php echo base_url();?>stockController/productinvoice/<?php echo $e_data->invoice_no; ?>"><?php echo $e_data->invoice_no; ?></a></td>
													<td width:"10px"><?php echo $e_data->order_amount;?></td>
													<td width:"10px"><?php echo $e_data->paid_amount;?></a></td>
													<input type="hidden" id="username<?php echo $i;?>" value="<?php echo $e_data->username;?>">
													<td width:"10px"><?php echo $e_data->username;?></td>
													<?php $this->db->where('id',$e_data->payment_mode);
    												$mode = $this->db->get('pay_mode'); ?>
    												<td width:"10px"><?php if($mode->num_rows()>0) { echo $mode->row()->payment_mode; } else { echo "From Balance"; } ?></td>
													<td width:"10px"><?php echo $e_data->date;?></td>
													<td width:"10px"><?php echo $e_data->transaction_id;?></td>
    												<?php $this->db->where('username',$e_data->username);
    												$b_data = $this->db->get('m_balance');
    												?>
    												<td width:"10px"><?php if($b_data->num_rows()>0) { echo $b_data->row()->balance; } else { echo "N/F"; } ?></td>
													<input type="hidden" id="invoice_no<?php echo $i;?>" value="<?php echo $e_data->invoice_no;?>">
													<td width:"10px">
													    <input type="button" class="btn btn-warning" name="ver<?php echo $i; ?>" id="ver<?php echo $i;?>" value="Verify"/>
													</td>
												</tr>
												<script>
											
                                                $("#ver<?php echo $i;?>").show();
												    $("#ver<?php echo $i; ?>").click(function(){
												        var invoice_no = $("#invoice_no<?php echo $i; ?>").val();
												        var username = $("#username<?php echo $i; ?>").val();
												         alert(invoice_no);
												         alert(username);
												            $.post("<?php echo site_url('adminController/to_verify');?>",{
												             invoice_no:invoice_no,username:username},
												             function(data){
												                 alert(data);
												                 location.reload();
												             });
												    });
												</script>
											<?php 
											$i++; } ?>
												
                                </tbody> 
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>login/index">Back To Dashboard</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
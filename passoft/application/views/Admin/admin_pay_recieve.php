
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Product Receive And Pay</span></h4>
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
				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Order No</th>
                                        <th width:"10px">Amount</th>
                                        <th width:"10px">Trnf Qty</th>
                                        <th width:"10px">Date</th>
                                        <th width:"10px">From</th>
										<!--<th width:"10px">Receive Qty</th>-->
										<!--<th width:"10px">Current Amount</th>-->
                                        <th width:"10px">Current Balance</th>
                                        <th width:"10px">Payment Mode</th>
                                        <th width:"10px">Paid Amount</th>
                                        <!--<th width:"10px">Payment Date</th>-->
                                        <th width:"10px">Transaction ID</th>
                                        <th width:"10px">Net Balance Amount</th>
                                        <th width:"10px">Status</th>
                                        <!-- <th width:"10px">MSG</th>-->
                                        <!--<th width:"10px">Action</th>-->
                                        
									</tr>
							
<!-- select all boxes -->

									
								</thead>
                                <tbody>
                                    <?php
                                    
                                     $username= 'admin';
                                     $this->session->userdata("username");
                                    $this->db->group_by('invoice_number');
                                     $this->db->where('reciver_usernm',$username);
                                     $e=$this->db->get('product_trans_detail'); 
                                    //  print_r($e); exit;
                                     $i=1;
                                     foreach($e->result() as $e_data) {
                                         $this->db->where('invoice_no',$e_data->invoice_number);
                                         $this->db->where('receiver_status',1);
                                         $chk = $this->db->get('transfer_product_paydetail');
                                     if($chk->num_rows()>0)
                                      {
                                      
                                      }
                                      
                                      else
                                      {
                                      ?>
							                
												<tr class="text-uppercase text-center">
												    <td width:"10px"><?php echo $i; ?></td>
													<td width:"10px"><a class="btn btn-primary" href="<?php echo base_url();?>stockController/productinvoice/<?php echo $e_data->invoice_number; ?>"><?php echo $e_data->invoice_number; ?></a></td>
													<?php $tt=0; 
													    $this->db->where('id',$e_data->p_code);
    												    $pro= $this->db->get('stock_products');
    												    if($pro->num_rows()>0)
    												    {
    												        $t = $pro->row()->selling_price * $e_data->quantity;
    												        $tt= $tt + $t;
    												    } 
    												    ?>
													 <td width:"10px"><input style="width:70px;" type="text" value="<?php echo $tt;?>" name="ordamt<?php echo $i;?>" id= "ordamt<?php echo $i;?>" readonly/></td>
														<?php $this->db->where('invoice_number',$e_data->invoice_number);
													$this->db->select_sum('quantity');
													$qty= $this->db->get('product_trans_detail')->row();
													?>
													<td width:"10px"><a class="btn btn-info" href="<?php echo base_url();?>shopController/recieveproductlist"><?php echo $qty->quantity; ?></a></td>
													<td width:"10px"><?php echo $e_data->date; ?></td>
													<td width:"10px"><?php echo $e_data->sender_usernm;?></td>
													<?php $this->db->where('username',$this->session->userdata('username'));
													$blnce = $this->db->get('m_balance');
													if($blnce->num_rows()>0)
													{ ?>
													    <td width:"10px"><input style="width:70px;" type="text" value="<?php if($blnce->row()->balance) { echo $blnce->row()->balance; } else { echo "0"; } ?>" name="blc<?php echo $i;?>" id= "blc<?php echo $i;?>" readonly/></td>
											  <?php } else { ?>
											             <td width:"10px"><input style="width:70px;" type="text" value="<?php echo "Data N/A";?>" name="blc<?php echo $i;?>" id= "blc<?php echo $i;?>" readonly/></td>
												<?php	} 
												$pmode = $this->db->get('pay_mode');
												?>
													<!--<td width:"10px"><?php echo $i; ?></td>-->
													<!--<td width:"10px"><?php echo $i; ?></td>-->
													
													<td width:"10px"><select id="p_mode<?php echo $i; ?>">
													    <option value="select">Select</option>
													    <option value="balance">From Balance</option>
													    <?php foreach($pmode->result() as $pt) { ?>
													    <option value="<?php echo $pt->id;?>"><?php echo $pt->pay_mode;?></option>
													    <?php } ?>
													</select></td>
													<td width:"10px"><input style="width:70px;" type="text" name="paidamt<?php echo $i;?>" id= "paidamt<?php echo $i;?>"required/></td>
													<td width:"10px"><input style="width:70px;" type="text" name="trans<?php echo $i;?>" id= "trans<?php echo $i;?>" required/></td>
													<?php 	if($blnce->num_rows()>0)
													    { 
													    $b = $blnce->row()->balance;
        													if($b>0)
        													{
        													    $nt = $b - $tt;
        													}
        													else
        													{
        													    $nt = $b - $tt;
        													}
													    }
													    else
													    {
													        $nt = 0 - $tt;
													    }
													?>
													<input type="hidden" id="invoice_no<?php echo $i;?>" value="<?php echo $e_data->invoice_number;?>">
													<input type="hidden" id="usernm<?php echo $i;?>" value="<?php echo $this->session->userdata("username");?>">
													<td width:"10px"><input style="width:70px;" type="text" value="<?php echo $nt; ?>" name="netamt<?php echo $i;?>"  id= "netamt<?php echo $i;?>"readonly/></td>
													<!--<td width:"10px"><input type="button" value="Receive"></td>-->
													<td width:"10px">
													    <input type="button" class="btn btn-warning" name="ver<?php echo $i; ?>" id="ver<?php echo $i;?>" value="Verify"/>
													   <input type="button" class="btn btn-success" name="verd<?php echo $i; ?>" id="verd<?php echo $i;?>" value="Verified"/>
													</td>
    												<!--<td width:"10px"></td>-->
    												<!--<td width:"10px"></td>-->
												</tr>
												<script>
												<?php  $this->db->where('invoice_no',$e_data->invoice_number);
                                                 $this->db->where('sender_status',1);
                                                 $chk_v = $this->db->get('transfer_product_paydetail')->num_rows(); 
                                                 if($chk_v>0) {
                                                 ?>
                                                $("#ver<?php echo $i; ?>").hide();
												$("#verd<?php echo $i; ?>").show(); 
                                                 <?php } else {  ?>
												$("#ver<?php echo $i; ?>").show();
												$("#verd<?php echo $i; ?>").hide();
												<?php } ?>
												    $("#ver<?php echo $i; ?>").click(function(){
												        var username = $("#usernm<?php echo $i; ?>").val();
												        var p_mode = $("#p_mode<?php echo $i; ?>").val();
												        var ord_amount = $("#ordamt<?php echo $i; ?>").val();
												        var p_amount = $("#paidamt<?php echo $i; ?>").val();
												        var trans_id = $("#trans<?php echo $i; ?>").val();
												        var invoice_no = $("#invoice_no<?php echo $i; ?>").val();
												        var blnc = $("#netamt<?php echo $i; ?>").val();
												        if(p_mode == 'select')
												        {
												            alert("please select payment mode.");
												        }
												        else
												        {
												             //alert(p_mode);
												            $.post("<?php echo site_url('shopController/pay_order');?>",{
												             username:username,p_mode:p_mode,p_amount:p_amount,trans_id:trans_id,blnc:blnc,invoice_no:invoice_no,ord_amount:ord_amount},
												             function(data){
												                 alert(data);
												                 location.reload();
												             }); 
												        }
												        
												        //  alert(invoice_no); alert(trans_id); alert(blnc); alert(p_amount); alert(username);
												         
												    });
												</script>
											<?php }
											$i++; } ?>
												
                                </tbody> 
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php //echo base_url();?>login/index">Back To Dashboard</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
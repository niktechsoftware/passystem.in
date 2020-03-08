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
<br>
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
    								    <th>#</th>
                                        <!--<th></th>-->
                                        <th>Shop ID</th>
                                        <th>Owner Name</th>
                                        <th>Order Number</th>
                                        <!--<th></th>-->
                                        <th>Total Amount</th>
                                        <th>Activity</th>
									</tr>
								</thead>
								<tbody>
								   
								   
								    
								    <?php 
								     $sub_branchid=$this->uri->segment(3);
                						$wh = array('sub_branchid'=>$sub_branchid,
                						'adminpayment_receive'=>'0'
                						);
                						$this->db->where($wh);
                						$amt=$this->db->get('order_serial');
                						$this->db->where('id',$sub_branchid);
                						$sub_dt=$this->db->get('sub_branch')->row();
                					
								    
								   // print_r($sub_branch);
								   $i=1;
								   foreach($amt->result() as $ord_data) { ?>
								   <tr>
                						<td><?php echo $i;?></td>
                						<td><?php echo $sub_dt->bname;?></td>
                						<?php 	$this->db->where('id',$ord_data->cust_id);
                						$cust_dt=$this->db->get('customers')->row();
                						?>
                						<td><?php echo $cust_dt->name."[".$cust_dt->username."]";?></td>
                						<!--<td><?php //echo $sub_bdata->ownername;?></td>-->
                						<!--<td><?php //echo $sub_bdata->mob_no;?></td>-->
                						
                						<td><?php echo $ord_data->order_no;?></td>
                						<td><?php echo $ord_data->total_amount;?></td>
                						<td>
                						     <input type="hidden" id="abc<?php echo $i;?>" value="<?php echo $ord_data->order_no;?>"/>
                						    <input type="button" id="appr<?php echo $i;?>" class="btn btn-success" value="Approved"/>
                						    <input type="button" id="wait<?php echo $i;?>" class="btn btn-danger" value="Waiting"/>
                						</td>
						            </tr>
						            <script>
						               $("#appr<?php echo $i;?>").hide();
						               $("#wait<?php echo $i;?>").show();
						             
						               $("#wait<?php echo $i;?>").click(function(){
						                  
						                    $("#appr<?php echo $i;?>").show();
						                        $("#wait<?php echo $i;?>").hide();
						                        
						                   var order_no = $("#abc<?php echo $i;?>").val();
						                    
						                        $.post("<?php echo site_url();?>adminController/update_orderserial",{order_no:order_no},function(data){
						                            alert(data);
						                        });
    						               });
						            </script>
								  <?php $i++; } ?>
								    
								</tbody>
							</table>
						</div>
					
       	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
<div class="row">
            <div class="col-md-12 space20">
              <div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                  Export <i class="fa fa-angle-down"></i>
                </button>
                
                <ul class="dropdown-menu dropdown-light pull-right">
                <!--  <li>-->
                <!--    <a href="#" class="export-pdf" data-table="#delivery" >-->
                <!--      Save as PDF-->
                <!--    </a>-->
                <!--  </li>-->
                <!--  <li>-->
                <!--    <a href="#" class="export-png" data-table="#delivery">-->
                <!--      Save as PNG-->
                <!--    </a>-->
                <!--  </li>-->
                <!--  <li>-->
                <!--    <a href="#" class="export-csv" data-table="#delivery" >-->
                <!--      Save as CSV-->
                <!--    </a>-->
                <!--  </li>-->
                    <li>
                        <a href="#" class="export-excel" data-table="#sample-table-2" >
                          Export to Excel
                        </a>
                   </li>
                <!--  <li>-->
                <!--    <a href="#" class="export-doc" data-table="#delivery" >-->
                <!--    Export to Word-->
                <!--  </a>-->
                <!--  </li>-->
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
                                        <th>Shop Name</th>
                                        <th>Shop ID</th>
                                        <th>Owner Name</th>
                                        <th>Mobile Number</th>
                                        <th>Total Order</th>
                                        <th>Total Amount</th>
                                        <!--<th>Activity</th>-->
									</tr>
								</thead>
								<tbody>
								    <?php 
								   // print_r($sub_branch);
								   $i=1;
								   foreach($sub_branch->result() as $sub_bdata) { ?>
								   <tr>
                						<td><?php echo $i;?></td>
                						<td><?php echo $sub_bdata->bname;?></td>
                						<td><?php echo $sub_bdata->username;?></td>
                						<td><?php echo $sub_bdata->ownername;?></td>
                						<td><?php echo $sub_bdata->mob_no;?></td>
                						<?php 
                						$wh = array('sub_branchid'=>$sub_bdata->id,
                						'adminpayment_receive'=>'0'
                						);
                						
                						$this->db->where($wh);
                						$this->db->select_sum('total_amount');
                						$amt=$this->db->get('order_serial')->row();
                						$this->db->where($wh);
                						$order_row=$this->db->get('order_serial')->num_rows();
                						?>
                						<td><a class="btn btn-info" href="<?php echo base_url();?>adminController/order_approvel/<?php echo $sub_bdata->id;?>"><?php if($order_row>0){ echo "<span style='font-size:16px;font-weight:1px;'>".$order_row."</span>"; } else { echo "0"; } ?></a></td>
                						<td><?php if($amt->total_amount>0){ echo "<span style='font-size:16px;font-weight:1px;'>".$amt->total_amount."</span>"; } else { echo "0"; } ?></td>
                						<!--<td>-->
                						<!--    <input type="button" id="appr<?php echo $i;?>" class="btn btn-success" value="Approved"/>-->
                						<!--    <input type="button" id="waitr<?php echo $i;?>" class="btn btn-danger" value="Waiting"/>-->
                						<!--</td>-->
						            </tr>
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
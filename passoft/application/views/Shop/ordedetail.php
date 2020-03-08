
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
                                           <table id="sample-table-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                      <tr>
                                        <th style="width:6px;">SNO</th>
                                        <th style="width:6px;">Order No</th>
                                        <!--<th style="width:6px;">Sub Branch</th>-->
                                        <th style="width:6px;">Subscriber Name</th>
                                        <th style="width:6px;">Total Qty</th>
                                        <th style="width:6px;">Amount</th>
                                        <th style="width:6px;">Order Date</th>
                                        <!--<th style="width:6px;">Order Assign</th>-->
                                        <!--<th style="width:6px;">Status</th>-->
                                        <th style="width:6px;">Invoice Detail</th>
                                        <th style="width:6px;">DI Order Status</th>
                                       <!--  <th>Activity</th> -->
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          if($customer->num_rows()>0)
                                          {
                                              $i=1;
                                                foreach ($customer->result() as $value){
                                                $this->db->where('cust_id',$value->id);
                                                $dt= $this->db->get("order_serial")->result();
                                               //print_r($dt);exit();
                                                
                                                foreach($dt as $row) { ?>
                                                    <tr class="text-uppercase">
                                                        <td style="width:2px;"><?php echo $i;?></td>
                                                        <td style="width:6px;"><a href="<?php echo base_url()?>shopController/branchproductdeatil/<?php echo $row->order_no;?>" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
                                                          <?php 
                                                             $this->db->select_sum('quantity');
                                                             $this->db->select_sum('subtotal');
                                                             $this->db->where('order_no',$row->order_no);
                                                             $dt1= $this->db->get("order_detail")->row();
                                                             $this->db->where('id',$row->cust_id);
                                                             $custdetail=$this->db->get('customers')->row();
                                                             $subBranchname= $custdetail->sub_branchid;
                                                             $this->db->where('id',$subBranchname);
                                                             $subname= $this->db->get('sub_branch')->row();
                                                               ?>
                                                        <!--<td style="width:6px;"><?php //echo $subname->bname ;?></td>-->
                                                        <td style="width:6px;"><?php echo $custdetail->name;?></td>     
                                                        <td style="width:6px;"><?php echo $dt1->quantity;?></td>
                                                        <td style="width:6px;"><?php echo $dt1->subtotal;?></td>
                                                        <td style="width:6px;"><?php echo $row->order_date;?></td>
                                                        <td style="width:6px;">
                                                            <?php if($row->status==1) { ?>
                                                            <a href="<?php echo base_url();?>shopController/invoice/<?php echo $row->order_no?>" class="btn btn-primary">
                                                                <?php echo $row->invoice_no;?>
                                                                </a>
                                                                <?php } else { ?>
                                                                <a href="#" class="btn btn-primary">
                                                                    <?php echo $row->invoice_no;?>
                                                                    </a>
                                                                    <?php } ?>
                                                        </td>
                                                        <td style="width:6px;"><?php if($row->order_status==0){?><a href="#" class="btn btn-warning"><?php echo "Not Deliver"?></a><?php } else {?><a href="#" class="btn btn-danger"><?php echo "Delivered";?></a><?php }?></td>
                                                    </tr>
                             
                                      <script>
                                      $(document).ready(function() {
                                     $('#delivery<?php echo $i;?>').hide();   
                                     <?php if($row->status==1){?>
                                      $('#delivery<?php echo $i;?>').hide(); 
                                       $('#assign<?php echo $i;?>').show();
                                   <?php   }?> 
                                     $('#assign<?php echo $i;?>').click(function(){
                                  $.post("<?php echo site_url('shopController/selectdelivery')?>", {}, function(data){
                                    $('#assign<?php echo $i;?>').hide();
                                     $('#delivery<?php echo $i;?>').show(); 
                                     $('#delivery<?php echo $i;?>').html(data);
                                          })
                                        });
                        
                        $('#delivery<?php echo $i;?>').change(function(){
                          var id = $('#delivery<?php echo $i;?>').val();
                          var orderno = $('#orderno<?php echo $i; ?>').val();
                          $.post("<?php echo site_url('shopController/assigntodelivery')?>", {id : id,orderno:orderno}, function(data){ 
                            //  // alert(data)
                            //  $('#selectdelivery<?php echo $i;?>').html(data);
                          })
                        });
                        
                         $('#selectdelivery<?php echo $i;?>').change(function(){
                          var id = $('#selectdelivery<?php echo $i;?>').val();
                          var orderno = $('#orderno1<?php echo $i; ?>').val();
                          $.post("<?php echo site_url('shopController/assignagaindelivery')?>", {id : id,orderno:orderno}, function(data){ 
                            //  // alert(data)
                            //  $('#selectdelivery<?php echo $i;?>').html(data);
                          })
                        });
                        //   $('#paymentrecive<?php echo $i;?>').hide();
                         $('#payment<?php echo $i;?>').click(function(){
                           // var id = $('#selectdelivery<?php echo $i;?>').val();
                          var orderno = $('#orderno2<?php echo $i; ?>').val();
                        // alert(orderno);
                          $.post("<?php echo site_url('shopController/admincash')?>", {orderno:orderno}, function(data){ 
                             // alert(data);
                             $('#show').html(data);
                             $('#payment<?php echo $i;?>').hide();
                          })
                        });
                      });
                    </script> 
                                      <?php  $i++;
                                                }
                                        } }?>
                </tbody>

              </table>
             
              <script>
                // jquery(document).ready(function(){
                    TableExport.init();
				// Main.init();
				// SVExamples.init();
              </script>
              </div>
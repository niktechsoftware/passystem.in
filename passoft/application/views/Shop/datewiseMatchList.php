<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
       
          <center><h5 class="text-bold">Maching List</h5></center>
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
				<?php
         $i=1; $totalb=0; $totp=0; $totr=0;  $countm=0;$countunm=0;
                 if($orderList->num_rows()>0){
					?>
            <div class="table-reponsive">
            <table id="sample-table-2" class="table table-striped table-hover">
               <thead>
              <tr style="background-color:#1ba593; color:white;">
                    <th>S.No</th>
                    <th>Order Num</th>
                    <th>Order Amount</th>
                    <th>D.I Name</th>
                    <th>Sub.U.N</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Payment Mode</th>
                    <th>Paid Amount</th>
                    <th>Trans. ID</th>
                    <th>Deatils</th>
                    <th>Matching</th>
                    
              </tr>
                </thead>
                <tbody>
                <?php 
                    $i=1; $totalb=0; $totp=0; $totr=0;  $countm=0;$countunm=0;
                 foreach($orderList->result() as $od_data): 
                    ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $od_data->order_no;?>
                <input type ="hidden" id= "order<?php echo $i;?>"  name ="order<?php echo $i;?>" value = "<?php echo $od_data->order_no;?>" class ="form control"/>
                </td>
                <td><?php echo $od_data->total_amount; ?></td>
                <?php $this->db->where('id',$od_data->del_boy_id);
                        $del =$this->db->get('employee');
                      
                ?>
                <td><?php   if($del->num_rows()>0){ $del =$del->row(); echo $del->name."[".$del->username."]"; } else { echo "N/A"; } ?></td>

                <?php $this->db->where('id',$od_data->cust_id);
                $sub =$this->db->get('customers');
                
                ?>
                <td><?php if($sub->num_rows()>0){$sub =$sub->row(); echo $sub->name."[".$sub->username."]"; } else { echo "N/A"; } ?></td>
                <td><?php echo $od_data->order_date; ?></td>
                <td><?php if($od_data->order_status == 1){ echo "Delivered"; } else { echo "Not Deliver"; } ?></td>
                <td>
                    <?php if ($this->session->userdata('login_type')==1)
                    {
                        $this->db->where('id',$od_data->payment_mode);
                        $pay = $this->db->get('pay_mode');
                        if($pay->num_rows()>0)
                        {
                            echo $pay->row()->pay_mode;
                        }
                        else
                        {
                            echo "N/A";
                        }
                        
                    }
                    else
                    { ?>
                         <select name="paymode<?php echo $i;?>" id="paymode<?php echo $i;?>"  style="width: 120px;" class="form-control" require style="text-transform:uppercase; ">
				                    <option  value="" >Select</option>
				                    <?php $paymode = $this->db->get("pay_mode");
				                    foreach($paymode->result() as $pm):?>
				                    <option  value="<?php echo $pm->id;?>" <?php if($od_data->payment_mode==$pm->id){ echo 'selected="selected"'; }?>><?php echo $pm->pay_mode;?></option>
				                    <?php endforeach;?>
				            </select>
                <?php    }
                    ?>
                           
                </td>
                  <td><?php echo $od_data->total_amount; ?></td>
                <td><?php //echo $od_data->transaction_id; ?>
                 <input type ="text" id= "trans<?php echo $i;?>" style="width: 100px;"  name ="trans<?php echo $i;?>" value = "<?php echo $od_data->transaction_id;?>" class ="form control" <?php if($this->session->userdata('login_type')==1) { ?> readonly <?php } ?>/>
               
                
                </td>
              
                <td><input type ="text" id="desc<?php echo $i;?>" style="width: 150px;" name ="desc" class ="form control" <?php if($this->session->userdata('login_type')==1) { ?> readonly <?php } ?>/> </td>
                 <?php if($this->session->userdata('login_type')==1) 
                        { 
                        //$countm++; $totp+=$od_data->total_amount;
                        $countunm++; $totr+=$od_data->total_amount;
                        ?>
                           <td>
                               <input type="hidden" id="row<?php echo $i ?>" value="<?php echo $od_data->id;?>" />
                              <input type="button" id="admin_ok<?php echo $i ?>" value="verified" class="btn btn-success"/>
                              <input type="button" id="admin<?php echo $i ?>" value="verify" class="btn btn-danger"/>
                           </td>
                 <?php } else { ?>
                 <td id="subbranch12<?php echo $i;?>">
                            <select name="matchStatus<?php echo $i;?>" id="matchStatus<?php echo $i;?>"  style="width: 120px;"  class="form-control" require style="text-transform:uppercase; ">
				                    <option  value="" >Status</option>
				                    <option  value="1" <?php if($od_data->ad_rec_pay==1){$countm++; $totp+=$od_data->total_amount; echo 'selected="selected"'; }?>>Matched</option>
				                    <option  value="0" <?php if($od_data->ad_rec_pay==0){ $countunm++; $totr+=$od_data->total_amount;echo 'selected="selected"'; }?>>Pendng</option>
				            </select>
                
                  </td>
                  <?php } ?>
                </tr>
                  <script type="text/javascript">
                  $("#admin_ok<?php echo $i ?>").hide();
                  $("#admin<?php echo $i ?>").show();
                  $("#admin<?php echo $i ?>").click(function(){
                      var row_id= $("#row<?php echo $i ?>").val();
                      //alert(row_id);
                      $.post("<?php echo site_url("adminController/pay_statuss");?>",{ row_id:row_id }, function(data){
                          alert(data);
                           $("#admin_ok<?php echo $i ?>").show();
                            $("#admin<?php echo $i ?>").hide();
                      });
                  });
                  
                  
  $('#matchStatus<?php echo $i;?>').change(function(){
      var paymode= $('#paymode<?php echo $i;?>').val();
      var order= $('#order<?php echo $i;?>').val();
      var desc= $('#desc<?php echo $i;?>').val();
      var trans_id= $('#trans<?php echo $i;?>').val();
      //alert(order);
      //alert(branch);
      $.post("<?php echo site_url("shopController/matchStatus") ?>", {
    	  paymode : paymode,
    	  order : order,
    	  desc : desc,
    	  trans_id : trans_id
            }, function(data) {
              $("#subbranch12").html(data);
              $("matchStatus<?php echo $i;?>").hide();
             // alert("data");
            });
  });

</script>    
                    <?php $i++;endforeach;?>                   
                </tbody>
              </table>
              </div>
                  <?php
                 
                }
                else{
                    echo '<div class ="alert alert-warning">No Data !!!!</div>';
                }
                 ?>    
                <?php $this->db->where('adminpayment_receive',0);
                $this->db->select_sum('total_amount');
                $ama= $this->db->get('order_serial')->row(); ?>
                <div class="alert alert-info">Total Matched[<?php //echo $ama->total_amount;?>]<input type="text" class  = "form control" id="totp" value="<?php echo $ama->total_amount;?>"/>
               Remaining Amount [<?php echo $countunm;?>]   <input type="text" id="totr" class  = "form control" value="<?php echo $totr;?>"/></div>    
      </div></div>
      </div>           
     </div>
     </div>
          
  	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
   
<div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="panel-title"> Order List</h5></center>
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
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#stocklist" >-->
									<!--	Export to Word-->
									<!--</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#stocklist">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
                   <div class="dt-responsive table-responsive">
                  <table id="sample-table-2" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                    <th>Order Number</th>
                    <th>Subscriber Name</th>
                    <th>Branch Name</th>
                    <th>Sub Branch Name</th>
                    <th>Total Quantity</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                    <th>Order Assign</th>
                    <th>Invoice Detail</th>
                     <th>Order status</th>
                    <!--<th>Payment Approve</th>-->
                    
                   <!--  <th>Activity</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                      //$username=$this->session->userdata('username');
                        $this->db->where('order_status',1);
                       $this->db->where('adminpayment_receive',1);
                 $dt= $this->db->get("order_serial")->result();
                  ?>
                  <?php  $i=1;
                  foreach($dt as $row):?>
                  <tr class="text-uppercase">
                    <td><?php echo $i;?></td>
                      <td><a href="<?php echo base_url()?>adminController/adminproductdeatil/<?php echo $row->order_no;?>" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
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
                            
                              $this->db->where('id',$custdetail->district);
                             $branch=$this->db->get('branch')->row();
                            //  print($branch);
                            //  exit();
                             
                              $this->db->where('id',$row->sub_branchid);
                             $sub_branch=$this->db->get('sub_branch')->row();
                            //  print_r($sub_branch);
                            //  exit();
                           ?>
                       <td><?php echo $custdetail->name;?></td> 
                        <td><?php echo $branch->b_name;?></td>
                        <td><?php echo  $sub_branch->bname;?></td> 
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                     <td><?php if($row->status==0){?>
                     <input type="hidden" id="orderno<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
                     <button type="sumbit" id="assign<?php echo $i;?>" class="btn btn-warning"><?php echo "Assign"?></button><select id="delivery<?php echo $i;?>" class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;"></select><?php } else {  
                     
                      $this->db->where("emp_type",5);
                      $deliveryboy=$this->db->get('employee');
                   
                          
                      ?>
                       <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
         <select class="form-control text-uppercase"  id="selectdelivery<?php echo $i;?>" style="max-height:40px;max-width:120px;margin-left:-12px;color:#01a9ac">
           <?php if($deliveryboy->num_rows()>0)
         {
         $boy=$deliveryboy->result(); ?>
      <?php 
       foreach($boy as $row1)
       {            $this->db->where('order_no',$row->order_no);
                     $boy1=$this->db->get('order_serial')->row();
       ?> 
  <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row1->id;?>" <?php if($boy1->del_boy_id == $row1->id): echo 'selected="selected"'; endif; ?>><?php echo  $row1->name." [ ". $row1->username. " ] ";?></option>     
            
      <?php } ?>
        
    <?php }?></select><?php }?></td>
                     <td><?php if($row->order_status == 1){?><a href="<?php echo base_url();?>adminController/invoice/<?php echo $row->order_no?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }?></td>
                
           
            <td><?php if($row->order_status == 0) { ?><button type="submit" class="btn btn-danger" >Not Deliver </button><?php } else { ?><button type="submit" class="btn btn-warning" >Order Deliver </button><?php }?></td> 
             <!--<td><?php if($row->order_status ==1 && $row->ad_rec_pay==0){ ?>-->
             <!--  <input type="hidden" id="orderno2<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">-->
             <!--  <button type="submit" class="btn btn-danger" onclick=ConfirmDialog(); id="payment<?php echo $i;?>"> D.I Payment Receive </button>-->
             <!--  <div id="show"></div>-->
             <!-- <?php } ?>-->
             <!-- elseif($row->ad_rec_pay==1){?>-->
             <!-- <button type="submit" class="btn btn-primary" id="paymentrecive<?php echo $i;?>">Admin P.R </button>-->
             <!-- //<?php // }  elseif($row->order_status ==0){ ?><button type="submit" class="btn btn-warning" >Waiting For D.S</button><?php //} ?></td> -->
                        
             </tr>  
             
              <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
                  <script>
                  $(document).ready(function() {
                      
                 $('#delivery<?php echo $i;?>').hide();    
                 $('#assign<?php echo $i;?>').click(function(){
              
               // alert(orderno);
              $.post("<?php echo site_url('adminController/selectdelivery')?>", {}, function(data){
                $('#assign<?php echo $i;?>').hide();
                 $('#delivery<?php echo $i;?>').show(); 
                 $('#delivery<?php echo $i;?>').html(data);
                      })
                    });
    
    $('#delivery<?php echo $i;?>').change(function(){
      var id = $('#delivery<?php echo $i;?>').val();
      var orderno = $('#orderno<?php echo $i; ?>').val();
      $.post("<?php echo site_url('adminController/assigntodelivery')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
    
     $('#selectdelivery<?php echo $i;?>').change(function(){
      var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno1<?php echo $i; ?>').val();
      $.post("<?php echo site_url('adminController/assignagaindelivery')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
    
    
    //   $('#paymentrecive<?php echo $i;?>').hide();
     $('#payment<?php echo $i;?>').click(function(){
       // var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno2<?php echo $i; ?>').val();
    // alert(orderno);
      $.post("<?php echo site_url('adminController/admincash')?>", {orderno:orderno}, function(data){ 
         // alert(data);
         $('#show').html(data);
         $('#payment<?php echo $i;?>').hide();
      })
    });
    
    
  });
</script> 
             
             
                  <?php  $i++;
                endforeach;
                   ?>
                </tbody>

              </table>
                                                    </div>
                                                    <center><div><a href="<?php echo base_url();?>login/index" class="btn btn-success"><span style="font-size:35px;">Done</span></a></div></center>
                                                </div>
                                             
                                                
                                                
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <script>
                                                function ConfirmDialog() {
                                                          var x=confirm("Are You Sure To Verify This Order?")
                                                          if (x) {
                                                            return true;
                                                          } else {
                                                            return false;
                                                          }
                                                      }
                                            </script>
	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
			//	TableExport.init();
			//	UIModals.init();
			            
					</script>
          
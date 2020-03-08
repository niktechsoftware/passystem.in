                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold"><?php echo  "[".$invoice."]";?> Order List</h5></center>
                                                </div>
                                                <div class="panel-body">
                                                      <div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>--&gt;-->
									<!--	<a href="#" class="export-pdf" data-table="#orderlist1">-->
									<!--		Save as PDF-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#orderlist1">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-csv" data-table="#example">
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#example">
											Save as TXT
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#orderlist1">-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#orderlist1">-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									
									<!--	<a href="#" class="export-json" data-table="#orderlist1">-->
									<!--		Save as JSON-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2">
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#sample-table-2">
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#example">
											Export to PowerPoint
										</a>
									</li>
								
							</ul></div>
						</div>
					</div>
					<input type ="hidden" id="order_id" name ="order_id" value = "<?php echo $invoice; ?>" />
                  <table id="sample-table-2" class=" table table-bordered">
                <thead>
                  <tr>
                    <th style="width:10px;">#</th>
                     <th style="width:10px;">Username</th>
                      <th style="width:10px;">Company</th>
                    <th style="width:10px;">Name</th>
                    <th style="width:10px;">Pro.Name</th>
                    <th style="width:10px;">P.Type</th>
                    <th style="width:10px;">Volume</th>
                    <th style="width:10px;">Pro Code</th>
                    <th style="width:10px;"> Qty</th>
                    <th style="width:10px;">Price/Product</th>
                    <th style="width:10px;"> Total Amount</th>
                    <th style="width:10px;">Order Date</th>
                     <th style="width:10px;">Order No.</th>
                    <th style="width:10px;">Status</th> 
                   <!--  <th>Activity</th>  -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $this->db->where('order_no',$invoice);
                 $dt= $this->db->get("order_detail")->result();
                  ?>
                  <?php  $i=1; $tq=0;$tp=0;$tt=0;
                  foreach($dt as $row):?>
                  <tr class="text-uppercase">
                    <td style="width:10px;" class="text-center"><?php echo $i;?></td>
                     <?php 
                          $this->db->where('id',$row->p_code);
                          $dt1= $this->db->get("stock_products")->row();

                          $this->db->where('order_no',$invoice);
                          $dt2= $this->db->get("order_serial")->row();
                           $this->db->where('id',$dt2->cust_id);
                          $cust= $this->db->get("customers")->row();
                           ?>
                             <td style="width:10px;"><?php echo  $cust->username;?></td>
                              <td style="width:10px;"><?php echo  $dt1->company;?></td>
                               <td style="width:10px;"><?php echo  $cust->name;?></td>
                      <td style="width:10px;"><?php echo  $dt1->name;?></td>
                      <td style="width:10px;" class="text-center"><?php  echo $dt1->p_type;?></td>
                      <td style="width:10px;"  class="text-center"><?php  echo $dt1->size;?></td> 
                      <td style="width:10px;"><?php echo $dt1->hsn;?></td>
                       <td style="width:10px;" class="text-center"><?php $tq+=$row->quantity; echo $row->quantity;?></td>
                      <td style="width:10px;" class="text-center"><?php $tp+=$dt1->selling_price; echo $dt1->selling_price;?></td> 
                      <td style="width:10px;" class="text-center"><?php $tt+=$row->subtotal; echo $row->subtotal;?></td>
                      <td style="width:10px;"><?php echo $row->date;?></td>
                      <td style="width:10px;"><?php echo $invoice;?></td>
                     <td style="width:10px;"><?php 
                      $this->db->where("order_no",$invoice);
	   $checkv = $this->db->get("order_serial")->row();
                     ?><button id ="st<?php echo $i;?>" class="btn btn-warning"><?php if($checkv->status==0){ echo "Pending";}else{ echo "Verified"; }?></button></td>
                     <!-- <td><?php if($dt2->status==0){?><a href="<?php echo base_url();?>wallet/deleteorder/<?php echo $row->order_no;?>" class="btn btn-primary">Delete</a><?php } else { ?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $row->order_no?>" class="btn btn-primary">Show</a><?php }?></td> -->
                  </tr>
                  <?php  $i++;
                endforeach;
                   ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>
                    <th style="width:10px;"></th>
                     <th style="width:10px;"></th>
                    <th style="width:10px;">Grand Total</th>
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
                 <center><div><button id="orderc" class="btn btn-success"><span style="font-size:35px;"> Order Confirmed </span></button></div></center>                                   
    </div>
    <script>
         $('#orderc').click(function(){
      var oid = $('#order_id').val();
     
      
     $.post("<?php echo site_url('shopController/orderConfirm')?>", {oid  : oid }, function(data){ 
        if(data == 9){
             alert("You Have Already Confirm this Order");
        }else{
        <?php for($s=1;$s<$i; $s++){?>
         $('#st<?php echo $s;?>').html(data);
        
       <?php  } ?>
       
        }
      })
    });
    </script>
   
</div>
</div>
</div>
</div>

          
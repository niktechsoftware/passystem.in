                               <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                   
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold"> Order List Details</h5></center>
                                                </div>
                                                <input type="hidden" name ="subid"  id ="subid" value = "<?php echo $subid;?>" >
                                                <div class="panel-body">
                                                    <div class="<?php if(($this->uri->segment(3)==1) || ($this->uri->segment(3)==3)){ echo 'col-sm-12'; }else{ echo 'col-sm-6'; }?>">
                                               <div class=" table-responsive">
                  <table id="pendingorder" class="table  table-bordered ">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                    <th>Order Number</th>
                   <th> Name</th>
                    <th> Shop Name</th>
                    <th> Username</th>
                    <th>T. Quantity</th>
                    <th>T. Amount</th>
                    <th>Order Date</th>
                    <?php if($this->uri->segment(3)==1 || ($this->uri->segment(3)==3)){?>
                    <th>Shop status</th>
                    <th>Lock & Order Assign</th>
                    
                     <th>Invoice Detail</th>
                    <th>DI Status</th>
                    <th>Payment</th>
                 <?php }?>
                  </tr>
                </thead>
                <tbody>
                    
                  <?php 
                       //print_r($orderdetails);
                   
                  $i=1;
                 foreach($avaible as $row): 
                    //echo $row;
                   $this->db->where('order_no',$row);
                     $dt= $this->db->get("order_serial");
                     if($dt->num_rows()>0){
                        $orderdata=$dt->result(); 

                 
                 foreach($orderdata as $row): 
                 
                    $this->db->where('id',$row->cust_id);
                      $custdetail1=$this->db->get('customers')->row();
                  //    $row=$orderdata->row();
                      
                //   print_r($row);
                //      exit();
                  ?>
                  <tr class="text-uppercase text-center">
                    <td><?php echo $i;?></td>
                    
              
                <?php if(($this->uri->segment(3)==2) ){?>
                      <td><a href="#" id="selectlid<?php echo $i;?>"  class="btn btn-danger"><?php echo $row->order_no;?></a>
                      <input type="hidden" id="order<?php echo $i;?>" value ="<?php echo $row->order_no;?>"
                      <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
                      </td>
                      <?php }else{?>
                       <td><a href="<?php echo base_url()?>shopController/adminproductdeatil/<?php echo $row->order_no;?>" class="btn btn-success"><?php echo $row->order_no;?></a></td>
                     <?php }?>
                     
                     
                        <td><?php echo $custdetail1->name;?></td>
                         <td><?php $this->db->where("id",$custdetail1->sub_branchid);
                        $sbd =  $this->db->get("sub_branch")->row();
                         
                         
                         echo $sbd->bname;?></td>
                          <td><?php echo $custdetail1->username;?></td>
                      <?php 
                             $this->db->select_sum('quantity');
                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$row->order_no);
                             $this->db->where('cust_id',$row->cust_id);
                             $this->db->where('date',$row->order_date);
                             $dt1= $this->db->get("order_detail")->row();
                           
                           ?>
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                       <?php if($this->uri->segment(3)==1 || ($this->uri->segment(3)==3)){?>
                        <td><?php if($row->status ==0 ){?><a href="#" class="btn btn-success"><?php echo "Pending";?></a><?php } else { echo "Confirmed";}?></a></td>
                    <td><?php if($row->status==0 && $row->shop_order==0){?>
                   
                     <button type="sumbit"  class="btn btn-warning"><?php echo "Assign"?><?php } elseif($row->status==0 && $row->shop_order==1){ ?>
                          <input type="hidden" id="orderno<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
                     <button type="sumbit" id="assign<?php echo $i;?>" class="btn btn-warning"><?php echo "Assign"?></button><select id="delivery<?php echo $i;?>" class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;"></select>
                    <?php } else{  
                       
                       $lock =  $this->db->get("lock_master");
                       if($lock->num_rows()>0){
                       ?>
                
                
                
                 <select class="form-control text-uppercase"  id="lockid<?php echo $i;?>" style="max-height:40px;max-width:120px;margin-left:-12px;color:#01a9ac">
             <option>-Lock-</option>
           <?php if($lock->num_rows()>0){
               foreach($lock->result() as $rc)
               {           
               ?> 
          <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $rc->id;?>" <?php if($rc->id == $row->lock_id): echo 'selected="selected"'; endif; ?>><?php echo  $rc->lock_no;?></option>     
                    
              <?php } ?>
                
            <?php }?></select>
                <?php }else{ echo "Lock not Free";}
                
                  $id= $this->session->userdata("id");
                    $aa= array('sub_branchid'=>$id,
                                'emp_type'=>'5',
                                'status'=>'1');
                      // $this->db->where('sub_branchid',$id);
                      // $this->db->where('emp_type',5);
                      // $this->db->where('status',1);
                      $this->db->where($aa);
                      $deliveryboy=$this->db->get('employee');//->num_rows();
                      // echo $deliveryboy;
                      // exit;
                          
                      ?>
                    <br>   <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
         <select class="form-control text-uppercase"  id="selectdelivery<?php echo $i;?>" style="max-height:40px;max-width:120px;margin-left:-12px;color:#01a9ac">
             <option>-Assign to-</option>
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
                     
                      
                        <td><a href="<?php echo base_url();?>shopController/invoice/<?php echo $row->order_no?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a></td> 
                        
                    <td><?php if($row->order_status==0){?><a href="#" class="btn btn-warning"><?php echo "Not Deliver"?></a><?php } else {?><a href="#" class="btn btn-danger"><?php echo "Delivered";?></a><?php }?></td>
                    
                  <td><?php if($row->ad_rec_pay==0){?><a href="<?php echo base_url();?>shopController/admincash/<?php echo $row->order_no?>" class="btn btn-success"><?php echo "Not Recieve";?></a><?php }else{?><a href="#" class="btn btn-info"><?php echo "Recieve";?></a><?php }?></td>
                  <?php }else{
                  ?>
                  </td>
                  
                <?php  }?>
                  
                  
                  </tr>
              
                <script>
                    $('#selectlid<?php echo $i;?>').click(function(){
                          var orderno = $('#order<?php echo $i;?>').val();
                          var subid =$('#subid').val();
                          //alert(orderno);
                          $.post("<?php echo site_url('shopController/findlessproduct')?>", {orderno:orderno , subid : subid }, function(data){ 
                         
                              $('#showdetails').html(data);
                          })
                        });
                        </script>
      <?php  $i++;  endforeach;  } endforeach; ?>
                </tbody>

              </table>

            </div>
                                                   
                                                      </div>    
                                                         <div class="col-sm-6" id ="showdetails">
                                                            
                                                        </div>
                                                       
                   
        </div>
    
    </div>
    </div>
    </div>
    </div>
</div>


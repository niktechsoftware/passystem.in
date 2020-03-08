                               <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold">Paid Order List</h5></center>
                                                </div>
                                                <div class="panel-body">
                   <div class="dt-responsive table-responsive">
                  <table id="paidorder" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                    <th>Order Number</th>
                    <th> Name</th>
                    <th> Username</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                    <th>DI. Name</th>
                    <th>Shop status</th>
                     <th>Invoice Detail</th>
                    <th>DI Order Status</th>
                    <th>Payment Recieve</th>
                 
                  </tr>
                </thead>
                <tbody>
                    
                  <?php
                        $subid=$this->session->userdata('id');

                      $where =array('sub_branchid'=>$subid, 'status' =>1, 'order_status' =>1, 'ad_rec_pay'  =>1);
                      $this->db->where($where);
                     $dt= $this->db->get("order_serial");
                    //  print_r($dt->num_rows());
                     if($dt->num_rows()>0){
                        $orderdata=$dt->result(); 

                     //   print_r($dt->num_rows());
                     
                  ?>
                  <?php  $i=1;
                 foreach($orderdata as $row): 
                 
                    $this->db->where('id',$row->cust_id);
                      $custdetail1=$this->db->get('customers')->row();
                  //    $row=$orderdata->row();
                      
                //   print_r($row);
                //      exit();
                  ?>
                  <tr class="text-uppercase text-center">
                    <td><?php echo $i;?></td>
                    
              
                    
                      <td><a href="<?php echo base_url()?>shopController/adminproductdeatil/<?php echo $row->order_no;?>" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
                        <td><?php echo $custdetail1->name;?></td>
                          <td><?php echo $custdetail1->username;?></td>
                      <?php 
                             $this->db->select_sum('quantity');
                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$row->order_no);
                             $this->db->where('cust_id',$row->cust_id);
                             $this->db->where('date',$row->order_date);
                             $dt1= $this->db->get("order_detail")->row();
                            // print_r($dt1);
                            // exit();
                             $this->db->where('id',$row->del_boy_id);
                             $deliveryboy=$this->db->get('employee')->row();
                           ?>
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                      <td><?php echo  $deliveryboy->name." [". $deliveryboy->username. "] ";?></td>
                      <td><?php if($row->status ==1 && $row->shop_order == 1 ){?><?php echo "Order Confirm";?></a><?php  }  ?> </td>
                      
                        <td><?php if($row->shop_order == 1){?><a href="<?php echo base_url();?>shopController/invoice/<?php echo $row->order_no?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-alert"><?php echo $row->invoice_no;?></a><?php }?></td> 
                        
                    <td><?php if($row->order_status==1){?><a href="#" class="btn btn-warning"><?php echo "Order Deliver"?></a><?php } else {?><a href="#" class="btn btn-danger"><?php echo "Not Deliver";?></a><?php }?></td>
                    
                   <td><?php if($row->ad_rec_pay==1){?><?php echo "Payment Recieve";?><?php }else{?><a href="#" class="btn btn-info"><?php echo "Payment Not  Recieve"?></a><?php }?></td>
                  
                  </tr>



                  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

                  <script>
                  $(document).ready(function() {
                      
                 $('#delivery<?php echo $i;?>').hide();    
                 $('#assign<?php echo $i;?>').click(function(){
              
               // alert(orderno);
              $.post("<?php echo site_url('wallet/selectdelivery')?>", {}, function(data){
                $('#assign<?php echo $i;?>').hide();
                 $('#delivery<?php echo $i;?>').show(); 
                 $('#delivery<?php echo $i;?>').html(data);
                      })
                    });
    
    $('#delivery<?php echo $i;?>').change(function(){
      var id = $('#delivery<?php echo $i;?>').val();
      var orderno = $('#orderno<?php echo $i; ?>').val();
      $.post("<?php echo site_url('wallet/assigntodelivery')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
    
     $('#selectdelivery<?php echo $i;?>').change(function(){
      var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno1<?php echo $i; ?>').val();
      $.post("<?php echo site_url('wallet/assignagaindelivery')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
    
    
    //   $('#paymentrecive<?php echo $i;?>').hide();
     $('#payment<?php echo $i;?>').click(function(){
       // var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno2<?php echo $i; ?>').val();
    // alert(orderno);
      $.post("<?php echo site_url('wallet/admincash')?>", {orderno:orderno}, function(data){ 
         // alert(data);
         $('#show').html(data);
         $('#payment<?php echo $i;?>').hide();
      })
    });
    
    
  });
</script> 

                  <?php  $i++;
              //  endforeach;
                    
       endforeach;  } ?>
                </tbody>

              </table>
                                                    </div>
                                                </div>
                                                 <center>  <a href="<?php echo base_url();?>shopController/index"  class ="btn btn-info">Done</a></center>
                                            </div>
                                            </div>
                                            </div>
                                            </div>



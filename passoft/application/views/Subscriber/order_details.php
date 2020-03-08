 <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="panel-title"> Order List</h5></center>
                                                </div>
                                                <div class="panel-body">
                   <div class="dt-responsive table-responsive">
                  <table id="sample-table-2" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                    <th>Order Number</th>
                    <th>Subscriber Name</th>
                    <th>Total Quantity</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                    <th>Invoice Detail</th>
                     <th>Order status</th>
                    <!--<th>Payment Approve</th>-->
                    
                   <!--  <th>Activity</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $id=$this->session->userdata('id');
                       $this->db->where('cust_id',$id);
                      
                 $dt= $this->db->get("order_serial")->result();
                  ?>
                  <?php  $i=1;
                  foreach($dt as $row):?>
                  <tr class="text-uppercase">
                    <td><?php echo $i;?></td>
                      <td><a href="#" class="btn btn-danger"><?php echo $row->order_no;?></a></td>
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
                            
                             
                           ?>
                       <td><?php echo $custdetail->name;?></td> 
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                     <td><?php if($row->order_status == 1){?><a href="<?php echo base_url();?>subscriberController/invoice/<?php echo $row->order_no?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }else{?><a href="<?php echo base_url();?>subscriberController/invoice/<?php echo $row->order_no?>" class="btn btn-primary"><?php echo $row->invoice_no;?></a><?php }?></td>
                
           
            <td><?php if($row->order_status == 0) { ?><button type="submit" class="btn btn-danger" >Not Deliver </button><?php } else { ?><button type="submit" class="btn btn-warning" >Order Deliver </button><?php }?></td>
             </tr>  
             
              <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
 <center><div><a href="<?php echo base_url();?>subscriberController/index" class="btn btn-success"><span style="font-size:20px;">Done</span></a></div></center>                                                  
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

          
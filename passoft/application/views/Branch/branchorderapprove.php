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
      <table id="orderlist" class="table table-striped table-bordered nowrap">
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
                      // $this->db->where('cust_username',$username);
                      
                       $this->db->where('district',$this->session->userdata('id'));
                       $sub=$this->db->get("sub_branch");
                       if($sub->num_rows()>0){
                           $i=1;
                           foreach($sub->result() as $subdt):
                           $this->db->where("sub_branchid",$subdt->id);
                       
                            $dt= $this->db->get("order_serial");
                 if($dt->num_rows()>0){ 
                    $row= $dt->row();
                  ?>
                  <?php  
                  
                 $bname= $this->session->userdata('name');
                  
                  
                  
                  ?>
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
                             $custdetail=$this->db->get('customers');
                            if($custdetail->num_rows()>0){
                               $custdata= $custdetail->row();
                            
                           ?>
                       <td><?php  echo $custdata->name; ?></td> 
                       <?php } else{?> 
                       <td><?php  echo "N/A";?></td> 
                       <?php }?>
                        <td><?php echo $bname;?></td>
                        <td><?php echo  $subdt->bname;?></td> 
                        
                      <td><?php echo $dt1->quantity;?></td>
                      <td><?php echo $dt1->subtotal;?></td>
                      <td><?php echo $row->order_date;?></td>
                     <td><?php if($row->status==0){?>
                     <input type="hidden" id="orderno<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
                     <button type="sumbit" id="assign<?php echo $i;?>" class="btn btn-warning"><?php echo "Assign"?></button><select id="delivery<?php echo $i;?>" class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;"></select><?php } else {  
                      $deliveryboy=$this->db->get('delivery_boy');
                      ?>
                       <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $row->order_no;?>">
         <select class="form-control text-uppercase"  id="selectdelivery<?php echo $i;?>" style="max-height:40px;max-width:120px;margin-left:-12px;color:#01a9ac">
           <?php if($deliveryboy->num_rows()>0) {
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
      })
    });
    
     $('#selectdelivery<?php echo $i;?>').change(function(){
      var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno1<?php echo $i; ?>').val();
      $.post("<?php echo site_url('adminController/assignagaindelivery')?>", {id : id,orderno:orderno}, function(data){ 
      })
    });
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
                  <?php  
                
                 $i++; }  endforeach; } ?>
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

          
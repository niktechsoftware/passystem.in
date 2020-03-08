                               <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                   
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold"> Order List Details</h5></center>
                                                </div>
                                                
                                                <div class="panel-body">
                                                    <div class='col-sm-6'>
                                               <div class=" table-responsive">
                  <table id="pendingorder" class="table  table-bordered ">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                     <th>Shop Name</th>
                    <th> Username</th>
                    <th>Invoice</th>
                   <th> Del. Incharge</th>
                    <th>Lock No</th>
                    <th>Order Date</th>
                  
                  </tr>
                </thead>
                <tbody>
                    
                  <?php 
                    
                  $i=1;if($shopusername->num_rows()>0){
                 foreach($shopusername->result() as $row): 
                     if($row->reciver_usernm!="muskan"){
                     $this->db->where("username",$row->reciver_usernm);
                    $sbd = $this->db->get("sub_branch")->row();
                     $this->db->distinct();
                     $this->db->select("invoice_number");
                 $this->db->where("reciver_usernm",$row->reciver_usernm);
                 $invoicen = $this->db->get("product_trans_detail");
                      
                  $this->db->distinct();
                     $this->db->select("lock_no");
                 $this->db->where("reciver_usernm",$row->reciver_usernm);
                 $lno = $this->db->get("product_trans_detail");
                 foreach($invoicen->result() as $inc):
                       $this->db->distinct();
                     $this->db->select("del_boy , date , lock_no");
                 $this->db->where("invoice_number",$inc->invoice_number);
                 $delid = $this->db->get("product_trans_detail")->row();
                 ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><a href="#" id="selectlid<?php echo $i;?>"  class="btn btn-info"><?php echo $sbd->bname;?></a>
                      <input type="hidden" id="order<?php echo $i;?>" value ="<?php echo $sbd->username;?>" >
                      </td>
                     <td><?php echo $sbd->username;?></td>
                    <td><a href="<?php echo base_url();?>stockController/productinvoice/<?php echo  $inc->invoice_number;?>" class="btn btn-danger"> <?php echo  $inc->invoice_number;?></a></td>
                    <td><?php echo $delid->del_boy;?></td>
                    <td><?php echo $delid->lock_no;?></td>
                    <td><?php echo $delid->date;?></td>
                   
                  </tr>
              <?php $i++; endforeach;?>
                <script>
                   <!-- $('#selectlid<?php echo $i;?>').click(function(){
                          var orderno = $('#order<?php echo $i;?>').val();
                          var subid =$('#subid').val();
                          //alert(orderno);
                          $.post("<?php echo site_url('shopController/findlessproduct')?>", {orderno:orderno , subid : subid }, function(data){ 
                         
                              $('#showdetails').html(data);
                          })
                        });
                        </script>-->
      <?php  $i++;  } endforeach;  } ?>
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


<div style="color:red; margin-top:10px;margin-bottom:10px;">
    <h4>Transfer List</h4>
</div>
    <table id="transfer_p" class="table table-bordered">
        <thead>
            <tr>
              <th style="width:8px;">#</th>
              <th style="width:8px;">P.Name</th>
              <th style="width:8px;">P.Code</th>
              <th style="width:8px;">Size</th>
              <!--<th style="width:8px;">Image</th>-->
              <th style="width:8px;">Qt</th>
              <th style="width:8px;">Date</th>
              <th style="width:8px;">Remove</th>
            </tr>
        </thead>
        <tbody>
          <?php
                    $this->db->where('invoice_number','');
                  
                    $this->db->where('status','0');
                    $this->db->where('sender_usernm',$this->session->userdata('username'));
                   
                    $this->db->where('reciver_usernm',$idd);
                    $pd = $this->db->get('product_trans_detail')->result();
                   ?>
                    <?php  $j=1; 
                foreach($pd as $pdt)
                { ?>
                <tr>
                    <td><?php echo $j;?></td>
                    <?php 
                    $this->db->where('id',$pdt->p_code);
                    $pdata = $this->db->get('stock_products');
                    if($pdata->num_rows()>0)
                    { 
                        $p_data = $pdata->row();?>
                        <td><?php echo $p_data->name;?></td>
                        <td><?php echo $p_data->sec;?></td>
                        <td><?php echo $p_data->size;?></td>  
                    <?php }
                    else
                    { ?>
                        <td><?php echo "N/A";?></td>
                        <td><?php echo "N/A";?></td>
                        <td><?php echo "N/A";?></td>  
                    <?php
                    }
                    ?>
                    <td><?php echo $pdt->quantity;?></td>
                    <input type="hidden" id="dlt_id<?php echo $j;?>" value="<?php echo $pdt->id;?>"/>
                    <td><?php echo $pdt->date;?></td>
                    <td><input type="button" id="dltt<?php echo $j;?>" class="btn btn-danger" value="Remove"></td>
                </tr>   
                <script>
                    $("#dltt<?php echo $j;?>").click(function(){
                        var dlt_id = $("#dlt_id<?php echo $j;?>").val();
                        alert("Are You Sure delete the product with trasferlist");
                        $.post("<?php echo site_url();?>stockController/delete_tranfr_pro",{dlt_id:dlt_id},function(data){
                           
                            $("#dltt<?php echo $j;?>").val(data);
                            // $("#");
                        });
                    });
                    
                    
                </script>
            <?php   $j++; }
                
            ?>
        </tbody>
    </table><?php if( $j>1){?>
    
    <form method="post" action="<?php echo base_url()?>index.php/stockController/generate_invoice">
    
     <div class="col-md-12 row">
             <div class="col-md-4">
                                                             <label >Assign Delivery Incharge</label>
                                                            <?php 
                                                           $id= $this->session->userdata("id");
                    $aa= array('district'=>$id,
                                'emp_type'=>'5',
                                'status'=>'1');
                     
                      $this->db->where($aa);
                      $deliveryboy=$this->db->get('employee');?>
                       <select class="form-control text-uppercase"  name = "selectdelivery" id="selectdelivery" style="width:180px;" class= class="form-control" required="required">
                            <option value="">-Assign to-</option>
                            <?php if($deliveryboy->num_rows()>0) {
                               foreach($deliveryboy->result() as $row1)  {  
                               ?> 
                                <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row1->id;?>"><?php echo  $row1->name." [ ". $row1->username. " ] ";?></option>     
                                    
                              <?php }  }?>
                             </select>
                            </div>
                                             <div class="col-md-4"> <label >Enter Lock No.</label>
                                                 <input type="text" name="lock" id ="lockno" placeholder = "Lock"  style="width:180px;" class= class="form-control" required="required" />
                                                 <input type="text" name="pass" id ="locknop"  style="width:180px;" class= class="form-control" required="required"  required="required" readonly/>
                                                 </div>
                                                 <script>
                                                         $('#lockno').keyup(function(){
                                                            var lockno = $('#lockno').val();
                                                            $.post("<?php echo site_url("stockController/checklocp") ?>", {lockno : lockno}, function(data){
                                                            $('#locknop').val(data);
                                                            });
                                                            });
                                                 </script>
                                                 
                                                 <div class="col-md-2">
                                                     <input type="hidden" name = "reciever" value = "<?php echo $idd;?>" />
                                                   <button class="btn btn-success" target="_blank">Generate Invoice</button>
                                                     </div>
                                             </div> 
     </form>
      <?php }?>
 
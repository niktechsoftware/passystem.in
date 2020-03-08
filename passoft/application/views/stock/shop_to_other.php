<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- start: EXPORT DATA TABLE PANEL  -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
          <h4 class="panel-title"> <span class="text-bold">Transfer Product From Shop Stock</span></h4>
        </div>
        <div class="panel-body">
          <!--<div class="row">-->

            <div class="row">
                <center>
                    <label style="font-size:18px; color:purple;">RECEIVER</label>
                    <input style="height:35px; width:20px; vertical-align: middle;" type="radio" name="branch" value='3' id="admin"><label style="font-size:16px;">Admin</label>
                    <input style="height:35px; width:20px; vertical-align: middle;" type="radio" name="branch" value='1' id="branch"><label style="font-size:16px;">Branch</label>
                </center>  
                <div id="bcode" style="margin-top:10px;">
                    <div class="col-md-5">
                        <div class="card-block">
                            <?php $dt = $this->db->get('branch')->result();?>
                              <select class="form-control" id="selectid" name="branchh" style="height:40px;">
                                <option value="">Select Branch</option>
                                <?php foreach($dt as $bdt) { ?>
                                <option value="<?php echo $bdt->id;?>"><?php echo $bdt->b_name;?></option>
                                <?php } ?>
                                
                              </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div style="color:green ;margin-top:10px;margin-bottom:10px;">
                        <h4>Shop Stock List</h4>
                    </div>
                    <table id="sample-table-2" class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width:8px;">#</th>
                              <th style="width:8px;">P.Name</th>
                              <th style="width:8px;">P.Code</th>
                              <th style="width:8px;">Size</th>
                              <th style="width:8px;">Image</th>
                              <th style="width:8px;">Qt</th>
                              <th style="width:8px;">E.Qt.</th>
                              <th style="width:8px;">Action</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                $this->db->where('subbranch_id',$this->session->userdata('id'));
                                $this->db->where('rec_quantity >',0);
                                $dt= $this->db->get("subbranch_wallet");
                                if($dt->num_rows()>0){ ?>
                                <?php  $i=1;
                                foreach($dt->result() as $row2){ 
                                 $this->db->where('id',$row2->p_code);
                                 $st_dt= $this->db->get("stock_products");
                                 if($st_dt->num_rows>0)
                                 {
                                     $row = $st_dt->row(); 
                                
                                 
                                ?>
                            <tr>
                                <td style="width:8px;"><?php echo $i;?></td>
                                <input type="hidden" id="pcode<?php echo $i;?>" name="p_code<?php echo $i;?>" value="<?php echo $row->id;?>">
                                <td style="width:8px;"><?php echo $row->name;?></td>
                                <td style="width:8px;"><?php echo $row->hsn;?></td>
                                <td style="width:8px;"><?php echo $row->size;?></td>
                                <td style="width:8px;">
                                    <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1; ?>" style="height:50px;width:50px;" class="zoom1">
                                </td>
                                <td style="width:8px;"><?php echo $row2->rec_quantity;?></td>
                                <td style="width:8px;">
                                    <input style="width:70px;" type="number" name="sendquantity" id="sendquantity<?php echo $i;?>">
                                </td>
                                <td style="width:8px;">
                                    <button type="sumbit" id="adminbutton<?php echo $i;?>" class="btn btn-danger">Send</button>
                                    <button type="sumbit" id="showid<?php echo $i;?>" class="btn btn-success">Sent</button>
                                </td>
                            </tr>
                            <script>
                               
                                $('#showid<?php echo $i;?>').hide();
                                $("#adminbutton<?php echo $i;?>").click(function() {
                                    if ($("#admin").is(":checked"))
                                    {
                                        var t = 3;
                                        var send_qty = $("#sendquantity<?php echo $i;?>").val();
                                        var pcode = $("#pcode<?php echo $i;?>").val();
                                        // alert(receiver_id);
                                        alert(send_qty);
                                        alert(pcode);
                                        if(send_qty>0 && pcode.length>0 )
                                        {
                                             $.post("<?php echo site_url();?>stockController/transfer_pro",{t:t,send_qty:send_qty,pcode:pcode},function(data){
                                                $("#transfer_pro").html(data);
                                             });
                                        }
                                        else
                                        {
                                            alert("Please Enter Correct Data");
                                        }
                                    }
                                   if ($("#branch").is(":checked"))
                                    {
                                        var t = 1;
                                        var receiver_id = $("#bselectid").val();
                                        var send_qty = $("#sendquantity<?php echo $i;?>").val();
                                        var pcode = $("#pcode<?php echo $i;?>").val();
                                        // // var idd = $("#select_sender").val();
                                        // alert(receiver_id);
                                        // alert(send_qty);
                                        // alert(pcode);
                                        if(receiver_id.length>0 && send_qty>0 && pcode.length>0 )
                                        {
                                             $.post("<?php echo site_url();?>stockController/transfer_pro",{t:t,receiver_id:receiver_id,send_qty:send_qty,pcode:pcode},function(data){
                                                $("#transfer_pro").html(data);
                                             });
                                        }
                                        else
                                        {
                                            alert("Please Enter Correct Data");
                                        }
                                    }
                                   
                                });
                            </script>
                            <?php $i++; 
                                 } 
                                }
                            }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6" id="transfer_pro">
                 
                </div>
            </div>
            
            <script>
            $(document).ready(function(){
                $('#bcode').hide();
                
                $('#branch').click(function(){
                    $('#bcode').show();
                });
                
                $('#admin').click(function(){
                      $('#bcode').hide();
                    
                });
            });
                 
                $("#selectid").change(function(){
                    var selectidd = $("#selectid").val();
                    $.post('<?php echo site_url();?>stockController/get_data_ad',{selectidd:selectidd},function(data){
                        //alert(data);
                        $("#select_sender").html(data);
                    });
                });
            </script>
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
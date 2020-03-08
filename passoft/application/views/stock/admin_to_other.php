<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- start: EXPORT DATA TABLE PANEL  -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
          <h4 class="panel-title"> <span class="text-bold">Transfer Product From Admin Stock</span></h4>
        </div>
        <div class="panel-body">
          <!--<div class="row">-->

            <div class="row">
                <center>
                    <label style="font-size:18px; color:purple;">RECEIVER</label>
                    <input style="height:35px; width:20px; vertical-align: middle;" type="radio" name="branch" value='1' id="branch"><label style="font-size:16px;">Branch</label>
                    <input style="height:35px; width:20px; vertical-align: middle;" type="radio" name="branch" value='2' id="shop"><label style="font-size:16px;">Shop</label>
                </center>  
                <div id="bcode" style="margin-top:10px;">
                    <div class="col-md-5">
                        <div class="card-block">
                            <?php $dt = $this->db->get('branch')->result();?>
                              <select class="form-control" id="bselectid" style="height:40px;">
                                <option value="">Select Branch</option>
                                <?php foreach($dt as $bdt) { ?>
                                <option value="<?php echo $bdt->id;?>"><?php echo $bdt->b_name;?></option>
                                <?php } ?>
                                <!--<option value="2">Shop</option>-->
                                <!--<option value="3"></option>-->
                              </select>
                        </div>
                    </div>
                </div>
                <div id="shcode" style="margin-top:10px;">
                    <div class="col-md-5">
                        <div class="card-block">
                            <?php $dt = $this->db->get('branch')->result();?>
                              <select class="form-control" id="selectid" name="branchh" style="height:40px;">
                                <option value="">Select Branch</option>
                                <?php foreach($dt as $bdt) { ?>
                                <option value="<?php echo $bdt->id;?>"><?php echo $bdt->b_name;?></option>
                                <?php } ?>
                                <!--<option value="2">Shop</option>-->
                                <!--<option value="3"></option>-->
                              </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                          
                    </div>
                    <div class="col-md-5" id="hid">
                        <select class="form-control" id="select_sender" name="shopp" style="height:40px;">
                            <option value="">Select</option>
                            <!--<option value="1"> </option>-->
                            <!--<option value="2">Shop</option>-->
                            <!--<option value="3"></option>-->
                        </select>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                         <!--<h6  class="btn btn-primary" style="float:left;font-size:20px" > Total Amount  : <span style="color:yellow;font-size:20px;" id="total" > Rs-->
                         <?php
                            //   $this->db->select_sum('price');
                            //   $this->db->where('cust_usr',$this->session->userdata('id'));
                            //   $dt1= $this->db->get("purchase_list")->row();
                            //   echo   $dt1->price;
                              ?> 
                              <!--</span> </h6>-->
                    </div>
                    <div style="color:green ;margin-top:10px;margin-bottom:10px;">
                        <h4>Admin Stock List</h4>
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
                                $this->db->where('quantity >',6);
                                $dt= $this->db->get("stock_products");
                                if($dt->num_rows()>0){ ?>
                                <?php  $i=1;
                                foreach($dt->result() as $row){ ?>
                            <tr>
                                <td style="width:8px;"><?php echo $i;?></td>
                                <input type="hidden" id="pcode<?php echo $i;?>" name="p_code<?php echo $i;?>" value="<?php echo $row->id;?>">
                                <td style="width:8px;"><?php echo $row->name;?></td>
                                <td style="width:8px;"><?php echo $row->hsn;?></td>
                                <td style="width:8px;"><?php echo $row->size;?></td>
                                <td style="width:8px;">
                                    <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1; ?>" style="height:50px;width:50px;" class="zoom1">
                                </td>
                                <td style="width:8px;"><input style="width:70px;" type="number" name="cquantity" id="cquantity<?php echo $i;?>" value = "<?php echo $row->quantity;?>" readonly></td>
                                <td style="width:8px;">
                                  
                                    <input style="width:70px;" type="number" name="sendquantity" id="sendquantity<?php echo $i;?>">
                                </td>
                                <td style="width:8px;">
                                    <button type="sumbit" id="adminbutton<?php echo $i;?>" class="btn btn-danger">Send</button>
                                   
                                </td>
                            </tr>
                            <script>
                               
                               
                                
                                
                                $("#adminbutton<?php echo $i;?>").click(function() {
                                    var cquantity = Number($("#cquantity<?php echo $i;?>").val());
                                     var send_qty = Number($("#sendquantity<?php echo $i;?>").val());
                                    // alert(send_qty);
                                     // alert(cquantity);
                                     if(send_qty < cquantity){
                                       //  alert(cquantity);
                                        // alert(send_qty);
                                         $("#cquantity<?php echo $i;?>").val(cquantity-send_qty);
                                    if ($("#branch").is(":checked"))
                                    {
                                        var t = 1;
                                        var receiver_id = $("#bselectid").val();
                                        var send_qty = $("#sendquantity<?php echo $i;?>").val();
                                        var pcode = $("#pcode<?php echo $i;?>").val();
                                    
                                        if(receiver_id.length>0 && send_qty>0 && pcode.length>0 )
                                        {
                                             $.post("<?php echo site_url();?>stockController/transfer_pro",{t:t,receiver_id:receiver_id,send_qty:send_qty,pcode:pcode,cquantity : cquantity},function(data){
                                                $("#transfer_pro").html(data);
                                               
                                                //  alert(data);
                                                //  $("#transfer_p").load(location.href+" #transfer_p>","");
                                             });
                                        }
                                        else
                                        {
                                            alert("Please Enter Correct Data");
                                        }
                                    }
                                    if ($("#shop").is(":checked"))
                                    {
                                        var t = 2;
                                        var receiver_id = $("#select_sender").val();
                                        var send_qty = $("#sendquantity<?php echo $i;?>").val();
                                        var pcode = $("#pcode<?php echo $i;?>").val();
                                         if(send_qty < cquantity){
                                              $("#cquantity<?php echo $i;?>").val(cquantity-send_qty);
                                     //alert(select_sender);
                                       /* alert(receiver_id);
                                         alert(send_qty);
                                         alert(pcode);*/
                                        if(receiver_id.length>0 && send_qty>0 && pcode.length>0 )
                                        {
                                             $.post("<?php echo site_url();?>stockController/transfer_pro",{t:t,receiver_id:receiver_id,send_qty:send_qty,pcode:pcode,cquantity : cquantity},function(data){
                                                $("#transfer_pro").html(data);
                                               // alert($((cquantity-send_qty));
                                                
                                                //  alert(data);
                                                //  $("#transfer_p").load(location.href+" #transfer_p>","");
                                             });
                                        }
                                        else
                                        {
                                            alert("Please Enter Correct Data");
                                        }
                                    }
                                   
                                 
                                     }}else{
                                         alert("Please Send Valid Quantity.");
                                     }
                                });
                            </script>
                            <?php $i++; 
                                    
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
                $('#shcode').hide();
                 $('#bcode').hide();
                $('#shop').click(function(){
                    $('#shcode').show();
                      $('#bcode').hide();
                    //   $("#adminbutton<?php //echo $i;?>").click(function() {});
                });
                 $('#branch').click(function(){
                    $('#bcode').show();
                    $('#shcode').hide();
                    // $("#adminbutton<?php //echo $i;?>").click(function() {});
                });
            });
                 
                $("#selectid").change(function(){
                    var selectidd = $("#selectid").val();
                     //alert(selectidd);
                    //  $("#select_sender").val(selectidd);
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
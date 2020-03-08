<div class="page-body">
  <div class="row">
    <!-- <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">
    </script> -->

    <input type="hidden" id="adminreciver" value="<?php echo $adminreciver;?>" />
    <input type="hidden" id="branchreciver" value="<?php echo $branchreciver;?>" />
    <input type="hidden" id="subbranchreciver" value="<?php echo $subbranchreciver;?>" />
    <table id="shoppro" class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>SNO</th>
          <th>Product Name</th>
          <th>Product Code</th>
           <th style="width:8px;">Size</th>
          <th style="width:8px;">Image </th>
          <th>Quantity</th>
          <th>Send Quantity</th>
          <th>Activity</th>
        </tr>
      </thead>
      <tbody>
        <?php  $i=1;
                  foreach($brproduct  as $row):?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>

          <?php 
          $this->db->where('id',$row->p_code);
         $productst=$this->db->get('stock_products')->row();
       ?>

          <td style="width:20px;"><?php echo $productst->name;?>
          </td>
          <td><?php echo $row->p_code;?></td>
          <input type="hidden" name="sbrp_code" id="sbrp_code<?php echo $i;?>" value="<?php echo $row->p_code;?>">
          </td>
            <td style="width:8px;color:black;"><?php echo $productst->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $productst->file1; ?>"
                                                style="height:50px;width:30px;"class="zoom1" > </td>
          <td><?php echo $row->rec_quantity?>
            <input type="hidden" name="sbrrec_quantity" id="sbrrec_quantity<?php echo $i;?>"
              value="<?php echo $row->rec_quantity;?>">
          </td>
          <td><input type="Number" style="width:50px;" name="sendquantity" id="ssendquantity<?php echo $i;?>"></td>
          <td><button type="submit" id="sbranchbutton<?php echo $i;?>" class="btn btn-primary">Send</button>
            <a href="#" id="sentid<?php echo $i;?>" style="height:20px;" class="btn btn-success"><span
                style="font-size:15px;">Sent<span></a>
          </td>

        </tr>
        <!-- <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">
        </script>
        <script src="<?php echo base_url();?>assets/js/jquery-3.4.0.min.js"></script>-->
         <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script> 
        $('#sentid<?php echo $i;?>').hide();
        $("#sbranchbutton<?php echo $i;?>").click(function() {

          var sendquantity = $("#ssendquantity<?php  echo $i;?>").val();
          var recquantity = $("#sbrrec_quantity<?php  echo $i;?>").val();
          var pcode = $("#sbrp_code<?php echo $i;?>").val();
          var senderid = $("#sub_branch").val();
          var idcheck = $("#adminreciver").val();
          var reciever = $("#adminreciver").val();
          if (sendquantity != 0) {
            if (reciever == 1) {
              var reciever = $("#adminreciver").val();
            }
            if (reciever == 2) {
              var reciever = $("#branchreciver").val();
            }
            if (reciever == 3) {
              var reciever = $("#subbranchreciver").val();
            }
            $.post("<?php echo site_url("branchController/subbratransferproduct")?>", {
              sendquantity: sendquantity,
              recquantity: recquantity,
              pcode: pcode,
              senderid: senderid,
              idcheck: idcheck,
              reciever: reciever
            }, function(data) {
              $("#sendproductdetail").html(data);
              $("#sendproductdetail").show();

              $('#sentid<?php echo $i;?>').show();
              $("#sbranchbutton<?php echo $i;?>").hide();

            });
          } else {
            alert('please fill the send Quantity');
            $("#sbranchbutton<?php echo $i;?>").hide();
            $('#sentid<?php echo $i;?>').hide();
          }

        });

        $("#ssendquantity<?php echo $i;?>").keyup(function() {

          var sendquantity = Number($("#ssendquantity<?php  echo $i;?>").val());
          var recquantity = Number($("#sbrrec_quantity<?php  echo $i;?>").val());
          if (sendquantity < recquantity && sendquantity > 0) {
            $("#sbranchbutton<?php echo $i;?>").show();
          } else {
            alert('You Can Not Send less then zero and  More then Stock Product');
            $("#sbranchbutton<?php echo $i;?>").hide();
          }


        })
        </script>
        <?php  $i++;
                endforeach;
                   ?>
      </tbody>

    </table>
  </div>
  <?php //$this->load->view('footerJs/producttransfer');?>
</div>
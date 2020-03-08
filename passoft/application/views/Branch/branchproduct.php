
<div class="page-body">
  <div class="row">
    <input type="hidden" id="adminreciver" value="<?php echo $adminreciver;?>" />
    <input type="hidden" id="branchreciver" value="<?php echo $branchreciver;?>" />

    <input type="hidden" id="subbranchreciver" value="<?php echo $subbranchreciver;?>" />
  <div class="table-responsive">
    <table class="table table-bordered " id="aarju">
      <thead>
        <tr>
          <th>SNO</th>

          <th>Product Name</th>
          <th>Product Code</th>
          <th style="width:8px;">Size</th>
          <th style="width:8px;">Image </th>
          <th style="width:8px;">Quantity</th>
          <th style="width:10px;">Send Quantity</th>
          <th style="width:10px;">Activity</th>

        </tr>
      </thead>
      <tbody>
        <?php  $i=1;
        foreach($brproduct  as $row):
                        $this->db->where('id',$row->p_code);
                        $productstdt=$this->db->get('stock_products');
                        if($productstdt->num_rows()>0)
                        {
                            $productst = $productstdt->row();
                        
                     
        ?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>


          <?php 
                        
                        ?>


          <td><?php echo $productst->name;?>
          </td>
          <td><?php echo $row->p_code?>
            <input type="hidden" name="sbrp_code" id="sbrp_code<?php echo $i;?>" value="<?php echo $row->p_code;?>">
          </td>
           <td style="width:8px;color:black;"><?php echo $productst->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $productst->file1; ?>"
                                                style="height:50px;width:30px;"class="zoom1" > </td>
          <td><?php echo $row->rec_quantity?>
            <input type="hidden" name="sbrrec_quantity" id="sbrrec_quantity<?php echo $i;?>"
              value="<?php echo $row->rec_quantity;?>">
          </td>
          <td style="width:50px;"><input type="Number" style="width:50px;" name="sendquantity" id="ssendquantity<?php echo $i;?>"></td>
          <td  style="width:10px;"><button type="submit" id="sbranchbutton<?php echo $i;?>" class="btn btn-primary">Send</button>
            <a href="#" id="shent<?php echo $i;?>" style="height:20px;" class="btn btn-success"><span
                style="font-size:15px;">Sent</span></a>
          </td>

        </tr>
    
   
      
            <script>
          $("#shent<?php echo $i;?>").hide();
          $("#sbranchbutton<?php echo $i;?>").click(function() {

            var sendquantity = $("#ssendquantity<?php  echo $i;?>").val();
        // alert(sendquantity);
            var recquantity = $("#sbrrec_quantity<?php  echo $i;?>").val();
            var pcode = $("#sbrp_code<?php echo $i;?>").val();
            var senderid = $("#checkid1").val();
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

              $.post("<?php echo site_url("branchController/branchtransferproduct")?>", {
                sendquantity: sendquantity,
                recquantity: recquantity,
                pcode: pcode,
                senderid: senderid,
                idcheck: idcheck,
                reciever: reciever
              }, function(data) {

                $("#sendproductdetail").html(data);
                $("#sendproductdetail").show();
                $("#shent<?php echo $i;?>").show();
                $("#sbranchbutton<?php echo $i;?>").hide();

              });
            } else {
              alert('Please fill the send Quantity');
              $("#sbranchbutton<?php echo $i;?>").hide();
              $("#shent<?php echo $i;?>").hide();
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


        });
        </script>
        <?php  $i++;
                        }
                endforeach;
                   ?>
      </tbody>

    </table>
  </div>
  </div>
  <?php //$this->load->view('footerJs/producttransfer');?>
</div>
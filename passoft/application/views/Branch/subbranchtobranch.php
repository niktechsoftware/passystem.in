<div class="page-body">
  <div class="row">
    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">-->
    <!--</script>-->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <table id="adminproducttt" class="table table-striped table-bordered nowrap">
      <thead>
        <tr>
          <th style="width:8px;">SNO</th>

          <th style="width:20px;">Product Name</th>
          <th>Product Code</th>
             <th style="width:8px;">Size</th>
          <th style="width:8px;">Image </th>
          <th style="width:8px;">Quantity</th>
        </tr>
      </thead>
      <tbody style="margin-top:2px;">
        <?php 
                //   print_r($reciever);
                  
                  
                  $dt=date('Y-m-d');
                  $this->db->where('DATE(date)',$dt); 
                  $this->db->where('branch_id',$reciever);
                  $brwproduct=$this->db->get('branch_wallet')->result(); 
                    $this->db->where('id',$reciever);
                  $branch=$this->db->get('branch')->row();
                    $i=1;foreach ($brwproduct as  $value):
                $this->db->where('id',$value->p_code);
                  $sproduct=$this->db->get('stock_products')->row(); 
                  ?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>
          <td style="width:20px;"><?php echo $sproduct->name;?> </td>
          <td style="width:8px;"><?php echo $value->p_code;?> </td>
           <td style="width:8px;color:black;"><?php echo $sproduct->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $sproduct->file1; ?>"
                                                style="height:50px;width:30px;"class="zoom1" > </td>
          <td><?php echo $value->rec_quantity;?> </td>
        </tr>
        <?php $i++;endforeach;?>
      </tbody>
    </table>
     <a href="<?php echo base_url();?>stockController/generate_invoice/<?php echo $branch->username;?>" class="btn btn-success">Generate Invoice</a>
 
  </div>
</div>
<div class="page-body">
  <div class="row">
    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js"></script>-->
    <table id="adminproducttt" class="table table-striped table-bordered nowrap">
      <thead>
        <tr>
          <th>SNO</th>

          <th>Product Name</th>
          <th>Product Code</th>
           <th style="width:8px;">Size</th>
          <th style="width:8px;">Image</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php   
    
                    $dt=date('Y-m-d');
                     // $this->db->where('hsn',$p_code);
                   $this->db->where('protrans_date',$dt);
     $sproduct=$this->db->get('stock_products')->result(); ?>
        <?php $i=1;foreach($sproduct as $row):?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>


          <td><?php echo $row->name;?>
          </td>
          <td><?php echo $row->hsn;?> </td>
           <td style="width:8px;color:black;"><?php echo $row->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1; ?>"
                                                style="height:50px;width:30px;" class="zoom1"> </td>
          <td><?php echo $row->quantity;?> </td>
        </tr>
        <?php $i++;endforeach;?>
      </tbody>
    </table>
      <a href="<?php echo base_url();?>stockController/generate_invoice/<?php echo "admin";?>" class="btn btn-success">Generate Invoice</a>
  </div>
</div>
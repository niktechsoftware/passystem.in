<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
<script type="text/javascript"
  src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="page-body">
  <div class="row">
    <div class="col-md-12">
      <table id="customer_data" class="table table-bordered table-striped table-responsive">
        <thead>
          <tr>
            <th style="width:8px;">SNO</th>
            <th style="width:15px;">Product Name</th>
            <th style="width:15px;">Product Code</th>
            <th style="width:8px;">Size</th>
            <th style="width:8px;">Image</th>
            <th style="width:8px;">R Qty</th>
            <th style="width:8px;">T Qty</th>
          </tr>
        </thead>
        <tbody style="margin-top:2px;">

          <?php      
                  $dt=date('Y-m-d');
                   $this->db->where('DATE(date)',$dt);
                  $this->db->where('subbranch_id',$recisubbranch);
                  $sproducts=$this->db->get('subbranch_wallet')->result();
                   $i=1;foreach ($sproducts as  $value):
                   $this->db->where('id',$value->p_code);
                   $pronms=$this->db->get('stock_products')->row(); 
                  ?>
          <tr class="text-uppercase">
            <td style="width:8px;color:black;"><?php echo $i;?></td>
            <td style="width:8px;color:black;"><?php echo  $pronms->name;?>
            </td>
            <td style="width:8px;color:black;"><?php echo $value->p_code?> </td>
             <td style="width:8px;color:black;"><?php echo $pronms->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $pronms->file1; ?>"
                                                style="height:50px;width:30px;" class="zoom1"> </td>

            <?php 
          $this->db->where('id',$recisubbranch);
         $sbranch=$this->db->get('sub_branch')->row();
         
        $this->db->where('p_code',$value->p_code);
        $this->db->where('Date(date)',$dt);
        $this->db->where('reciver_usernm',$sbranch->username);
        $this->db->where('sender_usernm',"Admin");
          $this->db->order_by('id','Desc');
         $this->db->limit(1);
         $product_trans=$this->db->get('product_trans_detail');
        if($product_trans->num_rows()>0){
          $product_trans1=$product_trans->row();  ?>
            <td style="width:10px;color:black;"><?php echo $product_trans1->quantity;?></td>
            <td style="width:8px;color:black;"><?php echo $value->rec_quantity?> </td>
          </tr>
          <?php } $i++;endforeach;?>
        </tbody>
      </table>
        <a href="<?php echo base_url();?>stockController/generate_invoice/<?php echo $sbranch->username;?>" class="btn btn-success">Generate Invoice</a>
    </div>
  </div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
  $('#customer_data').DataTable({
    dom: 'lBfrtip',
    buttons: [
      'excel', 'csv', 'pdf', 'copy'
    ],
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ]
  });

});
</script>
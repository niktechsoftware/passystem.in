<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <?php   echo "1";
                          $this->db->where('id',$username);
                          $row1=$this->db->get('customers')->row();
?>
          <center><h5 class="text-bold"><?php echo $row1->name;?> [Demand List]</h5></center>
        </div>
        <div class="panel-body">
             <div class="row">
                        <div class="col-md-12 space20">
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                    Export <i class="fa fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-light pull-right">
                                    <li>
                                        <a href="#" class="export-pdf" data-table="#sample-table-2">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-png" data-table="#sample-table-2">
                                            Save as PNG
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-csv" data-table="#sample-table-2">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#sample-table-2">
                                            Save as TXT
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-xml" data-table="#sample-table-2">
                                            Save as XML
                                        </a>
                                    </li>
                                 <li>
                                        <a href="#" class="export-excel" data-table="#sample-table-2">
                                            Export to Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-doc" data-table="#sample-table-2">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#sample-table-2">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
          <div class="dt-responsive table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered nowrap">
              <thead>
                <tr style="background-color:#1ba593; color:white;">
                  <th>S. No.</th>
                   <th>Company</th>
                  <th>Product  Name</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                   <th>Code</th>
                  <th> Size</th>
                  <th> Image</th>
                   <th> Price</th>

                </tr>
              </thead>
              <tbody>
                <?php 
              
                     $this->db->where("customer_id",$username);
                 $stckdt= $this->db->get("favourite_list");
                 if($stckdt->num_rows()>0){
                    $i=1;
                  foreach($stckdt->result() as $data):
                //echo $data->product_code;
                $this->db->where("subbranch_id",$this->session->userdata("id"));
                   $this->db->where_in("p_code",$data->product_code);
                 $dt= $this->db->get("subbranch_wallet");
                
              
                
                 if($dt->num_rows()>0){
                
                $receive=  $dt->row()->rec_quantity;
                $saleq = $dt->row()->sale_quantity;
             }else{
                 $receive=0;
                 $saleq=0;
             }
                 $total=$receive;
                 
                 if((($receive-$saleq)<2)||($dt->num_rows()>0)){
                 if($dt->num_rows()>0){
                  $val=$dt->row();
                  $this->db->where("id",$val->p_code);
                  $stckdt1= $this->db->get("stock_products");
                 }else{
                    $this->db->where("id",$data->product_code);
                  $stckdt1= $this->db->get("stock_products");
                 }
                  if($stckdt1->num_rows()>0){
                      // print_r( $stckdt1->row());
                    $totalquantity= 0;
                    
                 $totalquantity1= $receive;
             
                    
                    if((($receive-$saleq)<2)){
                        //  print_r($stckdt1->row());
                            $remainingquantity=$totalquantity- $total;
                        $stckdt2=$stckdt1->row();
                        //echo $stckdt2->id
                  ?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                 
                  <td><?php echo $stckdt2->company;?></td>
                  <td><?php echo $stckdt2->name;?></td>
                 <?php  if($stckdt2->sub_category==0) { ?>
                  <td>Not Selected</td>
                  <td>Not Selected</td>
                 <?php       }
                     else{
                      $this->db->where('id', $stckdt2->sub_category);
                      $subcate=$this->db->get('sub_category')->row();
                      $subcate1=$subcate->name;
                      $this->db->where('id',$subcate->cat_id);
                       $cate=$this->db->get('category')->row();
                      if($cate){$cate1=$cate->name;} ?>
                   
                  <td><?php echo $cate1;?></td>
                     <td><?php echo $subcate1;?></td><?php } ?>
 <td><?php echo $stckdt2->hsn;?></td>
                  <td><?php echo $stckdt2->size;?></td>
                
                  <td> <?php  if($stckdt2->file1>0){?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file1; ?>"
                                                style="height:50px;width:100px;"><?php } else{ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"> <?php } ?>
                      </td> 
                      
                      <td>
                          <?php echo $stckdt2->selling_price;?>
                          
                      </td></tr>
                <?php  }} }$i++;
                endforeach;}
                   ?>
              </tbody>
            </table>
          </div>
        </div>
         <center>  <a href="<?php echo base_url();?>shopController/index"  class ="btn btn-info">Done</a></center>
      </div>
    </div>
  </div>
</div>
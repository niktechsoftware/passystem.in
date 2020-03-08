<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
     

      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <center><h2 class="text-bold">Demand List of Shop <?php echo $shopname;?></h2></center>
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
          <div class=" table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered ">
              <thead>
                <tr >
                  <th>S.No.</th>
                  <th>Com. Name</th>
                  <th>P.Name</th>
                  <th>P. Code</th>
                   <th>Volume</th>
                     <th>Price</th>
                  <th>T.Of Pro</th>
                   <th>Image</th>
                  <th>Requirement</th>
                 <?php  if($ub=='b'){?>
                 <th>Shop Details</th>
                 <?php }else{
                     ?>
                      <th>Order Number</th>
              <?php    }?>
                 
                  </tr>
              </thead>
              <tbody>
             
                <?php 
               $pcode=array();
               $requir=array();
               $s=0;
                 $subid =  $shopid;
                 $ordernum=array();
                 if($ub=='a'){
                      $this->db->where_in("sub_branchid",$shopid);
                 }else{
                   if($ub=='b'){
                      $this->db->where_in("sub_branchid",$shopid);
                     
                 }
                     else{
                          $this->db->where("sub_branchid",$shopid);
                     }
                 }
                 $this->db->where("status",0);
                 $osd = $this->db->get("order_serial");
                 if($osd->num_rows()>0){
                  $i=0;  
                  foreach($osd->result() as $ods):
                        $ordernum[$i]=$ods->order_no;
                       $i++; endforeach;
                       
                        $this->db->distinct();
                        $this->db->select('p_code');
                        $this->db->where_in("order_no",$ordernum);
                       $stckdt =  $this->db->get("order_detail");
                       
                 
                
                 
                 if($stckdt->num_rows()>0){
               $j=1;  foreach($stckdt->result() as $data):
                   
                    $this->db->select_sum("quantity");
                 $this->db->where("p_code",$data->p_code);
                 $this->db->where_in("order_no",$ordernum);
                    $totquan =  $this->db->get("order_detail")->row();
                    
                    
                    if($ub=='a'){
                         //$this->db->where_in("subbranch_id",$subid);
                         $this->db->where("id",$data->p_code);
                       $dt=  $this->db->get("stock_products");
                    }
                    else{
                   if($ub=='b'){
                        $this->db->select_sum("rec_quantity");
                       $this->db->select_sum("sale_quantity");
                     
                      $this->db->where_in("subbranch_id",$shopid);
                       $this->db->where("p_code",$data->p_code);
                     $dtsb= $this->db->get("subbranch_wallet"); 
                     if($dtsb->num_rows()>0){
                
                      $receive=  $dtsb->row()->rec_quantity;
                $saleq = $dtsb->row()->sale_quantity;
                
             }else{
                 $receive=0;
                 $saleq=0;
             }
                     $branchqu = $receive-$saleq;
                 
                 if($branchqu < $totquan->quantity){
                     $demandqu = $totquan->quantity-$branchqu;
                     
                      $this->db->where("branch_id",$branchid);
                       $this->db->where("p_code",$data->p_code);
                    
                      $bqw =  $this->db->get("branch_wallet");
                     if($bqw->num_rows()>0){
                
                      $receiveb=  $bqw->row()->rec_quantity;
                $saleqb = $bqw->row()->sale_quantity;
                
                 }else{
                     $receiveb=0;
                     $saleqb=0;
                 }
             if($demandqu > 0){
            // echo $demandqu;
                if(($receiveb-$saleqb) < $demandqu){
                    //echo $saleqb;
                    $demandqu=$demandqu-($receiveb-$saleqb);
                    
                    $pcode[$s] = $data->p_code;
                    $requir[$data->p_code]=$demandqu;
                    $s++;
                 }}}}
                     else{
                         $this->db->where("subbranch_id",$subid);
                          $this->db->where("p_code",$data->p_code);
                 $dt= $this->db->get("subbranch_wallet");
                  if($dt->num_rows()>0){
                 
                      $receive=  $dt->row()->rec_quantity;
                $saleq = $dt->row()->sale_quantity;
                 }
             else{
                 $receive=0;
                 $saleq=0;
             }
             
            
                 if(($receive-$saleq) < $totquan->quantity){
                     $aqu=$receive-$saleq;
                     
                      $pcode[$s] = $data->p_code;
                    $requir[$data->p_code]=$totquan->quantity-($receive-$saleq);
                    $s++;
                     
                 }}} 
                 endforeach; }
                 }
                // print_r($requir);
                 foreach($pcode as $roe):
                
                  $this->db->where("id",$roe);
                  $stckdt1= $this->db->get("stock_products");
                 $stckdt2=$stckdt1->row();
                 
            
                  ?>
                  <tr >
                      
                    <td><?php echo $j;?></td>
                     <td><a href="#"><span ><?php echo $stckdt2->company;?></span></a></td>
                  <td>
                 <?php 
                  echo $stckdt2->name;
                  ?>
                 </td>
                  <td><?php echo $stckdt2->hsn;?></td>
                  <td><?php echo $stckdt2->size;?></td>
                         <td><?php echo $stckdt2->selling_price;?></td>
                   <td><?php echo $stckdt2->p_type;?></td>
                   <td><?php if($stckdt2->file1>0){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file1; ?>"
                                    style="height:50px;width:100px;"><?php } else{ ?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"><?php }?>"
                     </td>
                   
                  <td><a href="#"><span style="color:#01a9ac;font-size:20px;font-weight:1px;"><?php echo $requir[$roe]; ?></span></a>

                  <!-- 
                   <span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span> -->
                   </td>
                 
                 
                  <td>  <?php  if($ub=='b'){
                 
                  $this->db->where("p_code",$roe);
                    $this->db->where_in("order_no",$ordernum);
                    $onrdername  =  $this->db->get("order_detail");
                 
                      
                         $this->db->where_in("order_no",$ordernum);
                          $onrdername  =  $this->db->get("order_serial");
                           foreach($onrdername->result() as $os):
                               $this->db->where("id",$os->sub_branchid);
                             $sbn =   $this->db->get("sub_branch")->row();
                             
                              $this->db->select_sum("quantity");
                 $this->db->where("p_code",$roe);
                 $this->db->where_in("order_no",$ordernum);
                 
                    $totquan =  $this->db->get("order_detail")->row();
                   echo $sbn->bname."<b>[".$sbn->username."] </b><br> ";
                   endforeach;
                   
                  echo "[".$totquan->quantity."]";
                 }else{
                
                    $this->db->where("p_code",$roe);
                    $this->db->where_in("order_no",$ordernum);
                    $onrdername  =  $this->db->get("order_detail");
                   foreach($onrdername->result() as $odname):
                   echo $odname->order_no."<b>[".$odname->quantity."]</b><br> ";
                   endforeach;
                  
                 }?> 
                   </td>
                   </tr>
                    <?php  $j++;  endforeach;   
                   
                   ?>
              </tbody>
              
            </table>
          </div>
        </div>
     
   
      </div>
      
      
      


    </div>
  </div>
</div>
<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
     

      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <center><h2 class="text-bold"><?php echo $branchname;?></h2></center>
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
                <tr  style="background-color:#1ba593; color:white;">
                  <th>S.No.</th>
                   <th>Com. Name</th>
                  <th>P.Name</th>
                  <th>P. Code</th>
                   <th>Volume</th>
                  <th>T.Of Pro</th>
                   <th>Image</th>
                  <th>N.of Subscriber</th>
                  <th>Name of Sub</th>
                 <th>Date Of Demand</th>
                  <th>RQ</th>
                  </tr>
              </thead>
              <tbody>
             
                <?php 
                $discrictd= $branchid;
                $this->db->distinct();
                $this->db->select("id");
                $this->db->where_in("district",$discrictd);
                $getbranch = $this->db->get("sub_branch");
               
                if($getbranch->num_rows()>0){
                $getcode = $getbranch->result();
                $i=1;
               
                foreach($getcode as $row):
                    $datasub[$i] = $row->id;
                    //echo $row->id;
                   $i++; endforeach;
                   
                     $this->db->distinct();
               $this->db->select("product_code");
               $this->db->where_in("sub_branchid",$datasub);
                 $stckdt= $this->db->get("favourite_list");
                 
                 $this->db->where_in("branch_id",$discrictd);
                 $stckdtbr= $this->db->get("branch_wallet")->result();
                
                 
                 $i=1; foreach($stckdt->result() as $data):
             $this->db->where_in("id",$data->product_code);
                 $dt= $this->db->get("stock_products");
                
              
                
                 if($dt->num_rows()>0){
                
                $receive=  $dt->row()->quantity;
                $saleq = 0;
             }else{
                 $receive=0;
                 $saleq=0;
             }
                 $total=6;
                 
                 if((($receive-$saleq)<2)){
                 if($dt->num_rows()>0){
                  $val=$dt->row();
                  $this->db->where("id",$val->id);
                  $stckdt1= $this->db->get("stock_products");
                 }else{
                    $this->db->where("id",$data->product_code);
                  $stckdt1= $this->db->get("stock_products");
                 }
                  if($stckdt1->num_rows()>0){
                      // print_r( $stckdt1->row());
                    $totalquantity= $stckdt1->row()->quantity;
                    
                 $totalquantity1= $totalquantity;
             
                    
                    if(($totalquantity1<=$total)||(($receive-$saleq)<2)){
                        //  print_r($stckdt1->row());
                            $remainingquantity=$totalquantity- $total;
                        $stckdt2=$stckdt1->row();
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                     <td><a href="#"><span ><?php echo $stckdt2->company;?></span></a></td>
                  <td><?php if($totalquantity<=$total){?><span style="color:red;"><?php echo $stckdt2->name;?></span>
                 
                  <?php } else{ echo $stckdt2->name;}?>
                 </td>
                  <td><?php echo $stckdt2->hsn;?></td>
                  <td><?php echo $stckdt2->size;?></td>
                   <td><?php echo $stckdt2->p_type;?></td>
                   <td><?php if($stckdt2->file1>0){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' .$stckdt2->file1; ?>"
                                    style="height:50px;width:100px;"><?php } else{ ?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"><?php } ?>
                     </td>
                     
                  <td> <?php 
                      $this->db->where('product_code',$data->product_code);
                          $row1=$this->db->get('favourite_list');
                       ?>
                      
                      <a href="#"><span style="color:#01a9ac;font-size:20px;font-weight:1px;"><?php echo $row1->num_rows(); ?></span></a>

                 
                 
                   </td>
                   <td style="margin-left:50px;">
                     
                        <?php $j=1; foreach($row1->result() as $cusname): 
                     $this->db->where('id',$cusname->customer_id);
                          $row2=$this->db->get('customers')->row();
                      echo $j."- " .  $row2->name. " [ " . $row2->username . " ]<br> ";?>
                       
                       <?php $j++; endforeach;?>
                  </td>
                   <td><?php echo $cusname->date;?> </td>
                  <td><span style="color:red;font-size:20px;font-weight:1px;"><?php echo  -$row1->num_rows();?></span>
                  </td>
                  
                   </tr>
                    <?php   } } 
                   
                    }
                   
                   $i++; endforeach; } ?>
                
              </tbody>
              
            </table>
          </div>
        </div>
       </div>
      
     
    </div>
  </div>
</div>
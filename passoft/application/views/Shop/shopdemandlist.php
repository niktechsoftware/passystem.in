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
                <tr  style="background-color:#1ba593; color:white;">
                  <th>S.No.</th>
                  <th>Com. Name</th>
                  <th>P.Name</th>
                  <th>P. Code</th>
                   <th>Volume</th>
                     <th>Price</th>
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
                 $subid =  $shopid;
                 
                
               $this->db->distinct();
               $this->db->select("product_code");
             
               $this->db->where("sub_branchid",$subid);
                 $stckdt= $this->db->get("favourite_list");
               
                 
                 
                 $i=1; 
                 if($stckdt->num_rows()>0){
                 foreach($stckdt->result() as $data):
                     $this->db->where("subbranch_id",$subid);
                $this->db->where("p_code",$data->product_code);
                 $dt= $this->db->get("subbranch_wallet");
                
             if($dt->num_rows()>0){
                
                $receive=  $dt->row()->rec_quantity;
                $saleq = $dt->row()->sale_quantity;
             }else{
                 $receive=0;
                 $saleq=0;
             }
                  $rtty =0;
                 $total=$receive;
                 if(($receive-$saleq)<2){
                 if($dt->num_rows()>0){
                  $val=$dt->row();
                  $this->db->where("id",$val->p_code);
                  $stckdt1= $this->db->get("stock_products");
                   $rtty =0;
                 }else{
                    $this->db->where("id",$data->product_code);
                  $stckdt1= $this->db->get("stock_products");
                  $rtty =1;
                 }
                  if($stckdt1->num_rows()>0){
                      // print_r( $stckdt1->row());
                      if( $rtty ==1){
                           $totalquantity= 0;
                      }else{
                           $totalquantity= $stckdt1->row()->quantity;
                      }
                   
                $totalquantity1= $receive;
                if(($totalquantity1<=$total)||(($receive-$saleq)<2)){
                        //  print_r($stckdt1->row());
                            $remainingquantity=$totalquantity- $total;
                        $stckdt2=$stckdt1->row();
                        //echo $stckdt2->name."<br>";
                  ?>
                  <tr >
                      
                    <td><?php echo $i;?></td>
                     <td><a href="#"><span ><?php echo $stckdt2->company;?></span></a></td>
                  <td><?php if($totalquantity<=$total){?><span style="color:red;"><?php echo $stckdt2->name;?></span>
                  <!--<img src="<?php echo base_url();?>assets/images/jar-loading.gif" style="max-height: 40px;">-->
                  <?php } else{ echo $stckdt2->name;}?>
                 </td>
                  <td><?php echo $stckdt2->hsn;?></td>
                  <td><?php echo $stckdt2->size;?></td>
                         <td><?php echo $stckdt2->selling_price;?></td>
                   <td><?php echo $stckdt2->p_type;?></td>
                   <td><?php if($stckdt2->file1>0){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file1; ?>"
                                    style="height:50px;width:100px;"><?php } else{ ?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"><?php }?>"
                     </td>
                     <?php 
                     $this->db->where('sub_branchid',$subid);
                      $this->db->where('product_code',$data->product_code);
                          $row1=$this->db->get('favourite_list');
                       ?>
                  <td><a href="#"><span style="color:#01a9ac;font-size:20px;font-weight:1px;"><?php echo $row1->num_rows(); ?></span></a>

                  <!-- 
                   <span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span> -->
                   </td>
                   <td style="margin-left:50px;">
                       <?php $j=1; foreach($row1->result() as $cusname): ?>
                       
                   <?php     $this->db->where('id',$cusname->customer_id);
                          $row2=$this->db->get('customers')->row();
                       ?>
                       
                      <?php echo $j."- " .  $row2->name. " [ " . $row2->username . " ]<br> ";?>
                       
                       <?php $j++; endforeach;?>
                  </td>
                   <td>
                  <?php   $this->db->where('sub_branchid',$subid);
                    $this->db->where("product_code",$data->product_code);
                   $tho = $this->db->get("favourite_list")->row();
                   
                   
                   echo $tho->date;?> </td>
                  <td><span style="color:red;font-size:20px;font-weight:1px;"><?php echo  -$row1->num_rows();?></span>
                  </td>
                  
                   </tr>
                    <?php  $i++; }  }  ?>
                   
                   <?php  }
                   
                    endforeach; }else{
                       echo "NO Data found";
                   }?>
                
              </tbody>
              
            </table>
          </div>
        </div>
         <center>  <a href="<?php echo base_url();?>shopController/index"  class ="btn btn-info">Done</a></center>
   
      </div>
      
      
       <div class="panel panel-white">
        <div class="panel-heading panel-redr">
        <center>  <h5 class="text-bold">Other Demand List</h5></center>
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
                                        <a href="#" class="export-pdf" data-table="#sbdemlist2">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-png" data-table="#sbdemlist2">
                                            Save as PNG
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-csv" data-table="#sbdemlist2">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#sbdemlist2">
                                            Save as TXT
                                        </a>
                                    </li>
                                  
                                    <li>
                                        <a href="#" class="export-excel" data-table="#sbdemlist2">
                                            Export to Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-doc" data-table="#sbdemlist2">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#sbdemlist2">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
          <div class="dt-responsive table-responsive">
            <table id="sbdemlist2"  class="table table-striped table-bordered nowrap">
              <thead>
                <tr style="background-color:#1ba593; color:white;">
                  <th>S.No.</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Product  Name</th>
                  <th>Company Name</th>
                  <th>Price</th>
                   <th>Size</th>
                  <th> Image</th>
                  <th>Date of Demand</th>
                  <!-- <th> Password</th> -->

                </tr>
              </thead>
              <tbody>
                <?php 
                   $this->db->where("sub_branchid",$subid);
                 $dt= $this->db->get("demand_list")->result();
                
                    $i=1;
                  foreach($dt as $row):?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php 
                       $this->db->where('id',$row->customer_id);
                          $row1=$this->db->get('customers')->row();
                   ?>
                  <td><a href="<?php echo base_url();?>shopController/showsbfavlist/<?php echo $row1->username;?>"><span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span></a></td>
                  <td><?php echo $row1->mobile;?></td>
                  <td><?php echo $row->product_name;?></td>
                  <td><?php echo $row->company_name;?></td>
                  
                    <td><?php echo $row->price;?></td>
                      <td><?php echo $row->size;?></td>
                        <td><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file_1; ?>"
                                    style="height:50px;width:100px;"></td>
                        
                        
                 
                  <td><?php echo $row->date;?></td>
                  <!-- <td><?php echo $row->password?></td> -->
                </tr>
                <?php  $i++;
                endforeach;
                   ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
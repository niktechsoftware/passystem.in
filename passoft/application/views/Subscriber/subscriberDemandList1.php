
       	<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
								
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
        <table id="sample-table-2" class="table table-bordered nowrap">
             <thead>
                <tr  style="background-color:#1ba593; color:white;">
                       <?php 
               if($this->session->userdata('login_type')==1)
               { ?>
                  <th >S.N</th>
                  <th >Name of Sub</th>
                  <th>Company</th>
                  <th> Name</th>
                  <th > Code</th>
                  <th>Type</th>
                  <th >Volume</th>
                  <th >Req</th>
                  <th >No.Sub</th>
                  <th >Image</th>
                     <?php } 
               if($this->session->userdata('login_type')==2)
               { ?>
                <th>S.N</th>
                <th>Company</th>
                <th>Name</th>
                <th>Code</th>
                <th>Type</th>
                <th>Volume</th>
                <th>Image</th>
                 <th>N.of Subscriber</th>
                  <th>Name of Sub</th>
                 <th>Date Of Demand</th>
                  <th>RQ</th>
               <?php } ?>
              </thead>
              <tbody>
             
               <?php 
               if($this->session->userdata('login_type')==1)
               {
                     $stckdt= $this->db->get("stock_products");
                     if($stckdt->num_rows()>0){
                     $i=1;
                     foreach($stckdt->result() as $data):
                        //  print_r($data);
                         
                     $this->db->distinct();
                     $this->db->select("product_code");
                     $this->db->where("product_code",$data->id);
                     $dt= $this->db->get("favourite_list");
                     $total1=$dt->num_rows();
                     $total=$total1+6;
                     
                     if($dt->num_rows()>0){
                      $val=$dt->row();
                          
                      $this->db->where("id",$val->product_code);
                      $stckdt1= $this->db->get("stock_products");
                     
                      if($stckdt1->num_rows()>0){
                        $totalquantity= $stckdt1->row()->quantity;
                        
                     
                            
                        if($totalquantity<=$total){
                                $remainingquantity=$totalquantity- $total;
                            $stckdt2=$stckdt1->row();
                  ?>
                  <tr class="text-uppercase text-center">
                    <td ><?php echo $i;?></td>
                    <td >
                       <?php $j=1; foreach($dt->result() as $cusname): 
                           $this->db->where('id',$cusname->customer_id);
                           $this->db->where('sub_branchid',$view);
                          $row2=$this->db->get('customers');
                          if($row2->num_rows()>0)
                          {
                               echo $j."- " .  $row2->row()->name. " [ " . $row2->row()->username . " ]<br> ";
                          }
                          else
                          {
                              echo "N/A";
                          }
                      
                       $j++; endforeach;
                       ?>
                  </td>
                     <td >
                         <a href="<?php echo base_url();?>subscriberController/nameofperson/<?php echo $val->product_code;?>">
                             <span style="color:#01a9ac;"><?php echo $stckdt2->company;?></span></a>
                    </td>
                  <td ><?php if($totalquantity<=$total){?>
                    <span style="color:red;">
                        <?php echo $stckdt2->name;?>
                    </span>
                 
                  <?php } else{
                  echo $stckdt2->name;
                  }?>
                 </td>
                  <td ><?php echo $stckdt2->hsn;?></td>
                   <td ><?php echo $stckdt2->p_type;?></td>
                    <td ><?php echo $stckdt2->size;?></td>
                     <td >
                         <span style="color:red;font-size:20px;font-weight:1px;"><?php echo $remainingquantity;?></span>
                  </td>
                   
                  <td >
                      <a href="<?php echo base_url();?>customer/nameofperson/<?php echo $val->product_code;?>"><span style="color:#01a9ac;">
                          <?php echo $total1; ?>
                          </span></a>
                   </td>
                   <td ><?php if($stckdt2->file1>0){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file1; ?>"
                                    style="height:50px;width:100px;"><?php } else{ ?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"><?php }?></td>
                    <?php  $i++; } }; ?>
                    </tr>
                   <?php  }  endforeach; }
                   } 
               elseif($this->session->userdata('login_type')==2)
               {
                // echo $view;
                 $this->db->distinct();
                  $this->db->select("product_code");
                $this->db->where("sub_branchid",$view);
                 $stckdt= $this->db->get("favourite_list");
              
                 $i=1; foreach($stckdt->result() as $data):
             
             $this->db->where("subbranch_id",$view);
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
                 
                  if((($receive-$saleq)<2)){
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
                    $totalquantity= $stckdt1->row()->quantity;
                    
                 $totalquantity1= $receive;
             
                    
                    if(($totalquantity1<=$total)||(($receive-$saleq)<2)){
                        //  print_r($stckdt1->row());
                            $remainingquantity=$totalquantity- $total;
                        $stckdt2=$stckdt1->row();
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
                   <td><?php echo $stckdt2->p_type;?></td>
                   <td><?php if($stckdt2->file1>0){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file1; ?>"
                                    style="height:50px;width:100px;"><?php } else{ ?> <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stckdt2->file2; ?>"
                                                style="height:50px;width:100px;"><?php }?>"
                     </td>
                  <td>
                      <?php $this->db->where("sub_branchid",$view);
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
                   <td><?php echo $row1->row()->date;?> </td>
                  <td><span style="color:red;font-size:20px;font-weight:1px;"><?php echo $row1->num_rows(); ?></span>
                  </td>
                  
                   </tr>
                    <?php   } } $i++; ?>
                   
                   <?php  }
                   
                    endforeach; 
              
                } ?>
              </tbody>
            </table>
       
           <!-- <?php// $this->load->view("footerJs/daybookJs"); ?> -->
           <script src="<?php echo base_url(); ?>assets/js/table-export.js"></script>
           <script>
           	TableExport.init();
           </script>
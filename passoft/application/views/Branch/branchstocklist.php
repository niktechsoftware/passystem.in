<div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red">
                                         <center>  <h5  class="panel-title text-bold">Branch Product Stock List</h5></center>
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
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                    
                   <div class="table-responsive">
                  <table id="sample-table-2"  class="table table-bordered" >
                <thead>
                  <tr style="background-color:#1ba593;color:white;">
                    <th style="width:8px;">SNO</th>
                   
                    <th style="width:8px;">Br.U.N</th>
                   
                    <th style="width:8px;">SubCategory</th>
                    <th style="width:8px;">Prod</th>
                    <th style="width:8px;">P. Code</th>
                    <th style="width:8px;">Company</th>
                    <th style="width:8px;">Type</th>
                    <th style="width:8px;">Qty</th>
                    <th style="width:8px;">Price</th>
                    <th style="width:8px;">Image 1</th>
                    <th style="width:8px;">Image 2</th>
                    <th style="width:8px;">Offer Image</th>
                        <th style="width:8px;">Trans. Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($this->session->userdata("login_type")==1){
                 $dt= $this->db->get("branch_wallet");
                  }
                  else
                  {
                      $id= $this->session->userdata('id');
                      $this->db->where('branch_id',$id);
                      $dt= $this->db->get("branch_wallet");
                  }
                if($dt->num_rows()>0){
                  ?>
                  <?php  $i=1;
                  foreach($dt->result() as $row):
                  ?>
                 
                    <?php $this->db->where('id',$row->p_code);
                          $row2=$this->db->get('stock_products'); 
                         if($row2->num_rows()>0){
                            $row1= $row2->row();
                         $this->db->where('id',$row2->row()->sub_category);
                          $subcate=$this->db->get('sub_category')->row();
                        //   if($subcate2->num_rows()>0){
                        //       $subcate= $subcate2->row();
                           if($subcate){
                           $subcate1=$subcate->name;
                          $this->db->where('id',$subcate->cat_id);
                           $cate=$this->db->get('category')->row();
                           if($cate){ $cate1=$cate->name; }
                           if($this->session->userdata("login_type")== 1){
                           $this->db->where('id',$row->branch_id);
                           $branchname=$this->db->get('branch'); 
                           }
                         else{
                               $this->db->where('id',$this->session->userdata('id'));
                               $branchname= $this->db->get('branch');
                           } }
                      if($branchname->num_rows()>0){?> 
                       <tr class="text-uppercase">
                    <td ><?php echo $i;?></td>
                   
                    <td style="width:8px;"><?php echo $branchname->row()->username;?></td>
                    <?php } else { ?>
                         <td style="width:8px;"><?php echo "N/A";?></td>
                         <td style="width:8px;"><?php echo "N/A";?></td>
                   <?php  } ?>
                  
                    <td style="width:8px;"><?php echo  $subcate1 ;?></td>
                      <td style="width:8px;"><?php echo $row1->name;?></td>
                        <td style="width:8px;"><?php echo $row1->hsn;?></td>
                      <td style="width:8px;"><?php echo $row1->company;?></td>
                      <td style="width:8px;"><?php echo $row1->p_type;?></td>
                      <td style="width:8px;"><?php echo $row->rec_quantity-$row->sale_quantity;?></td>
                      <td style="width:8px;"><?php echo $row1->selling_price;?></td>
                      <td style="width:8px;"><?php if($row1->file1){?><img class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>" style="height:30px;width:50px;"> <?php } else { ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>"  style="height:30px;width:50px;"><?php }?></td>
                      <td style="width:8px;"><?php if($row1->file2){?><img class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>" style="height:30px;width:50px;"> <?php } else { ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>"  style="height:30px;width:50px;"><?php }?></td>
                      <td style="width:8px;"><?php if($row1->file3){?><img class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>" style="height:30px;width:50px;"> <?php } else { echo "No Image ";}?></td>
                    <td style="width:8px;"><?php echo $row->date;?></td>
            
              </tr>
                        <?php }
                        // }
                         $i++;
                endforeach;
             } ?>
                </tbody>

              </table>
              
                    </div>
                </div>
            </div>
            <!-- end: EXPORT DATA TABLE PANEL -->
        </div>
    </div>
    <!-- end: PAGE CONTENT-->
</div>

          
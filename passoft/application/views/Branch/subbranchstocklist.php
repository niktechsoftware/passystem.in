<div class="page-body">
  
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Active Branch List</span></h4>
					<div class="panel-tools">
						<div class="dropdown">
							<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
								<i class="fa fa-cog"></i>
							</a>
							<ul class="dropdown-menu dropdown-light pull-right" role="menu">
								<li>
									<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
								</li>
								<li>
									<a class="panel-refresh" href="#">
										<i class="fa fa-refresh"></i> <span>Refresh</span>
									</a>
								</li>
								<li>
									<a class="panel-config" href="#panel-config" data-toggle="modal">
										<i class="fa fa-wrench"></i> <span>Configurations</span>
									</a>
								</li>
								<li>
									<a class="panel-expand" href="#">
										<i class="fa fa-expand"></i> <span>Fullscreen</span>
									</a>
								</li>
							</ul>
						</div>
						<a class="btn btn-xs btn-link panel-close" href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="panel-body">
				    			<div class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
<h4 class="media-heading text-center">Welcome to Registered Active List </h4>
<p>Now you can Inactive a Branch By clicking given inactive Button in consern row.<br>
</p> </div>
				    
						<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
							
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>-->
									<!--	<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
									<!--		Save as PDF-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#sample-table-2">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-csv" data-table="#sample-table-2" >-->
									<!--		Save as CSV-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as TXT-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as SQL-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as JSON-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Export to Word-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							
							</div>
						</div>
					</div>
  
  

    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">-->
    <!--</script>-->
     <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <table id="sample-table-2" class="table table-striped table-bordered nowrap">
      <thead>
        <tr style="background-color:#1ba593; color:white;">
          <th>SNO</th>
            <th>S.B.N</th>
            <th>S.B.U.N</th>
        
            <th>Category</th>
            <th>SubCategory</th>
              <th>Company</th>
            <th>Prod</th>
            <th>Size</th>
            
            <th>Type</th>
            <th>Qty</th>
            <th>Price</th>
            <th>P. Code</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Offer Image</th>
            <th>Tranf. Date</th>
        </tr>
      </thead>
      <tbody style="margin-top:2px;">
         <?php
                 $i=1; $dt= $this->db->get("subbranch_wallet");
                 if($dt->num_rows()>0){
                  ?>
                  <?php 
                  foreach($dt->result() as $row) { 
                      $this->db->where('id',$row->p_code);
                          $row11=$this->db->get('stock_products'); 
                           if($row11->num_rows()>0)
                           {
                               $row1= $row11->row();
                               $this->db->where('id',$row1->sub_category);
                               $subcate=$this->db->get('sub_category');
                               if($subcate->num_rows()>0)
                               {
                                   $subcate1=$subcate->row()->name;
                                   $this->db->where('id',$subcate->row()->cat_id);
                                   $cate=$this->db->get('category');
                                   if($cate->num_rows()>0)
                                   {
                                       $cate1=$cate->row()->name;
                                       
                                   } 
                                   
                                }
                                if($this->session->userdata("login_type")== 1)
                                {
                                   $this->db->where('id',$row->subbranch_id);
                                   $sbranchname1=$this->db->get('sub_branch');
                                    
                                }
                                else
                                {
                                    $this->db->where('district',$this->session->userdata('id'));
                                    $this->db->where('id',$row->subbranch_id);
                                    $sbranchname1=$this->db->get('sub_branch');
                                }
                                if($sbranchname1->num_rows()>0)
                                {
                                    $sbranchname=$sbranchname1->row();
                                   ?>
                                  <tr>
                                  <td><?php echo $i;?></td>
                                  <td style="overflow:hidden; width:50px;"><?php echo  $sbranchname->bname;?></td>
                                  <td><?php echo  $sbranchname->username;?></td>
                                 
                                  <td><?php echo $cate1 ;?></td>
                                  <td><?php echo  $subcate1 ;?></td>
                                   <td><?php echo $row1->company;?></td>
                                  <td><?php echo $row1->name;?></td>
                                  <td><?php echo $row1->size;?></td>
                                  <td><?php echo $row1->p_type;?></td>
                                  <td><?php echo $row->rec_quantity;?></td>
                                  <td><?php echo $row1->selling_price;?></td>
                                  <td><?php echo $row1->hsn;?></td>
                                  <td><?php if($row1->file1){ ?><img class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>" style="height:30px;width:50px;"> <?php } else { ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file2; ?>" style="height:30px;width:50px;"><?php } ?></td>
                                  <td><?php if($row1->file2){ ?><img class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file2; ?>" style="height:30px;width:50px;"> <?php } else { ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file1; ?>" style="height:30px;width:50px;"><?php } ?></td>
                                  <td><?php if($row1->file3){ ?><img  class="zoom1" src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row1->file3; ?>"style="height:30px;width:50px;"> <?php } else { echo "No Image "; } ?></td>
                                  <td><?php echo $row->date;?></td>
                              <?php $i++; }
                              } ?>
                              </tr>
                              <?php  
                              } 
                             }  ?>
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
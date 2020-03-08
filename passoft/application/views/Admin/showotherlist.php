
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
        <center>  <h5 style="font-size:30px;" class="text-bold">Other Demand List</h5></center>
        </div>
        <div class="panel-body">
            <div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>-->
										<a href="#" class="export-pdf" data-table="#subscriberList" >
											Save as PDF
										</a>
									</li>
									<li>
										<a href="#" class="export-png" data-table="#subscriberList">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#subscriberList" >
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#subscriberList" >
											Save as TXT
										</a>
									</li>
									<li>
										<a href="#" class="export-xml" data-table="#subscriberList" >
											Save as XML
										</a>
									</li>
									<li>
										<a href="#" class="export-sql" data-table="#subscriberList" >
										Save as SQL
										</a>
									
									
										<a href="#" class="export-json" data-table="#subscriberList" >
											Save as JSON
										</a>
									<li>
										<a href="#" class="export-excel" data-table="#subscriberList" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#subscriberList" >
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#subscriberList">
											Export to PowerPoint
										</a>
									</li>
								
							</div>
						</div>
					</div>
          <div class=" table-responsive">
            <table id="subscriberList"  class="table  table-bordered nowrap">
              <thead>
                <tr>
                  <th>SNo.</th>
                  <th>Customer</th>
                  <th>Mobile</th>
                  <th>Product</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th>Volume </th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php    
                $uri= $this->uri->segment(3);
                 if($uri==3){
                       $dt=date('Y-m-d');
                       $this->db->where('Date(date)',$dt);
                 $dt= $this->db->get("demand_list")->result();
                
                    $i=1;
                  foreach($dt as $row):?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php 
                  $this->db->where('id',$row->customer_id);
                          $row1=$this->db->get('customers')->row();
                   ?>
                  <td><a href="<?php echo base_url();?>subscriberController/showfavlist/<?php echo $row->customer_id;?>"><span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span></a></td>
                  <td><?php echo $row1->mobile;?></td>
                  <td><?php echo $row->product_name;?></td>
                  <td><?php echo $row->company_name;?></td>
                  <td><?php echo $row->typeof_product;?></td>
                  <td><?php echo $row->size;?></td>
                  <td><?php echo $row->date;?></td>
                </tr>
                <?php  $i++;
                endforeach; } else{
                  
                            $dt=date('Y-m-d');
                      // $this->db->where('Date(date)',$dt);
                 $dt= $this->db->get("demand_list")->result();
                
                    $i=1;
                  foreach($dt as $row):?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php 
                  $this->db->where('id',$row->customer_id);
                          $row1=$this->db->get('customers')->row();
                   ?>
                  <td><a href="<?php echo base_url();?>subscriberController/showfavlist/<?php echo $row->customer_id;?>"><span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span></a></td>
                  <td><?php echo $row1->mobile;?></td>
                  <td><?php echo $row->product_name;?></td>
                  <td><?php echo $row->company_name;?></td>
                  <td><?php echo $row->typeof_product;?></td>
                  <td><?php echo $row->size;?></td>
                  <td><?php echo $row->date;?></td>
                </tr>
                <?php  $i++;
                endforeach;
                   }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>








    </div>
  </div>
</div>
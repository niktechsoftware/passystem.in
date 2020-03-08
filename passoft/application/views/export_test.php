
          <div class="panel-body">
               <div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
							
								<ul class="dropdown-menu dropdown-light pull-right">
								
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="">
											Export to Excel
										</a>
									</li>
									
								</ul>
							
							</div>
						</div>
					</div>
          <div class="table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered ">
              <thead>
                <tr  style="background-color:#1ba593; color:white;">
                  <th >S.N</th>
                   <th>p_code</th>
                   <th>subcriber_id</th>
                   <th>sub branch</th>
                   <th>date</th>
              </thead>
              <tbody>
             
               <?php
              
                  
                     $stckdt= $this->db->get("favourite_list");
                 if($stckdt->num_rows()>0){
                 $i=1;
                 foreach($stckdt->result() as $data){ ?>
                 <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $data->product_code;?></td>
                     <td><?php echo $data->customer_id;?></td>
                     <td><?php echo $data->sub_branchid?></td>
                     <td><?php echo $data->date;?></td>
                 </tr>
                <?php $i++;    }
                 }
                  ?>
              </tbody>
             
            </table>
          </div>
        </div>
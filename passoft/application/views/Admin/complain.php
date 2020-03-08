
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <?php if($this->uri->segment(3)==0)
		    { ?>
		        <div style="background-color:green; font-color:white;">Solution Submit Successfully.</div>
		   <?php }?>
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Complain List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Complain View  List </h4>
<p>Now you can see all Complian Details in the concern row.<br>
</p> </div>
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
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
										 <th>S.No.</th>
								                  <th>Complainer Name</th>
								                  <th>Complain Id</th>
								                  <th>Mobile No.</th>
								                  <th>Message</th>
								                  <!--<th>Address</th>-->
								                  <th>Subscriber ID</th>
								                  <th>Created Date</th>
								                  <th>Activity</th>
									</tr>
								</thead>
								<tbody>
								<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
								<?php
                    $i=1;
                    if($activeList->num_rows()>0)
                    {
                  foreach($activeList->result() as $row):
                  $this->db->where('username',$row->sub_ID);
                  $datat = $this->db->get('customers');
                  if($datat->num_rows()>0)
                  {
                      $data = $datat->row(); 
                  }
                  else
                  {
                      $this->db->where('username',$row->sub_ID);
                      $datat = $this->db->get('employee');
                      if($datat->num_rows()>0)
                      {
                          $data = $datat->row(); 
                      }
                      else
                      {
                       echo "N/A";   
                      }  
                  }
                  ?>
                <tr class="text-uppercase text-center">
                  <td><?php echo $i;?></td>
                  <td><?php echo $data->name;?>
                  <!-- <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid<?php echo $i;?>"/>
                  <input type="hidden" name="table" value = "branch" id="tablename<?php echo $i;?>"/>
                   <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus<?php echo $i;?>"/> -->
                  </td>
                  <td><?php echo $row->complain_id;?></td>
                  <td><?php echo $data->mobile;?></td>
                  <td><?php echo $row->message;?></td>
                  <!--<td><?php //echo $data->address;?></td>-->
                  <td><?php echo $row->sub_ID;?></td>
                  <td><?php echo $row->created_date;?></td>
                  <td><a href="<?php echo base_url();?>index.php/adminController/viewSolution/<?php echo $row->id;?>"><button class="btn btn-primary" name="solution" >Solution</button></a>
                  </td>
				  <script>
				  	$("#changeStatus<?php echo $i;?>").click(function(){
					var rowid= $("#rowid<?php echo $i;?>").val();
					var tablename = $("#tablename<?php echo $i;?>").val();
					var currentstatus = $("#currentstatus<?php echo $i;?>").val();
						$.post("<?php echo site_url("allFormController/changeStatus") ?>",{rowid : rowid,tablename : tablename, currentstatus : currentstatus}, function(data){
						$("#changeStatus<?php echo $i;?>").html(data);
					});
				});
				  </script>
                  
                </tr>
                <?php  $i++;
                endforeach;}?>
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
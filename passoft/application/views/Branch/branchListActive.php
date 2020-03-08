
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
<p>Now you can Inactive a Branch By clicking given Active Button in consern row.<br>
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
								                  <th>Owner Name</th>
								                  <th>Branch Name</th>
								                  <th>Mobile Name</th>
								                  <th>Aadhaar Number</th>
								                  <th>District</th>
								                  <th>Username</th>
								                  <th>Active</th>
								                  <th>Activity</th>
									</tr>
								</thead>
								<tbody>
								<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
								<?php 
								
                
                    $i=1;
                    if($activeList->num_rows()>0)
                    {
                  foreach($activeList->result() as $row):?>
                <tr class="text-uppercase text-center">
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->name;?>
                  <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid<?php echo $i;?>"/>
                  <input type="hidden" name="table" value = "branch" id="tablename<?php echo $i;?>"/>
                   <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus<?php echo $i;?>"/>
                  </td>
                  <td><?php echo $row->b_name;?></td>
                  <td><?php echo $row->mobile;?></td>
                  <td><?php echo $row->aadhar;?></td>
                  <td><?php echo $row->district;?></td>
                  <td><?php echo $row->username;?></td>
                  <td><button id="changeStatus<?php echo $i;?>" class ="btn btn-warning"><?php if($row->status==1){echo "Active";}else{echo "Inactive";}?></button></td>
                  <td><a href="<?php echo base_url();?>index.php/branchController/branchfull_profile/<?php echo $row->id;?>"><i class="btn btn-success">Profile</i></a>
                  <a href="<?php echo base_url();?>index.php/branchController/delete_branch/<?php echo $row->id;?>"><i class="btn btn-danger">Delete</i></a>
                  
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
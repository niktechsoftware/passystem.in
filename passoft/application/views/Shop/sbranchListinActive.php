
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Inactive Shop List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Registered Inactive Shop List </h4>
<p>Now you can Active a Shop By clicking given Inactive Button in concern row.<br>
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
  
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
										 <th>S.No.</th>
								                  <th>Owner Name</th>
								                  <th>Branch Name</th>
								                  <th>Mobile Name</th>
								                  <!--<th>Aadhar Number</th>-->
								                  <th>District</th>
												<th>Sub Branch</th>
								                  <th>Username</th>
								                 <th>Status</th>
								                  <th>Profile</th>
								                  <th>Action</th>
									</tr>
								</thead>
								<tbody>
								<!--<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>-->
								<?php 
								
                
                    $i=1;
                    if($activeList->num_rows()>0)
                    {
                  foreach($activeList->result() as $row):?>
                <tr class="text-uppercase text-center">
                  <td><?php echo $i;?></td>
                     <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid<?php echo $i;?>"/>
                  <input type="hidden" name="table" value = "sub_branch" id="tablename<?php echo $i;?>"/>
                   <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus<?php echo $i;?>"/>
                  
                  <td><?php echo $row->ownername;?></td>
                  <td><?php echo $row->bname;?></td>
                  <td><?php echo $row->mob_no;?></td>
                  <!--<td><?php //echo $row->adhar_no;?></td>-->
                  <td><?php  $row->district;
                  
									$this->db->where('id',$row->district);
									$view1=$this->db->get('branch');
									if($view1->num_rows()>0){
									echo $view1->row()->b_name;}else { echo "N/A";}?></td>
									<td><?php echo $row->bname;?></td>
                  <td><?php echo $row->username;?></td>
                <td><button id="changeStatus<?php echo $i;?>" class ="btn btn-warning"><?php if($row->status==1){echo "Active";}else{echo "Inactive";}?></button></td>
                  <td><a href="<?php echo base_url();?>index.php/shopController/sbranchfull_profile/<?php echo $row->id;?>">
									<i class="fa fa-user" style="font-size:28px; color:green;"></i></a>
                  <!-- <a href="<?php echo base_url();?>index.php/shopController/delete_branch/<?php echo $row->username;?>"><i class="btn btn-danger">Delete</i></a> -->
                  
                  </td>
                   <td><input type="button" value="Delete" id="dlts<?php echo $i;?>" class="btn btn-danger"></td>
                  <script>
                  	$("#dlts<?php echo $i;?>").click(function(){
                  	    var rowid= $("#rowid<?php echo $i;?>").val();
                  	    	alert(rowid);
                  	    $.post("<?php echo site_url();?>shopController/dlete_shop",{rowid : rowid}, function(data){
						alert(data);
						window.location.reload();
                  	    });
                  	});
                
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
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
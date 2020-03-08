
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			    

<?php if($Warning=$this->session->flashdata("Warning")){
	echo "<div class='alert alert-danger'>".$Warning."</div>";
}?>
				<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Lock Management Panel</span></h4>
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
				    			    <button data-dismiss="alert" class="close">Ã—</button>
<h4 class="media-heading text-center">
</p> </div>
				   	<?php if($this->session->userdata('login_type') <5){?> 
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
					<?php if($uriv!=0 && $uriv!="success"){
					$this->db->where("id",$uriv);
				$fetlock=	$this->db->get("lock_master")->row();
					?>
					<form action="<?php echo base_url();?>index.php/shopController/updateLock"
											method="post">
					<div class="row">
		                <div class="col-md-12">
					                <div class="col-md-3 ">
					                    <div class="form-group">
											<label class="control-label col-md-6">
												Enter Lock Number
											
											</label>
											<div class="col-sm-6 form-group">
											    <input type="hidden" name="lockid" value = "<?php echo $fetlock->id;?>" >
											<input type ="text" class="form-control" name ="lock_no" value = "<?php echo $fetlock->lock_no;?>" required="required" />
											</div>
											</div>
										</div>	
											<div class="col-md-3">
                                        <div class="form-group">
											<label class="control-label col-md-5">
											Enter Password
												
												
											
											</label>
												<div class="col-sm-7 form-group">
											<input type ="text" class="form-control" name ="Password" value ="<?php echo $fetlock->password;?>" required="required" />
												</div>
											</div>
										</div>
											<div class="col-md-3">
                                                  <div class="form-group">
											            <label class="control-label col-md-5">
												
										Select Status
												
												
											
											</label>
												<div class="col-sm-7 form-group">
											<select name="lstatus" id="status" class="form-control" required="required">
													<option value="">-Select status-</option>
												
													<option value="1" <?php if($fetlock->status==1){echo 'selected="selected"';}?>>Free</option>
													<option value="0" <?php if($fetlock->status==0){echo 'selected="selected"';}?>>Busy</option>
												
											
												</select>
												</div>
											</div>
										</div>
											<div class="col-md-3">
											    <label>&nbsp;
	                                                    </label>
													<button type="submit" name ="submitb" class ="btn btn-success" >Submit</button>
											</div>
					</div>
					</div>
					</form>
					<?php }else{?>
						<form action="<?php echo base_url();?>index.php/shopController/insertLock"
											method="post">
					<div class="row">
		                <div class="col-md-12">
					                <div class="col-md-3 ">
					                    <div class="form-group">
											<label class="control-label col-md-5">
												Enter Lock Number
											
											</label>
											<div class="col-sm-7 form-group">
											<input type ="text" class="form-control" name ="lock_no" required="required" />
											</div>
											</div>
										</div>	
											<div class="col-md-3">
                                        <div class="form-group">
											<label class="control-label col-md-5">
											Enter Password
											</label>
												<div class="col-sm-7 form-group">
											<input type ="text" class="form-control" name ="Password" required="required" />
												</div>
											</div>
										</div>
											<div class="col-md-3">
                                                  <div class="form-group">
											            <label class="control-label col-md-5">
										Select Status
											</label>
												<div class="col-sm-7 form-group">
											<select name="lstatus" id="status" class="form-control" required="required">
													<option value="">-Select status-</option>
												
													<option value="1">Free</option>
													<option value="0">Busy</option>
												
											
												</select>
												</div>
											</div>
										</div>
											<div class="col-md-3">
											    <label>&nbsp;
	                                                    </label>
													<button type="submit" name ="submitb" class ="btn btn-success" >Submit</button>
											</div>
					</div>
					</div>
					</form>
					<?php }?>
					<br>
						<br>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
										<th>SNo.</th>
										<th>Lock Number</th>
										<th>Password</th>
										<th>Status</th>
										<th>Edit</th>
										<th>Delete</th>
								    
									</tr>
								</thead>
								<tbody>
									<?php
                                          $request=  $this->db->get("lock_master");
									$sno = 1; foreach ($request->result() as $row): 
									?>
									<tr>
										<td><?php echo $sno; ?></td>
										<td><?php echo $row->lock_no; ?></td>
										<td><?php echo $row->password; ?></td>
										<td><?php echo $row->status; ?></td>
									
									
										<td><a href ="<?php echo base_url();?>index.php/shopController/lockManage/<?php echo $row->id;?>" class ="btn btn-danger" class ="btn btn-warning">Edit</a></td>
										
										<td><a href ="<?php echo base_url();?>index.php/shopController/delLock/<?php echo $row->id;?>" class ="btn btn-danger">Delete</a></td>
									
									</tr>
									<?php $sno++; endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
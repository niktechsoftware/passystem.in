
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Active Subscriber List</span></h4>
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
                                    <h4 class="media-heading text-center">Welcome to Registered Subscriber Active List </h4>
                                <p>Now you can Inactive a Subscriber By clicking given Active Button in concern row.<br>
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
									<th>#</th>
				                    <th>Subscriber Name</th>
				                    <th>Father Name</th>
				                    <th>Address</th>
				                    <th>Email</th>
				                    <th>Username</th>
				                    <th> Status</th>
				                    <!--<th> Temp/Per Active</th>-->
				                	 <th>full Profile</th>
									</tr>
								</thead>
								<tbody>
								<?php 
                    $i=1;
                    if($activeList->num_rows()>0)
                    {
                  foreach($activeList->result() as $row):?>
                <tr class="text-uppercase text-center">
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->name;?>
                  <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid"/>
                  <input type="hidden" name="table" value = "customers" id="tablename"/>
                   <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus"/>
                  </td>
                  <td><?php echo $row->father_name;?></td>
                  <td><?php echo $row->address;?></td>
                  <td><?php echo $row->email;?></td>
                  <td><?php echo $row->username;?></td>
                  <td><button id="changeStatus" class ="btn btn-warning"><?php if($row->status==1){echo "Active";}else{echo "Inactive";}?></button></td>
                  <!---<td> <?php if($row->tstatus==1){
                    ?><a href="<?php echo base_url();?>index.php/subscriberController/tactive/<?php echo $row->username;?>"> <div style="color:#46b92b;"><i class="btn btn-info"><?php echo "Temporary Active";?></i></div></a>
                    <?php
                   }elseif($row->pstatus==1) {?> <div style="color:red;"><i class="btn btn-success"><?php echo "Permanent Active";?></i></div><?php } ?></td>---->
                  <td><a href="<?php echo base_url();?>index.php/subscriberController/subscriberfull_profile/<?php echo $row->id;?>"><i class="fa fa-user" style="color:green;font-size:24px;"></i></a>
                  <!-- <a href="<?php echo base_url();?>index.php/branch/delete_branch/<?php echo $row->username;?>"><i class="btn btn-danger">Delete</i></a> -->
                  
                  </td>
                  
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
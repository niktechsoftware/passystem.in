
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">DayBook Details</span></h4>
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
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>-->
										<a href="#" class="export-pdf" data-table="#sample-table-2" >
											Save as PDF
										</a>
									</li>
									<li>
										<a href="#" class="export-png" data-table="#sample-table-2">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#sample-table-2" >
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#sample-table-2" >
											Save as TXT
										</a>
									</li>
									<li>
										<a href="#" class="export-xml" data-table="#sample-table-2" >
											Save as XML
										</a>
									</li>
									<li>
										<a href="#" class="export-sql" data-table="#sample-table-2" >
										Save as SQL
										</a>
									</li>
									<li>
										<a href="#" class="export-json" data-table="#sample-table-2" >
											Save as JSON
										</a>
									</li>
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#sample-table-2" >
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#sample-table-2">
											Export to PowerPoint
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="form-group" style="padding:20px;">
					    <form method="post" action="<?php echo base_url();?>branchController/getdaybook">
					    <div class="col-md-4">
					        <input type="date" class="form-control" name="start_d" style="width:280px; padding:10px; margin: inherit;"/>
    					</div>
    					<div class="col-md-4">
    					    <input type="date" class="form-control" name="end_d" style="width:280px; padding:10px; margin: inherit;"/>
    					</div>
    					<div class="col-md-4">
    					    <input type="submit" class="btn btn-success" name="submit" value="Submit"/>
    					</div>
    					</form>
					</div>
					<br>
      	            <div>
      	                <strong><center> <h2 style='color: green'> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2></center></strong>
                    </div>
				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th>S.No</th>
                                        <th>Paid To</th>
                                        <th>Paid By Name</th>
                                        <th>Paid By Username</th>
                                        <th>Reason</th>
                                        <?php if($condition=="Both"){?>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <?php }?>
                                        <?php if($condition=="Debit"){?>
                                        <th>Debit</th>
                                        <?php }?>
                                        <?php if($condition=="Credit"){?>
                                        <th>Credit</th>
                                        <?php }?>
                                        <th>Closing Balance</th>
                                        <th>Pay Date</th>
                                        <th>Pay Mode</th>
                                        <th>Invoice Num</th>
									</tr>
								</thead>
                                <tbody>
							 <?php 
							 $id = $this->session->userdata('id');
							 $this->db->where('district',$id);
							 $this->db->get('sub_branch');
							 ?>
              </tbody>
              <tfoot>
<tr>
<td>----</td>
<td>----------</td>
<td align="right"><strong>Total</strong></td>
<td>----------</td>
<td>----------</td>
<?php if($condition=="Both"){?>
<td><?php echo $dabit; ?></td>
<td><?php echo $cradit; ?></td>
<?php }?>
<?php if($condition=="Debit"){?>
<td><?php echo $dabit; ?></td>
<?php }?>
<?php if($condition=="Credit"){?>
<td><?php echo $cradit; ?></td>
<?php }?>

<td>----------</td>
<td>----------</td>
<td>----------</td>
</tr>
</tfoot>   
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>adminController/daybook">Goto Back</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
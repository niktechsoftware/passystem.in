
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
<p>Now you can Inactive a Branch By clicking given inactive Button in concern row.<br>
</p> </div>
				    
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
									
									
										<a href="#" class="export-json" data-table="#sample-table-2" >
											Save as JSON
										</a>
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
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 SPACE20">
							<div class="col-md-5">
								<select class="form-control" id="subbranch">
								<option>-Select Sub Branch-</option>
								<?php foreach($activeList->result() as $row):?>
									<option value="<?php echo $row->id;?>"><?php echo $row->bname;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
					<div class="table-responsive" id="SubscriberList" style="padding-top:20px;">
					
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
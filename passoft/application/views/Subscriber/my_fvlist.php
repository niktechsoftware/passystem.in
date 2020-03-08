
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">My Favourite List </span></h4>
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
<h4 class="media-heading text-center">Welcome to My Favourite List Area </h4>
<p>In This Section You can create own Favourite Product List.Which Product you like then click on green thumb infornt of product
                image and then click on done button to show your favourite product list.You want product which is not present in list then you add product Detail in a OTHER PRODUCT LIST table.<br>
</p> </div>
				    
					<!--<div class="row">-->
					<!--	<div class="col-md-12 space20">-->
						    
							<!--<div class="btn-group pull-right">-->
							<!--	<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">-->
							<!--		Export <i class="fa fa-angle-down"></i>-->
							<!--	</button>-->
								
							<!--	<ul class="dropdown-menu dropdown-light pull-right">-->
							<!--		<li>-->
							<!--			<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
							<!--				Save as PDF-->
							<!--			</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#sample-table-2">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-csv" data-table="#sample-table-2" >-->
							<!--				Save as CSV-->
							<!--			</a>-->
							<!--		</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-txt" data-table="#sample-table-2" >-->
							<!--				Save as TXT-->
							<!--			</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									
									<!--	<a href="#" class="export-json" data-table="#sample-table-2" >-->
									<!--		Save as JSON-->
									<!--	</a>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-excel" data-table="#sample-table-2" >-->
							<!--				Export to Excel-->
							<!--			</a>-->
							<!--		</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-doc" data-table="#sample-table-2" >-->
							<!--			Export to Word-->
							<!--		</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								
							<!--</div>-->
					<!--	</div>-->
					<!--</div>-->
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Company</th>
                                        <th width:"10px">Product Name</th> 
										<th width:"10px">Image</th>
										<th width:"10px">Size</th>
                                        <th width:"10px">Type</th>
                                        <th width:"10px">Price</th>
                                        <th width:"10px">Offer Pic</th>
                                        <!-- <th width:"10px">Image 2</th>
                                        <th width:"10px">Offer</th>
                                        <th width:"10px">Like</th>
                                        <th width:"10px">DisLike</th> -->
									</tr>
								</thead>
                                <tbody>
								<?php $i=1;if($fv_data->num_rows()>0)
								{
									foreach($fv_data->result() as $data)
									{ 
										foreach($p_data->result() as $pdata)
										{
											if($data->product_code==$pdata->id)
											//echo $pdata->name."<br>";
											{?>
												<tr class="text-uppercase text-center">
													<td width:"10px"><?php echo $i; ?></td>
													<td width:"10px"><?php echo $pdata->company; ?></td>
													<td width:"10px"><?php echo $pdata->name; ?></td>
													<td width:"10px"><?php if(strlen($pdata->file1)>0){?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } elseif(strlen($pdata->file2)>0) { ?><img class="zoom1"  src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file2;?>" style="max-height: 50px; max-width: 100px;"><?php } else { echo "N/A"; } ?></td>
													<td width:"10px"><?php echo $pdata->size; ?></td>
													<td width:"10px"><?php echo $pdata->p_type; ?></td>
													<td width:"10px"><?php echo $pdata->selling_price; ?></td>
													<td width:"10px"><?php if(strlen($pdata->file3)>0){?><img class="zoom1"  src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file3;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { echo "N/A"; ?><?php }?></td>
													<!--<td width:"10px"></td>
													<td width:"10px"></td>
													<td width:"10px"></td> -->
												</tr><?php
											}
										} $i++;
									}
								}?>
                                </tbody>   
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>subscriberController/my_phlist">Go to Next Step</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
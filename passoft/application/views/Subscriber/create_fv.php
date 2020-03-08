<?php //print_r($p_data);?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Create Favourite List </span></h4>
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
<h4 class="media-heading text-center">Welcome to Create Favourite List Area </h4>
<p>In This Section You can create own Favourite Product List.Which Product you like then click on green thumb infornt of product
                image and then click on done button to show your favourite product list.You want product which is not present in list then you add product Detail in a OTHER PRODUCT LIST table.<br>
</p> </div>
				     <?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Successfully Done!!!!!
							</div>
                <?php }elseif($this->uri->segment(3)==6){?> 
                    <div class="successHandler alert alert-danger">
								<i class="fa fa-ok"></i> Not Successfully Done!!!!!
							</div>
                 <?php }?>
					<div class="row">
						<div class="col-md-12 space20">
					<!--		<div class="btn-group pull-right">-->
					<!--			<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">-->
					<!--				Export <i class="fa fa-angle-down"></i>-->
					<!--			</button>-->
								
					<!--			<ul class="dropdown-menu dropdown-light pull-right">-->
					<!--				<li>-->
					<!--					<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
					<!--						Save as PDF-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-png" data-table="#sample-table-2">-->
					<!--						Save as PNG-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-csv" data-table="#sample-table-2" >-->
					<!--						Save as CSV-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-txt" data-table="#sample-table-2" >-->
					<!--						Save as TXT-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-xml" data-table="#sample-table-2" >-->
					<!--						Save as XML-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-sql" data-table="#sample-table-2" >-->
					<!--					Save as SQL-->
					<!--					</a>-->
									
									
					<!--					<a href="#" class="export-json" data-table="#sample-table-2" >-->
					<!--						Save as JSON-->
					<!--					</a>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-excel" data-table="#sample-table-2" >-->
					<!--						Export to Excel-->
					<!--					</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-doc" data-table="#sample-table-2" >-->
					<!--					Export to Word-->
					<!--				</a>-->
					<!--				</li>-->
					<!--				<li>-->
					<!--					<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
					<!--						Export to PowerPoint-->
					<!--					</a>-->
					<!--				</li>-->
								
					<!--		</div>-->
							<div  id="number"  class="btn btn-success col-md-1">
								<?php $this->db->where('id',$id);
								$sb_data=$this->db->get('customers')->row();
							
								$this->db->where('customer_id',$id);
								$this->db->where('sub_branchid',$sb_data->sub_branchid);
								$count= $this->db->get('favourite_list')->num_rows();
								// 	print_r($count);
								// exit;
								echo $count; ?>
							</div>
						</div>
					</div>
					<?php if($p_data->num_rows()>0) {  } ?>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Company</th>
                                        <th width:"10px">Product Name</th> 
                                        <th width:"10px">Type</th>
                                        <th width:"10px">Size</th>
                                        <th width:"10px">Price</th>
                                        <th width:"10px">Image 1</th>
                                        <th width:"10px">Like</th>
                                        <th width:"10px">Image 2</th>
                                        <th width:"10px">Offer</th>
                                        
                                        <!--<th width:"10px">Dislike</th>-->
									</tr>
								</thead>
                                <tbody>
								<?php $like=0; $i=1; foreach($p_data->result() as $pro_data){?>
                                    <tr>
                                        <td width:"10px"><?php echo $i;?></td>
                                        <td width:"10px"><?php echo $pro_data->company;?></td>
                                        <td width:"10px"><?php echo $pro_data->name;?></td>
                                        <td width:"10px"><?php echo $pro_data->p_type;?></td>
                                        <td width:"10px"><?php echo $pro_data->size;?></td>										
                                        <td width:"10px"><?php echo $pro_data->selling_price;?></td>
                                        <td width:"10px"><?php if(strlen($pro_data->file1)>0){?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { ?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file2;?>" style="max-height: 50px; max-width: 100px;"><?php }?></td>
                                        
                                        
										
										<input type="hidden" value="<?php echo $pro_data->id;?>" id="abc<?php echo $i;?>" />
										<td width:"10px">
										    <img src="<?php echo $this->config->item('asset_url');?>/images/subscriber/like.jpg" id="inactive<?php echo $i;?>" style="max-height: 50px;">
										    
										    <img src="<?php echo $this->config->item('asset_url');?>/images/subscriber/heart.gif" id="active<?php echo $i;?>" style="max-height: 50px;">
                                            
										</td>
											<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
									<script>
					                     $("#active<?php echo $i;?>").hide();
                                        $("#inactive<?php echo $i;?>").hide();
									    <?php $condtion= array('product_code' => $pro_data->id, 'customer_id' =>$id,'sub_branchid' =>$sub_data->row()->sub_branchid);
											$this->db->where($condtion);
											$fv_check=$this->db->get('favourite_list')->num_rows();
											if($fv_check>0) 
											{ ?>
											     $("#active<?php echo $i;?>").show();
                                                $("#inactive<?php echo $i;?>").hide();
												<?php } else 
											{ ?>
    											$("#inactive<?php echo $i;?>").show();
                                                $("#active<?php echo $i;?>").hide();
												<?php	} ?>
										

											$("#inactive<?php echo $i;?>").click(function(){
                                           var id = $("#abc<?php echo $i;?>").val();
                                           //alert(id);
												$.post("<?php echo site_url();?>subscriberController/insert_in_fvlist", { id:id }, function(data){
													$("#active<?php echo $i;?>").show();
                                                    $("#inactive<?php echo $i;?>").hide();
													$('#number').html(data);
												});
											});
											    $("#active<?php echo $i;?>").click(function(){
                                                var id = $("#abc<?php echo $i;?>").val();
                                                //alert(id);
												$.post("<?php echo site_url();?>subscriberController/delete_in_fvlist", { id:id }, function(data){
													$("#active<?php echo $i;?>").hide();
                                                    $("#inactive<?php echo $i;?>").show();
													$('#number').html(data);
												});
											});
									</script>
                                       <td width:"10px"><?php if(strlen($pro_data->file2)>0){?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file2;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { ?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file1;?>" style="max-height: 50px; max-width: 100px;"><?php }?></td>
                                        <td width:"10px"><?php if(strlen($pro_data->file3)>0){?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file3;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { echo "N/A"; ?><?php }?></td>
                                    </tr>
								
									<?php $i++; } ?>
                                </tbody>   
							</table>
						    <a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>subscriberController/my_fvlist">Go to Next Step</a>
						</div>
					</div>
				
			<!-- end: EXPORT DATA TABLE PANEL -->

				<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Add Other Product </span></h4>
                </div>
				<div class="panel-body">				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <!--<th width:"10px">SNO</th>-->
                                        <th width:"10px">Company</th>
                                        <th width:"10px">Product Name</th> 
                                        <th width:"10px">Type</th>
                                        <th width:"10px">Size</th>
                                        <th width:"10px">Price (Approx)</th>
                                        <th width:"10px">Image</th>
                                        <th width:"10px"></th>
                                       
									</tr>
								</thead>
								<tbody>
										<tr class="text-uppercase text-center">
											<!--<form action="<?php echo base_url();?>subscriberController/demand_prolist" enctype="multipart/form-data" method="post">-->
									
											<td width:"10px"><input type="text" id="company" class="form-control" name="company" required></td>
											<td width:"10px"><input type="text" id="productname" class="form-control" name="ProductName" required></td>
											<td width:"10px"><input type="text" id="type"  class="form-control" name="Type"></td>
											<td width:"10px"><input type="text" id="size"  class="form-control"name="Size" ></td>
											<td width:"10px"><input type="text" id="price"  class="form-control"name="Price"></td>
											<td width:"10px"><input type="file" id="image"  class="form-control" name="Image"></td>
											<td width:"10px"><input type="submit" id="addpd" class="btn btn-danger" value="Add Product"></td>
											<!--</form>-->
										</tr>
										<script>
										    $("#addpd").click(function(){
										       var company = $("#company").val();
										       var productname = $("#productname").val();
										       var type = $("#type").val();
										       var size = $("#size").val();
										       var price = $("#price").val();
										       var image = $("#image").val();
										      $.post("<?php echo site_url();?>subscriberController/demand_prolist",{company:company,productname:productname,type:type,size:size,price:price,image:image},function(data){
										          alert(data);
										      });
										      //  alert(company);
										      //  alert(ProductName);
										      //  alert(Type);
										      //  alert(Size);
										      //  alert(Price);
										      //  alert(Image);
										    });    
										</script>
										
									</tbody>   
							
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
</div>
			</div>
       
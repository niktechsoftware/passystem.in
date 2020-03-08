<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">My Purchase List </span></h4>
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
<h4 class="media-heading text-center">Welcome to My Purchase List Area </h4>
<p>In This Section You can create own Favourite Product List.Which Product you like then click on green thumb infornt of product
                image and then click on done button to show your favourite product list.You want product which is not present in list then you add product Detail in a OTHER PRODUCT LIST table.<br>
</p> </div>
				    
					<div class="row">

						<!--<div class="col-md-12 space20">-->
						<!--	<div class="btn-group pull-right">-->
						<!--		<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">-->
						<!--			Export <i class="fa fa-angle-down"></i>-->
						<!--		</button>-->
								
						<!--		<ul class="dropdown-menu dropdown-light pull-right">-->
						<!--			<li>-->
						<!--				<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
						<!--					Save as PDF-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-png" data-table="#sample-table-2">-->
						<!--					Save as PNG-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-csv" data-table="#sample-table-2" >-->
						<!--					Save as CSV-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-txt" data-table="#sample-table-2" >-->
						<!--					Save as TXT-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-xml" data-table="#sample-table-2" >-->
						<!--					Save as XML-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-sql" data-table="#sample-table-2" >-->
						<!--				Save as SQL-->
						<!--				</a>-->
									
									
						<!--				<a href="#" class="export-json" data-table="#sample-table-2" >-->
						<!--					Save as JSON-->
						<!--				</a>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-excel" data-table="#sample-table-2" >-->
						<!--					Export to Excel-->
						<!--				</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-doc" data-table="#sample-table-2" >-->
						<!--				Export to Word-->
						<!--			</a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
						<!--					Export to PowerPoint-->
						<!--				</a>-->
						<!--			</li>-->
								
						<!--	</div>-->
						<!--</div>-->
						<div class="col-md-12 space20">
							<a href="<?php echo base_url();?>subscriberController/my_bill" style="float:right;"><img
							src="<?php echo $this->config->item('asset_url');?>/images/subscriber/cart.gif"
							style="max-height:30px;margin-right:10px;">
							<div id="cardvalue">
								<?php 
								  $customer_id= $this->session->userdata('id');
								 $this->db->where('cust_usr',$customer_id);
								 $plist=$this->db->get('purchase_list')->num_rows();
								echo $plist;
								 ?>
							</div>
							</a>
						</div>
					</div>
					<!--<div class="table-responsive">-->
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th>SNO</th>
                                        <th>Company</th>
                                         <th>Code</th>
                                        <th>Product Name</th> 
										<th>Image</th>
										<th>Size</th>
                                        <th>Type</th>
                                        <th>Price</th>
										<th>Add To Cart</th>
                                        <th>Offer Pic</th>
                                        <!-- <th>Image 2</th>
                                        <th>Like</th>
                                        <th>DisLike</th> -->
									</tr>
								</thead>
                                <tbody>
								<?php $i=1;if($fv_data->num_rows()>0)
								{
									foreach($fv_data->result() as $data)
									{ 
										foreach($p_data->result() as $pdata)
										{
											if($data->product_code==$pdata->id && $data->customer_id == $id)
											{?>
												<tr class="text-uppercase text-center">
													<td><?php echo $i; ?></td>
														<td><?php echo $pdata->hsn; ?></td>
													<td><?php echo $pdata->company; ?></td>
													<td><?php echo $pdata->name; ?></td>
													<td><?php if(strlen($pdata->file1)>0){?><img class="zoom1"  src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } elseif(strlen($pdata->file2)>0) { ?><img class="zoom1" src="<?php echo base_url();?>assets/productimg/<?php echo $pdata->file2;?>" style="max-height: 50px; max-width: 100px;"><?php } else { echo "N/A"; } ?></td>
													<td><?php echo $pdata->size; ?></td>
													<td><?php echo $pdata->p_type; ?></td>
													<td><?php echo $pdata->selling_price; ?></td>
													<input type="hidden" value="<?php echo $data->product_code;?>" id="cartadd<?php  echo $i;?>" />
													<td><?php 
															$this->db->where('p_code',$data->product_code);
															$this->db->where('subbranch_id',$data->sub_branchid);
															$sb_wallet1=$this->db->get('subbranch_wallet');
															//$sb_wallet= $sb_wallet2->row();
															if($sb_wallet1->num_rows()>0)
															{ $sb_wallet=$sb_wallet1->row();
															$quanity = $sb_wallet->rec_quantity-$sb_wallet->sale_quantity;
																if($quanity > 1)
																	  { 
																	      $this->db->where('pt_code',$sb_wallet->p_code);
																	      $this->db->where('cust_usr',$id);
																	      $ppdata= $this->db->get('purchase_list')->num_rows();
																		  if($ppdata>0) { ?>
																		<input  type="button"  class="btn btn-primary" value ='Added to Cart' />
																		<?php }
																		else { ?> 
																			<input  type="button" id="add<?php  echo $i;?>" class="btn btn-success " value ='Add to Cart' />
																		<input  type="button" id="added<?php  echo $i;?>" class="btn btn-primary" value ='Added to Cart' />
																		<?php }  ?>
																		
																		
																<?php }
																else
																{ ?>
																	<a href ="#" class="btn btn-danger">Not Available</a>
																<?php	}
															}
															else
															{ ?>
																<a href ="#" class="btn btn-danger">Not Available</a>
															<?php	}
													?>
													</td>
													<td><?php if(strlen($pdata->file3)>0){?><img class="zoom1"  src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file3;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { echo "N/A"; ?><?php }?></td>
													<!--<td></td>
													<td></td> -->
													<script>
														$(document).ready(function(){	
															$("#add<?php  echo $i;?>").show();
															$("#added<?php  echo $i;?>").hide();

																$("#add<?php echo $i;?>").click(function(){
																	var id = $("#cartadd<?php  echo $i;?>").val();
																	//alert(id);
																	$("#add<?php echo $i;?>").hide();
																	$("#added<?php echo $i;?>").show();
																	//alert(id);
																	$.post("<?php echo site_url('subscriberController/addtocart_data');?>", { id : id }, function(data){
																		$("#cardvalue").html(data);
																	});
																	
																});
														});
													</script>
												</tr><?php $i++;
											}
										} 
									}
								}?>
                                </tbody>   
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>subscriberController/my_bill">Go to Next Step</a>
					<!--</div>-->
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>


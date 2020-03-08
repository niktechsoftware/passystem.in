
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
                                    <p>In This add product Detail in a OTHER PRODUCT LIST table.<br>
                                    </p> 
                                </div>
				    
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
								
								
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Name & ID</th>
                                        <th width:"10px">Amount In Wallet</th> 
										<th width:"10px">Request</th>
										<th width:"10px">Date</th>
                                        <th width:"10px">Status</th>
									</tr>
								</thead>
                                <tbody>
								<?php $datta= $this->db->get('cashback_req'); 
								if($datta->num_rows()>0){
								    $i=1;
								    foreach($datta->result() as $data){ ?>
								        <tr class="text-uppercase text-center">
											<td width:"10px"><?php echo $i;?></td>
										<?php	$this->db->where('username',$data->username);
											    $sb_ddt = $this->db->get('customers'); ?>
											<td width:"10px"><?php if($sb_ddt->num_rows()>0){ echo $sb_ddt->row()->name."[".$data->username."]"; } else { echo "N/A"; } ?></td>
											<?php	$this->db->where('cid',$sb_ddt->row()->id);
											$sb_wl = $this->db->get('pv'); 
											 ?>
											<td width:"10px"><?php if($sb_wl->num_rows()>0){ echo $sb_wl->row()->rupee; } else { echo "N/A"; } ?></td> 
											<td width:"10px"><?php echo $data->amount;?></td>
											<td width:"10px"><?php echo $data->date;?></td>
											<input type="hidden" id="row<?php echo $i;?>" value="<?php echo $data->id;?>"/>
											<input type="hidden" id="sb_row<?php echo $i;?>" value="<?php echo $sb_ddt->row()->id;?>"/>
											<td width:"10px">
											<input type="button" id="approve<?php echo $i;?>" value="Approved" class="btn btn-success"/>
											<input type="button" id="wait<?php echo $i;?>" value="Waiting" class="btn btn-danger"/>
											</td> 
										</tr>
										<script>
										    	$(document).ready(function(){
										    	    <?php if($data->status == 1){?>
										    	   $("#approve<?php echo $i;?>").show();
										    	   $("#wait<?php echo $i;?>").hide();
										    	   <?php } else {?>
										    	    $("#approve<?php echo $i;?>").hide();
										    	        $("#wait<?php echo $i;?>").show();
										    	  <?php }?>
										    	   $("#wait<?php echo $i;?>").click(function(){
										    	       var row_id = $("#row<?php echo $i;?>").val();
										    	        var sbrow_id = $("#sb_row<?php echo $i;?>").val();
										    	       $.post("<?php echo site_url("adminController/cashback_approve");?>", {row_id:row_id,sbrow_id:sbrow_id}, function(data){
										    	           alert(data);
										    	          $("#approve<?php echo $i;?>").show();
										    	        $("#wait<?php echo $i;?>").hide();
										    	       });
										    	       
										    	   });
										    	   
										    	});
										</script>
									
								 <?php  $i++; }
								
								}?>
													
                                </tbody>   
							</table>
						</div>
					<center><a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>login/index">Back To Dashboard</a></center>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
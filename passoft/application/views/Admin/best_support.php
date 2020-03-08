
                         <?php if($this->uri->segment(3)==5){ ?> 
                        <script>
                            alert('Successfully.');
                        </script>
                             
                         <?php } ?>
                         <!--////////////////////-->
                         
                         
                         
                         <div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Upload Best Supporting Authorities</span></h4>
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
				    <form action="<?php echo base_url();?>adminController/best_support" method="post" enctype="multipart/form-data">
												    
							<div  id="addressinsert" style="margin-top:20px;"  >
							      
							    <div class="col-md-12 space20">
                              
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      	<div class="col-md-3">
                                            <input id="name" name="name" placeholder="Enter Name" required="" type="text" class="form-control text-uppercase">
                                        </div> 
                                        	<div class="col-md-6">
                                                <textarea id="msg" name="msg"  placeholder="Enter Message" required="" class="form-control text-uppercase"></textarea>
                                            </div>  
                                            <div class="col-md-3">
                                                <input id="photo" name="photo"  required="" type="file" class="form-control">
                                            </div> 
                                  </div>
                                </div>
                            
                              </div>
                             <div class="row">
                                 <div class="col-md-12">
                                  <div class="form-group">
                                <center><input id="save_bst" value="Save" type="submit" class="btn btn-success"/></center> 
                                  </div>
                                <span id="validid"></span>
                              </div>
                            </div>
                          </div>
                    </form>
				
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">Sno</th>
                                        <th width:"10px">Name</th>
                                        <th width:"10px">Image</th> 
										<th width:"10px">View</th>
										<th width:"10px">Action</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php $bst = $this->db->get('bst_supporting');
                                    $i=1;
                                    foreach($bst->result() as $bdata)
                                    { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $bdata->name;?></td>
                                            <td><img src="<?php echo $this->config->item('asset_url'); ?>/images/people/<?php echo $bdata->image;?>" class="img1" style="width:60px; height:60px;"/></td>
                                            <td><?php echo $bdata->msg;?></td>
                                            
                                            <td><input type="hidden" id="idd<?php echo $i;?>" value="<?php echo $bdata->id;?>"/>
                                                <input type="button" value="delete" class="btn btn-danger" id="dlt<?php echo $i;?>"/></td>
                                        </tr>
                                        <script>
                                            $("#dlt<?php echo $i;?>").click(function(){
                                                var id = $("#idd<?php echo $i;?>").val();
                                                // alert(id);
                                                $.post("<?php echo site_url();?>adminController/dlet_bst",{id:id},function(data){
                                                    alert(data);
                                                  window.location.reload();
                                                });
                                            });
                                        </script>
                                    <?php $i++; }
                                    ?>
                                    
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
                         
                         
                         
                         
                         <!--////////////////-->
                      
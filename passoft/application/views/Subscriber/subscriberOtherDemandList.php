
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Subscriber Other Demand  List</span></h4>
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
<h4 class="media-heading text-center">Welcome to Subscriber Other Demand List </h4>
<p>Now you can see the Other Demand List of Subscriber  .<br>
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
										 <th>S.No.</th>
						                  <th>Subscriber</th>
						                  <th>Mobile</th>
						                  <th>Product</th>
						                  <th>Company</th>
						                  <th>Type Of Product</th>
						                  <th>Volume</th>
						                 <th>Date</th>
						                 <th>Image</th>
						                   <?php if($this->session->userdata("login_type")==1){?>
						                   <th>Action</th
						                   <?php } ?>
									</tr>
								</thead>
								<tbody>
							<?php if($this->session->userdata("login_type")==2)
							        {
							            $i=1;
                                        if($activeList->num_rows()>0)
                                        {
                    					    foreach($activeList->result() as $row)
                    					    {
                    					       $cum = $row->customer_id;
                                                $this->db->where('id',$cum);
                                                $cus=$this->db->get('customers')->row(); ?>
                    					      
                    					      
                                                <tr class="text-uppercase text-center">
                                                  <td><?php echo $i;?> <input type = "hidden" id ="did<?php echo $i;?>" value = "<?php echo $row->id;?>" ></td>
                                                  <td><a href="<?php echo base_url();?>subscriberController/showfavlist/<?php echo $cum;?>"><span style="color:#01a9ac;"><?php echo $cus->name." [".$cum."] " ;?></a></td>
                                                  <td><?php echo $cus->mobile;?></td>
                                                  <td><?php echo $row->product_name;?></td>
                                                  <td><?php echo $row->company_name;?></td>
                                                  <td><?php echo $row->typeof_product;?></td>
                                                  <td><?php echo $row->size;?></td>
                                              	  <td><?php echo $row->date;?></td>
                                              	  <td><img src="<?php echo $this->config->item('asset_url'); ?>/productimg/<?php echo $row->file_1;?>" class="zoom1" style="width:50;height:30px;"></td>
                                                <?php if($this->session->userdata("login_type")==1){?>
                                                    <td><button class ="btn btn-danger" id="del<?php echo $i;?>" >Delete</button></td>
                                                  <script>
                                                   
                                                      $("#del<?php echo $i;?>").click(function(){
                                                            var mid = $("#did<?php echo $i;?>").val();
                                                          
                                                            $.post("<?php echo site_url('stockController/delOther')?>", {mid : mid}, function(data){
                                                                $("#del<?php echo $i;?>").html(data);
                                                                
                                                    		});
                                                        });
                                                    
                                                    
                                                </script>
                                                    
                                               <?php } ?>
                                                
                                                </tr>
                                           <?php
                    					        
                                           $i++;
                    					        
                    					    }
							            }
							        }
							        else
							        {
							            $i=1;
                                        if($activeList->num_rows()>0)
                                        {
                    					    foreach($activeList->result() as $row)
                    					    {
                    					        $cum = $row->customer_id;
                                                $this->db->where('id',$cum);
                                                $cus=$this->db->get('customers')->row(); ?>
                                                
                                                <tr class="text-uppercase text-center">
                                                  <td><?php echo $i;?> <input type = "hidden" id ="did<?php echo $i;?>" value = "<?php echo $row->id;?>" > </td>
                                                  <td><a href="<?php echo base_url();?>subscriberController/showfavlist/<?php echo $cum;?>"><span style="color:#01a9ac;"><?php echo $cus->name." [".$cum."] " ;?></a></td>
                                                  <td><?php echo $cus->mobile;?></td>
                                                  <td><?php echo $row->product_name;?></td>
                                                  <td><?php echo $row->company_name;?></td>
                                                  <td><?php echo $row->typeof_product;?></td>
                                                  <td><?php echo $row->size;?></td>
                                              	  <td><?php echo $row->date;?></td>
                                              	  <td><img src="<?php echo $this->config->item('asset_url'); ?>/productimg/<?php echo $row->file_1;?>" class="zoom1" style="width:50;height:30px;"></td>
                                                  <?php if($this->session->userdata("login_type")==1){?>
                                                    <td><button class ="btn btn-danger" id="del<?php echo $i;?>" >Delete</button></td>
                                                <script>
                                                  
                                                      $("#del<?php echo $i;?>").click(function(){
                                                            var mid = $("#did<?php echo $i;?>").val();
                                                           
                                                            $.post("<?php echo site_url('stockController/delOther')?>", {mid : mid}, function(data){
                                                                $("#del<?php echo $i;?>").html(data);
                                                                
                                                    		});
                                                        });
                                                    
                                                    
                                                </script>
                                                    
                                               <?php } ?>
                                                </tr>
                                           <?php
                                           $i++;
                    					    }
							            }
							       }
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
<!--	<script>
	    if(<?php //echo $this->uri->segment(3);?>==5)
	    {
	        alert("Other Demand Submitted successfully");
	    }
	    else if(<?php //echo $this->uri->segment(3);?>==6)
	    {
	        alert("Demand not submitted");
	    }
	</script>-->
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
                                        </p> 
                                </div>
                              <div class="row">
                                  <div class="col-md-12">
                                       <div  id="number"  class="btn btn-success col-md-1" style="float:right;">
            								<?php $id = $this->session->userdata('id');
            								$this->db->where('id',$id);
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
                                    <div class="row">
                                        <div class="col-md-3" style="border-right: 3px solid black;">
                                            <?php $cat = $this->db->get('category')->result();
                                             $i = 1;
                                            foreach($cat as $catdt)
                                            {
                                                echo "<br><br><label style='color:purple; font-size:18px;'><b>".$catdt->name."</b></label>";
                                                $this->db->where('cat_id',$catdt->id);
                                                $subcat = $this->db->get('sub_category');
                                                if($subcat->num_rows()>0)
                                                {
                                                   
                                                    foreach($subcat->result() as $subcatdt)
                                                    {  ?>
                                                        <br><input type="radio" name="subcat" id="chkb<?php echo $i;?>" value="<?php echo $subcatdt->id;?>">
                                                        <?php echo "<label style='font-size:14px;'>".$subcatdt->name."</label>"; 
                                                    
                                                        ?>
                                                        <script>
                                                             $("#chkb<?php echo $i;?>").click(function(){
                                                                 var subcat_id =$("#chkb<?php echo $i;?>").val();
                                                                  $.ajax({
                                                                      "url": "<?php echo site_url();?>subscriberController/get_product",
						"method": 'POST',
						"data": {subcat_id:subcat_id},
						beforeSend: function(data) {
							$("#pro_list").html("<center><img src='<?= base_url()?>assets/wait.gif' /></center>")
						},
						success: function(data) {
						 $('#pro_list').html(data);
						},
						error: function(data) {
							$("#pro_list").html(data)
						}
					})
					
					});
                                                              
                                                         </script>
                                                <?php  $i++; 
                                                    }
                                                }

                                                
                                            }
                                            ?>
                                            <!--<input type="button" value="Filter">-->
                                        </div>
                                        <!--<div class="col-md-1" style=" border-left: 3px solid black;"></div>-->
                                        <div class="col-md-9" >
                                            <div class= "col-md-12" id="pro_list">
                                                
                                            </div>
						                    <div class="col-md-12">
    						                    <div class="panel-heading panel-red">
                                					<h4 class="panel-title"> <span class="text-bold">Add Other Product </span></h4>
                                                </div>
                                                <div class="panel-body">				
                                					<!--<div class="table-responsive">-->
                                						<div class="table-responsive">
                                							<table class="table table-striped table-hover" >
                                								<thead>
                                									<tr style="background-color:#1ba593; color:white;">
                                                                        <!--<th width:"10px">SNO</th>-->
                                                                        <th>Company</th>
                                                                        <th >Product Name</th> 
                                                                         <th >Type</th>
                                                                        <th >Size</th>
                                                                         <th >Price (Approx)</th>
                                                                         <th >Image</th>
                                                                         <th ></th>
                                                                       
                                									</tr>
                                								</thead>
                                								<tbody>
                                								    	<form action="<?php echo base_url();?>subscriberController/demand_prolist" enctype="multipart/form-data" method="post">
                                										<tr class="text-uppercase text-center">
                                										
                                									
                                											<td ><input type="text" id="company" class="form-control" name="company" required></td>
                                											<td ><input type="text" id="productname" class="form-control" name="productname" required></td>
                                											<td ><input type="text" id="type"  class="form-control" name="type"></td>
                                											<td ><input type="text" id="size"  class="form-control"name="size" ></td>
                                											<td ><input type="text" id="price"  class="form-control"name="price"></td>
                                											<td ><input type="file" id="image1"  class="form-control" name="image"></td>
                                											<td><input type="submit" id="addpd" name="addpd" class="btn btn-danger" value="Add Product"></td>
                                											<!--</form>-->
                                										</tr>
                                										</form>
                                									</tbody>   
                                							
                                							</table>
                                						</div>
                                					</div>
						                    </div>
                                        </div>
                                        
                                    </div>
                               
			
			<!-- end: EXPORT DATA TABLE PANEL -->
			    </div>
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
</div>
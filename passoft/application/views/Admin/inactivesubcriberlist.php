
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Temporary Subscriber List</span></h4>
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
<h4 class="media-heading text-center">Registered Temporary Subscriber List</h4>
<p>Now you can Inactive a Branch By clicking given inactive Button in consern row.<br>
</p> </div>
				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>-->
										<a href="#" class="export-pdf" data-table="#subscriberList" >
											Save as PDF
										</a>
									</li>
									<li>
										<a href="#" class="export-png" data-table="#subscriberList">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#subscriberList" >
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#subscriberList" >
											Save as TXT
										</a>
									</li>
									<li>
										<a href="#" class="export-xml" data-table="#subscriberList" >
											Save as XML
										</a>
									</li>
									<li>
										<a href="#" class="export-sql" data-table="#subscriberList" >
										Save as SQL
										</a>
									
									
										<a href="#" class="export-json" data-table="#subscriberList" >
											Save as JSON
										</a>
									<li>
										<a href="#" class="export-excel" data-table="#subscriberList" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#subscriberList" >
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#subscriberList">
											Export to PowerPoint
										</a>
									</li>
								
							</div>
						</div>
					</div>
					
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="subscriberList">
								<thead>
								<tr>
                                <th>#</th>
                                <th>Subscriber Name</th>
                                <th>Father Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th> Status</th>
                                <th> Temp/Per Active</th>
                                 <!--<th> Temp/Per Active</th>-->
                                <th>full Profile</th>
                              </tr>
								</thead>
								<tbody>
								
                                  <?php 
                                 $uri= $this->uri->segment(3);
                                 if($uri==3){
                                    	$d=date('Y-m-d');
                                        $this->db->where('Date(created)',$d);
										$this->db->where("tstatus",1);
										$this->db->where('status',0);
									$dt= $this->db->get('customers');
                                
                                 
                                if($dt->num_rows()>0){
                                  ?>
                                  <?php  $i=1;
                                  foreach($dt->result() as $row):?>
                                  <tr class="text-uppercase">
                                    <td><?php echo $i;?></td>
                                      <td><?php echo $row->name;?></td>
                                      <td><?php echo $row->father_name;?></td>
                                      <td><?php echo $row->address;?></td>
                                      <td class="text-lowercase"><?php echo $row->email;?></td>
                                      <td><?php echo $row->username;?></td>
                                      <!--<td><a href="<?php echo base_url();?>index.php/customer/active_customer/<?php echo $row->username;?>"><?php if($row->status==1){
                                        ?><div style="color:green;"><?php echo "Active";
                                        }else{ ?></div><?php echo "Inactive";
                                        }?></a> </td>-->
                                <input type="hidden" id="id<?php echo $i;?>" value="<?php echo $row->username;?>"/>
                                    <td>
                                    <input class="btn btn-success" type="button" id="active<?php echo $i;?>" value="ACTIVE"/>
                                    <input class="btn btn-danger" type="button" id="inactive<?php echo $i;?>" value="INACTIVE"/>
                                    </td>
                                    <td>
                                
                                    <?php if($row->tstatus==1){
                                      ?><a href="<?php echo base_url();?>index.php/subscriberController/tactive/<?php echo $row->username;?>"> <div style="color:#46b92b;"><i class="btn btn-info"><?php echo "Temporary Active";?></i></div></a>
                                      <?php
                                    }elseif($row->pstatus==1) {?> <div style="color:red;"><i class="btn btn-success"><?php echo "Permanent Active";?></i></div><?php } ?>
                                    </td>
                                   
                                   <td><a href="<?php echo base_url();?>index.php/subscriberController/subscriberfull_profile/<?php echo $row->id;?>"><i class="fa fa-user" style="color:green;font-size:24px;"></i></a></td>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                  <script>
                                 $("#active<?php echo $i;?>").hide();
                                    $("#inactive<?php echo $i;?>").hide();
                                  <?php if($row->status==1) { ?>
                                    $("#active<?php echo $i;?>").show();
                                    $("#inactive<?php echo $i;?>").hide();
                                    <?php } else { ?>
                                    $("#inactive<?php echo $i;?>").show();
                                    $("#active<?php echo $i;?>").hide();
                                    <?php } ?>
                                     
                                      //alert(v);
                                      $("#active<?php echo $i;?>").click(function(){
                                           var username = $("#id<?php echo $i;?>").val();
                                           $.post("<?php echo site_url();?>subscriberController/active_inactive", { username : username }, function(data){
                                                   $("#active<?php echo $i;?>").hide();
                                                    $("#inactive<?php echo $i;?>").show();
                                           });
                                          //alert(v);
                                      });
                                      $("#inactive<?php echo $i;?>").click(function(){
                                           var username = $("#id<?php echo $i;?>").val();
                                           $.post("<?php echo site_url();?>subscriberController/active_inactive", { username : username }, function(data){
                                                  $("#active<?php echo $i;?>").show();
                                                    $("#inactive<?php echo $i;?>").hide();
                                           });
                                          //alert(v);
                                      });
                                  </script>
                                  </tr>
                                  	
                                  
                                  <?php  $i++;
                                endforeach;
                                 }  }
                                 else{ 
                                 
                                 	$d=date('Y-m-d');
                                        // $this->db->where('Date(created)',$d);
										$this->db->where("tstatus",1);
									//	$this->db->where('status',0);
								    	$dt= $this->db->get('customers');
                                if($dt->num_rows()>0){
                                  ?>
                                  <?php  $i=1;
                                  foreach($dt->result() as $row):?>
                                  <tr class="text-uppercase">
                                    <td><?php echo $i;?></td>
                                      <td><?php echo $row->name;?></td>
                                      <td><?php echo $row->father_name;?></td>
                                      <td><?php echo $row->address;?></td>
                                      <td class="text-lowercase"><?php echo $row->email;?></td>
                                      <td><?php echo $row->username;?></td>
                                      <!--<td><a href="<?php echo base_url();?>index.php/customer/active_customer/<?php echo $row->username;?>"><?php if($row->status==1){
                                        ?><div style="color:green;"><?php echo "Active";
                                        }else{ ?></div><?php echo "Inactive";
                                        }?></a> </td>-->
                                <input type="hidden" id="id<?php echo $i;?>" value="<?php echo $row->username;?>"/>
                                    <td>
                                    <input class="btn btn-success" type="button" id="active<?php echo $i;?>" value="ACTIVE"/>
                                    <input class="btn btn-danger" type="button" id="inactive<?php echo $i;?>" value="INACTIVE"/>
                                    </td>
                                    <td>
                                
                                    <?php if($row->tstatus==1){
                                      ?><a href="<?php echo base_url();?>index.php/subscriberController/tactive/<?php echo $row->username;?>"> <div style="color:#46b92b;"><i class="btn btn-info"><?php echo "Temporary Active";?></i></div></a>
                                      <?php
                                    }elseif($row->pstatus==1) {?> <div style="color:red;"><i class="btn btn-success"><?php echo "Permanent Active";?></i></div><?php } ?>
                                    </td>
                                   
                                   <td><a href="<?php echo base_url();?>index.php/subscriberController/subscriberfull_profile/<?php echo $row->id;?>"><i class="fa fa-user" style="color:green;font-size:24px;"></i></a></td>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                  <script>
                                 $("#active<?php echo $i;?>").hide();
                                    $("#inactive<?php echo $i;?>").hide();
                                  <?php if($row->status==1) { ?>
                                    $("#active<?php echo $i;?>").show();
                                    $("#inactive<?php echo $i;?>").hide();
                                    <?php } else { ?>
                                    $("#inactive<?php echo $i;?>").show();
                                    $("#active<?php echo $i;?>").hide();
                                    <?php } ?>
                                     
                                      //alert(v);
                                      $("#active<?php echo $i;?>").click(function(){
                                           var username = $("#id<?php echo $i;?>").val();
                                           $.post("<?php echo site_url();?>subscriberController/active_inactive", { username : username }, function(data){
                                                   $("#active<?php echo $i;?>").hide();
                                                    $("#inactive<?php echo $i;?>").show();
                                           });
                                          //alert(v);
                                      });
                                      $("#inactive<?php echo $i;?>").click(function(){
                                           var username = $("#id<?php echo $i;?>").val();
                                           $.post("<?php echo site_url();?>subscriberController/active_inactive", { username : username }, function(data){
                                                  $("#active<?php echo $i;?>").show();
                                                    $("#inactive<?php echo $i;?>").hide();
                                           });
                                          //alert(v);
                                      });
                                  </script>
                                  </tr>
                                  	
                                  
                                  <?php  $i++;
                                endforeach;
                                 } 
                                }?>
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
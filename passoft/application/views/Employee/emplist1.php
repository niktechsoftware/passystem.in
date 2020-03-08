
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
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
								    <th style="text-align:center">S.No.</th>
                                    <th style="text-align:center">Owner Name</th>
                                    <th style="text-align:center">Father Name</th>
                                    <th style="text-align:center">Mobile Name</th>
                                    <th style="text-align:center">Aadhar Number</th>
                                    <th style="text-align:center">Branch</th>
                                    <th style="text-align:center">Shop</th>
                                    <th style="text-align:center">Username</th>
                                    <th style="text-align:center">Inctivate</th>
                                    <th style="text-align:center">Activity</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								
                
                    $i=1;
                    if($view->num_rows()>0)
                    {
                  foreach($view->result() as $row):?>
                <tr class="text-uppercase text-center">
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->name;?>
                  <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid<?php echo $i;?>"/>
                  <input type="hidden" name="table" value = "employee" id="tablename<?php echo $i;?>"/>
                   <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus<?php echo $i;?>"/>
                  </td>
                  <td><?php echo $row->father_name;?></td>
                  <td><?php echo $row->mobile;?></td>
                  <td><?php echo $row->aadhar_no;?></td>
                   <td><?php $view= $row->district;
                  $this->db->where('id',$view);
                  $view1=$this->db->get('branch')->row();
                 echo  $view1->b_name;?></td>
                 <td><?php 
                 $this->db->where('id',$row->sub_branchid);
                  $view1dt=$this->db->get('sub_branch')->row();
                 echo $view1dt->bname;?></td>
                  <td><?php echo $row->username;?></td>
                  <td><button id="changeStatus<?php echo $i;?>" class ="btn btn-warning"><?php if($row->status==1){echo "Active";}else{echo "Inactive";}?></button></td>
                      <script>
                        $("#changeStatus<?php echo $i;?>").click(function(){
					var rowid= $("#rowid<?php echo $i;?>").val();
					var tablename = $("#tablename<?php echo $i;?>").val();
					var currentstatus = $("#currentstatus<?php echo $i;?>").val();
					
					    	$.post("<?php echo site_url("allFormController/changeStatus") ?>",{rowid : rowid,tablename : tablename, currentstatus : currentstatus}, function(data){
						$("#changeStatus<?php echo $i;?>").html(data);
						});
					
					});
                      </script>
                  <td><a href="<?php echo base_url();?>index.php/employeeController/empfull_profile/<?php echo $row->id;?>"><i class="fa fa-user" style="font-size:28px; color:green;"></i></a>
                  <!-- <a href="<?php echo base_url();?>index.php/branch/delete_branch/<?php echo $row->username;?>"><i class="btn btn-danger">Delete</i></a> -->
                  
                  </td>
                </tr>
                <?php  $i++;
                endforeach;}?>
								</tbody>
							</table>
						</div>
					</div>
					<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
<div class="row">
            <div class="col-md-12 space20">
              <div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                  Export <i class="fa fa-angle-down"></i>
                </button>
                
                <ul class="dropdown-menu dropdown-light pull-right">
                <!--  <li>-->
                <!--    <a href="#" class="export-pdf" data-table="#delivery" >-->
                <!--      Save as PDF-->
                <!--    </a>-->
                <!--  </li>-->
                <!--  <li>-->
                <!--    <a href="#" class="export-png" data-table="#delivery">-->
                <!--      Save as PNG-->
                <!--    </a>-->
                <!--  </li>-->
                <!--  <li>-->
                <!--    <a href="#" class="export-csv" data-table="#delivery" >-->
                <!--      Save as CSV-->
                <!--    </a>-->
                <!--  </li>-->
                    <li>
                        <a href="#" class="export-excel" data-table="#sample-table-2" >
                          Export to Excel
                        </a>
                   </li>
                <!--  <li>-->
                <!--    <a href="#" class="export-doc" data-table="#delivery" >-->
                <!--    Export to Word-->
                <!--  </a>-->
                <!--  </li>-->
                 </ul>
                
              </div>
            </div>
          </div>
<br>
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
										 <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mobile Number</th>
                                    <th>Aadhar Number</th>
                                    <th>Branch Name</th>
                                    <th>Username</th>
                                   
                                    <th>Activity</th>
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
                  <td><?php echo $row->username;?></td>

                  <td><a href="<?php echo base_url();?>employeeController/empfull_profile/<?php echo $row->id;?>"><i class="fa fa-user" style="font-size:28px; color:green;"></i></a>
                  <!-- <a href="<?php echo base_url();?>index.php/branch/delete_branch/<?php echo $row->username;?>"><i class="btn btn-danger">Delete</i></a> -->

                  </td>
                  
                </tr>
                <?php  $i++;
                endforeach;}?>
								</tbody>
							</table>
						</div>
					
       	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
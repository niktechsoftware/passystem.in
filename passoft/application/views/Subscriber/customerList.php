                    	<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
										 <th>S.No.</th>
                                        <th>Subscriber Name</th>
                                        <th>Father Name</th>
                                        <th>Sub Branch</th>
                                        <th>email</th>
                                        <th>Username</th>
                                        <th>Tem/Per Active</th>
                                        <th>Action</th>
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
                                      <input type="hidden" name="rowid" value = "<?php echo $row->id;?>" id="rowid"/>
                                      <input type="hidden" name="table" value = "branch" id="tablename"/>
                                       <input type="hidden" name="currentstatus" value = "<?php echo $row->status?>" id="currentstatus"/>
                                      </td>
                                      <td><?php echo $row->father_name;?></td>
                                      <td><?php echo $row->sub_branchid;?></td>
                                      <td><?php echo $row->email;?></td>
                                      <td><?php echo $row->username;?></td>
                                      <td> <?php if($row->tstatus==1){
                                          ?><a href="<?php echo base_url();?>index.php/subscriberController/tactive/<?php echo $row->username;?>"> <div style="color:#46b92b;"><i class="btn btn-info"><?php echo "Temporary Active";?></i></div></a>
                                          <?php
                                        }elseif($row->pstatus==1) {?> <div style="color:red;"><i class="btn btn-success"><?php echo "Permanent Active";?></i></div><?php } ?></td>
                                      <td><a href="<?php echo base_url();?>index.php/subscriberController/subscriberfull_profile/<?php echo $row->username;?>"><i class="fa fa-user" style="color:green;font-size:24px;"></i></a>
                                      <!-- &nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/subscriberController/delete_branch/<?php echo $row->username;?>"><i class="fa fa-trash-o" style="color:red;font-size:24px;"></i></a> -->
                                      
                                      </td>
                                  
                                </tr>
                                    <?php  $i++;
                                    endforeach;}?>
							</tbody>
						</table>
					</div>
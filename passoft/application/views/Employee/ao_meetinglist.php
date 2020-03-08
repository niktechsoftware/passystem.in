
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Meeting List </span></h4>
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
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">All<input type="checkbox" name="select-all" id="select-all" /></th>
                                        <th width:"10px">Visitor Name</th> 
										<th width:"10px">Mobile No</th>
										<th width:"10px">Address</th>
                                        <th width:"10px">Date of Advising</th>
                                        <!--<th width:"10px">Type of Plan</th>-->
                                        <!--<th width:"10px">A/P</th>-->
                                         <!--<th width:"10px">Meeting Date</th>-->
                                        <!--<th width:"10px">Offer Pic</th>-->
                                        <!-- <th width:"10px">MSG</th>-->
                                        <!--<th width:"10px">Action</th>-->
                                        
									</tr>
							
<!-- select all boxes -->

									
								</thead>
                                <tbody>
                                    <?php //$this->db->where('ao',$username);
                                    $e= $this->db->get('entry_table');
                                   // print_r($e);
                                   $i=1;
                                    foreach($e->result() as $e_data){ ?>
                                        
                               
							
												<tr class="text-uppercase text-center">
												    <!--<td width:"10px"></td>-->
													<td width:"10px"><?php echo $i; ?></td>
													<td width:"10px">
													    <input type="checkbox" name="checkbox" id="checkbox<?php echo $i;?>" value="<?php echo $e_data->contact_no; ?>"/>
													    </td>
													<!--<td width:"10px"><?php // echo $e_data->ao; ?></td>-->
													<td width:"10px"><?php echo $e_data->visitor_name; ?></td>
													<td width:"10px"><?php echo $e_data->contact_no; ?></td>
													<td width:"10px"><?php echo $e_data->address; ?></td>
													<td width:"10px"><?php echo $e_data->created_date; ?></td>
													<!--<td width:"10px">-->
													    <?php //echo $e_data->selling_price; ?>
													<!--</td>-->
													<!--<td width:"10px"></td>-->
													<!--<td width:"10px">-->
													<!--    <input type="date" name="date"  class="form-control" style=" width:50px; text-transform:uppercase" required=""/>-->
													<!--</td>-->
													<!--<td width:"10px"></td>-->
													 
												
												</tr>
												<script>
											
												    
												    $('#select-all').click(function(event) {   
                                                    if(this.checked) {
                                                        // Iterate each checkbox
                                                        $(':checkbox').each(function() {
                                                            this.checked = true; 
                                                            // var row_id = $("checkbox<?php echo $i;?>").val();
                                                            // alert(row_id);
                                                        });
                                                    } else {
                                                        $(':checkbox').each(function() {
                                                            this.checked = false;                       
                                                        });
                                                    }
                                                });
												</script>
												  <?php  $i++; }
                                    ?>
												
                                </tbody>  
                                <tfoot>
                                     <td></td>
                                      <td></td>
                                       <td></td>
                                        <td></td>
                                   <td width:"10px"><textarea class="form-control" id="msgg" name="msgg"  onkeypress="return isalphabate(event)" required="" ></textarea></td>
                                   
                                   	<td width:"10px">
													    <input type="button" class="btn btn-danger" id="smsr" value="Send Sms" />
													    <!--<input type="button" class="btn btn-success" id="smsg" value="Sms Sent" />-->
													</td>
                                </tfoot>
                                <script>
                                    $("#smsr").click(function(){
                                        var msg = $("#msgg").val();
                                        var favorite = [];
                                        $.each($("input[name='checkbox']:checked"), function(){            
                                            favorite.push($(this).val());
                                        });
                                        //alert("My favourite sports are: " + favorite.join(", "));
                                        $.post("<?php echo site_url();?>employeeController/abcd",{favorite:favorite,msg:msg},function(data){ 
                                            alert(data);
                                        });
                                    });
                                </script>
                                
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>login/index">Back To Dashboard</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
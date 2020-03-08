
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Rank List </span></h4>
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
					<!--<div class="row">-->
					<!--	<div class="col-md-12 space20">-->
						    
							<!--<div class="btn-group pull-right">-->
							<!--	<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">-->
							<!--		Export <i class="fa fa-angle-down"></i>-->
							<!--	</button>-->
								
							<!--	<ul class="dropdown-menu dropdown-light pull-right">-->
							<!--		<li>-->
							<!--			<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
							<!--				Save as PDF-->
							<!--			</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#sample-table-2">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-csv" data-table="#sample-table-2" >-->
							<!--				Save as CSV-->
							<!--			</a>-->
							<!--		</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-txt" data-table="#sample-table-2" >-->
							<!--				Save as TXT-->
							<!--			</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									
									<!--	<a href="#" class="export-json" data-table="#sample-table-2" >-->
									<!--		Save as JSON-->
									<!--	</a>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-excel" data-table="#sample-table-2" >-->
							<!--				Export to Excel-->
							<!--			</a>-->
							<!--		</li>-->
							<!--		<li>-->
							<!--			<a href="#" class="export-doc" data-table="#sample-table-2" >-->
							<!--			Export to Word-->
							<!--		</a>-->
							<!--		</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								
							<!--</div>-->
					<!--	</div>-->
					<!--</div>-->
					<?php $uri = $this->uri->segment(3);
					if($uri == 1)
					{
					    echo '<p style="color:red;">employee already ranked.</p>';
					}
					elseif($uri == 2)
					{
					    echo '<p style="color:green;">Rank submitted successfully.</p>';
					}
					elseif($uri == 3)
					{
					    echo '<p style="color:red;">Rank not submitted.</p>';
					}
					elseif($uri == 4)
					{
					    echo '<p style="color:red;">employee username does not valid.</p>';
					}
					?>
					<form method="post" action="<?php echo base_url();?>adminController/add_rank">
					<div class="row form-group">
					    <div class="col-md-6">
					        <div class="row">
					            <div class="col-md-4">
					                <label>Employee UserID</label>
					            </div>
					             <div class="col-md-8">
					                 <input class="form-control" type="text" name="empid" id="empid" required placeholder="Enter Employee UserID"/>
					            </div>
					        </div>
					        
					       
					    </div>
					    <div class="col-md-6">
					        <div class="row">
					            <div class="col-md-4">
					                   <label>Select Rank</label>
					            </div>
					             <div class="col-md-8">
					                    <select class="form-control" name="rank">
            					            <?php for($i=1; $i<=20; $i++) { ?>
            					            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            					            <?php } ?>
					                    </select>
					            </div>
					        </div>
					    </div>
					    <center><input type="submit" value="submit" id="sub" class="btn btn-success" style="margin-top:15px; margin-bottom:15px;"/></center>
					</div>
					</form>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Employee username</th>
                                        <th width:"10px">Rank</th> 
										<th width:"10px">Action</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php $rank = $this->db->get('rank_emp')->result();
                                    $i=1;
                                    foreach($rank as $ddt)
                                    { ?>
                                    <tr>
    							        <td><?php echo $i;?></td>
    							        <td><input type="text" id="userid<?php echo $i;?>" readonly value="<?php echo $ddt->username;?>"></td>
    							        <td><?php echo $ddt->rank;?></td>
    							        <td><input type="button" id="bt<?php echo $i;?>" class="btn btn-danger" value="delete"/></td>
							        </tr>
                                    
                                        
                                         <script>
                                        //  alert('1');
                                            $("#bt<?php echo $i;?>").click(function(){
                                                // alert('2');
                                                var username = $("#userid<?php echo $i;?>").val();
                                                // var rank = <?php //echo $i;?>;
                                                //   alert(rank);
                                                // alert(username);
                                                    $.post("<?php echo site_url('adminController/rank_dlt') ?>", {username : username}, function(data){
                                                    alert(data);
                                                     redirect('adminController/rank_employee');
                                                    
                                                });
                                              
                                            });
                                        </script>
                                        <?php $i++; ?>
                                <?php    }
                                    ?>
                                    
                                </tbody>   
							</table>
						</div>
					
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
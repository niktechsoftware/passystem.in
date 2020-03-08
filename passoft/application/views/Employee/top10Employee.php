 
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Top Ten Selection Panel</span></h4>
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
<h4 class="media-heading text-center">Welcome to Registered Active List </h4>
<p>Now you can give a rank of Employee according to work concern row.<br>
</p> </div>
				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>-->
									<!--	<a href="#" class="export-pdf" data-table="#emptable" >-->
									<!--		Save as PDF-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#sample-table-2">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-csv" data-table="#sample-table-2" >-->
									<!--		Save as CSV-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-txt" data-table="#emptable" >-->
									<!--		Save as TXT-->
									<!--	</a>-->
									<!--</li>-->
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
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#emptable" >-->
									<!--	Export to Word-->
									<!--</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
				
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
            <thead>
                <tr >
                    <th>SN.</th>
                    <th>Employee Name</th>
                    <th>Username</th>
                    <th>Slider Rank</th>
                    <th>Discription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              
                <?php 
                    $a = 1;
                    foreach($d as $data)
                    {
                        ?>
                        <tr>
                            <td><?php echo $a;?></td>
                            <td><?php echo $data->name;?></td>
                            <td id="user<?php echo $a;?>"><?php echo $data->username;?></td>
                            <td>
                                <?php $this->db->where("emp_username",$data->username);
                               $ranks =  $this->db->get("emp_feedback");
                               ?> <select id="rank<?php echo $a;?>"  required="required"> <?php
                               if($ranks->num_rows()>0){
                              ?>
                                
                                    <option value="0" <?php if($ranks->row()->rank=="0") echo 'selected="selected"'; ?>>--select--</option>
                                    <option value="1" <?php if($ranks->row()->rank=="1") echo 'selected="selected"'; ?>>1</option>
                                    <option value="2" <?php if($ranks->row()->rank=="2") echo 'selected="selected"'; ?>>2</option>
                                    <option value="3" <?php if($ranks->row()->rank=="3") echo 'selected="selected"'; ?>>3</option>
                                    <option value="4" <?php if($ranks->row()->rank=="4") echo 'selected="selected"'; ?>>4</option>
                                    <option value="5" <?php if($ranks->row()->rank=="5") echo 'selected="selected"'; ?>>5</option>
                                    <option value="6" <?php if($ranks->row()->rank=="6") echo 'selected="selected"'; ?>>6</option>
                                    <option value="7" <?php if($ranks->row()->rank=="7") echo 'selected="selected"'; ?>>7</option>
                                    <option value="8" <?php if($ranks->row()->rank=="8") echo 'selected="selected"'; ?>>8</option>
                                    <option value="9" <?php if($ranks->row()->rank=="9") echo 'selected="selected"'; ?>>9</option>
                                    <option value="10" <?php if($ranks->row()->rank=="10") echo 'selected="selected"'; ?>>10</option>
                                
                                <?php }else{
                                    ?>
                                     
                                    <option value="0" >--select--</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4">4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                             <?php    }?>
                            
                             
                            </td>
                            <td><textarea id="desc<?php echo $a;?>"><?php   if($ranks->num_rows()>0){ echo $ranks->row()->description;}?></textarea></td>
                            <td><?php if($ranks->num_rows()>0){ ?>
                            <!--<button id="change<?php echo $a;?>" class="btn btn-info">SUBMIT</button><div id="rankdet<?php echo $a;?>"></div>-->
                          <a href="<?php echo base_url();?>index.php/employeeController/deleteEmp/<?php echo $ranks->row()->id;?>"><i class="btn btn-danger">Delete</i></a>
                           <?php } else{ ?>
                            <button id="change<?php echo $a;?>" class="btn btn-primary">SUBMIT</button><div id="rankdet<?php echo $a;?>"></div>
                          <!--<a href="<?php echo base_url();?>index.php/employeeController/deleteEmp/<?php echo $ranks->row()->id;?>"><i class="btn btn-danger">Delete</i></a>-->
                           
                           <?php } ?></td>
                        </tr>
                        <script>
                        //alert
                            $('#change<?php echo $a;?>').click(function(){
                                var desc=$('#desc<?php echo $a;?>').val();
                                 var rankkhalla = $('#rank<?php echo $a;?>').val();
                                var rank = $('#rank<?php echo $a;?>').val();
                                 var user = $('#user<?php echo $a;?>').html();
                               // alert(user);
                                if(rankkhalla.length>0){
                               
                                $.post("<?php echo site_url("employeeController/changeRank") ?>",{ rank : rank , user : user , desc : desc },function(data){
                                    $("#rankdet<?php echo $a;?>").html(data);
                               
                                });
                            
                            }else{
                                alert("Please Select Rank First");
                            }
                            });
                            // $('#edit<?php echo $a;?>').click(function(){
                            //       var edit=$('#edit<?php echo $a;?>').val();
                            //     // var rankkhalla = $('#rank<?php echo $a;?>').val();
                            //     //var rank = $('#rank<?php echo $a;?>').val();
                            //     // var user = $('#user<?php echo $a;?>').html();
                            //     alert(edit);
                            //     if(rankkhalla.length>0){
                               
                            //     $.post("<?php echo site_url("employeeController/changeRank") ?>",{edit:edit},function(data){
                            //         $("#rankdet<?php echo $a;?>").html(data);
                               
                            //     });
                            
                            // });
                        </script>
                        <?php
                        $a++;
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
          
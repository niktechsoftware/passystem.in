
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Matching Day Book </span></h4>
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
					<div class="row">
						<div class="col-md-12 space20">
						    <form method="post" action="<?php echo base_url();?>adminController/matching_daybookdata">
						    <div class="col-md-4">
						        <lebel>From :</lebel>
						        <input type="date" name="d1"/>
						    </div>
						    <div class="col-md-4">
						        <lebel>To :</lebel>
						        <input type="date" name="d2"/>
						    </div>
						    <div class="col-md-4">
						        <!--<lebel>To :</lebel>-->
						        <input type="submit" name="submit" class="btn btn-info"/>
						    </div>
						    </form>
						 </div>
					</div>
				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th width:"10px">SNO</th>
                                        <th width:"10px">Order No</th>
                                        <th width:"10px">Amount</th>
                                        <th width:"10px">OrderDate</th>
                                        <th width:"10px">To</th>
                                        <th width:"10px">From</th>
										<th width:"10px">Address</th>
										<th width:"10px">Amount</th>
                                        <th width:"10px">Total Amount</th>
                                        <th width:"10px">Payment Mode</th>
                                        <th width:"10px">Paid Amount</th>
                                        <th width:"10px">Payment Date</th>
                                        <th width:"10px">Transaction ID</th>
                                        <th width:"10px">Net Balance Amount</th>
                                        <th width:"10px">Matching Status</th>
                                        <!-- <th width:"10px">MSG</th>-->
                                        <!--<th width:"10px">Action</th>-->
                                        
									</tr>
							
<!-- select all boxes -->

									
								</thead>
                                <tbody>
                                    <?php  
                                     $senderusername= $this->session->userdata("username");
                                     $this->db->where('sender_username',$senderusername);
                                     $e=$this->db->get('assignproduct'); 
                                     $i=1;
                                     foreach($e->result() as $e_data){ ?>
							
												<tr class="text-uppercase text-center">
												    <td width:"10px"><?php echo $i; ?></td>
													<td width:"10px"><a href="<?php echo base_url();?>stockController/productinvoice/<?php echo $e_data->invoice_no; ?>"><?php echo $e_data->invoice_no; ?></a></td>
    												<?php $this->db->where('invoice_number',$e_data->invoice_no);
    												$pt_data = $this->db->get('product_trans_detail'); ?>
    											
    												<?php $tt=0; 
    												foreach($pt_data->result() as $pt)
    												{
    												    $this->db->where('id',$pt->p_code);
    												    $pro= $this->db->get('stock_products');
    												    if($pro->num_rows()>0)
    												    {
    												        $t = $pro->row()->selling_price * $pt->quantity;
    												        $tt= $tt + $t;
    												    }
    												}
    												?>
    												<td width:"10px"><?php echo $tt;?></td>
    												<td width:"10px"><?php echo $pt_data->row()->date;?></td>
    												<td width:"10px"><?php echo $a= $pt_data->row()->reciver_usernm;?></td>
    												<td width:"10px"><?php echo $pt_data->row()->sender_usernm;?></td>
    												<?php $this->db->where('username',$pt_data->row()->reciver_usernm);
    												      $chk = $this->db->get('branch');
    												      if($chk->num_rows()>0)
    												      {
    												          $ad= $chk->row()->address;
    												          if(strlen($ad)>0)
    												          { ?>
    												          <td width:"10px">   <?php echo $ad; ?> </td>
    												    <?php }
    												          else
    												          { ?>
    												            <td width:"10px">  <?php echo "N/A"; ?></td>
    												    <?php }
    												      }
    												      else
    												      {
    												          $this->db->where('username',$pt_data->row()->reciver_usernm);
    												          $chk = $this->db->get('sub_branch');
    												          if($chk->num_rows()>0)
        												      {
        												          $ad= $chk->row()->address;
        												          if(strlen($ad)>0)
        												          { ?>
    												               <td width:"10px"> <?php echo $ad; ?></td>
    												        <?php }
        												          else
        												          { ?>
    												               <td width:"10px"> <?php echo "N/A"; ?></td>
    												        <?php }
        												      }
    												      }
    												      
    												    //   $this->db->where('username',$pt_data->row()->reciver_usernm);
    												    //   $chk = $this->db->get('branch');
    												// if($this->session->userdata("login_type")==1)
    												// {}
    												// elseif($this->session->userdata("login_type")==1)
    												// {}
    												// elseif($this->session->userdata("login_type")==1)
    												// {}
    												
    												
    												?>
    												<td width:"10px"><input style="width:70px;" type="text" name="amt<?php echo $i;?>" id= "amt<?php echo $i;?>"/></td>
    												<td width:"10px"><input style="width:70px;" type="text" name="ttamt<?php echo $i;?>" id= "ttamt<?php echo $i;?>" readonly/></td>
    												<td width:"10px"></td>
    												<td width:"10px"><input style="width:70px;" type="text" name="amt<?php echo $i;?>" id= "amt<?php echo $i;?>"/></td>
    												<td width:"10px"></td>
    												<td width:"10px"><input style="width:70px;" type="text" name="trans<?php echo $i;?>"/></td>
    												<td width:"10px"><input style="width:70px;" type="text" name="netamt<?php echo $i;?>" id= "netamt<?php echo $i;?>"/></td>
    												<td width:"10px"></td>
    												<!--<td width:"10px"></td>-->
												</tr>
											<?php	$i++; } ?>
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
												  <?php // $i++; }
                                    ?>
												
                                </tbody>  
                                
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
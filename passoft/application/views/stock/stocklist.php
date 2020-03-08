
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- start: EXPORT DATA TABLE PANEL  -->
            <div class="panel panel-white">
                <div class="panel-heading panel-red">
                    <h4 class="panel-title"> <span class="text-bold">Stock Product List</span></h4>
                    <div class="panel-tools">
                        <div class="dropdown">
                            <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                                <li>
                                    <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i>
                                        <span>Collapse</span> </a>
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
                        <h4 class="media-heading text-center">Welcome to Stock Product List </h4>
                        <p>Here You Can See All Of Your Stock Items  .<br>
                        </p>
                    </div>

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
                                        <th style="width:30px;">Product Name</th>
                                        <th style="width:30px;">Company Name</th>
                                        <th style="width:30px;">Product Type</th>
                                        <th style="width:20px;">Size</th>
                                            <th style="width:20px;">P Code</th>
                                        <th style="width:20px;">Price</th>
                                        <th style="width:20px;">MRP Price</th>
                                        <th style="width:8px;">Qty</th>
                                        <th style="width:30px;">Image1</th>
                                       <!-- <th style="width:30px;">Image2</th>-->
                                         <?php if($this->session->userdata("login_type")==1) { ?>
                                         <th style="width:100px;">Action</th>
                                       <?php   } ?>
                                        <!-- <th  style="width:20px;">Product Status</th> -->
                                        <!--<th style="width:100px;">Activity</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
								
                
                    $i=1;
                    if($product_id->num_rows()>0)
                    {
                    
                  foreach($product_id->result() as $row1):
                     
                      if($this->session->userdata('login_type')==1){
                             $this->db->where("id",$row1->id);
                 	$row2= $this->db->get("stock_products");
                      }else{
                             $this->db->where("id",$row1->p_code);
                 	$row2= $this->db->get("stock_products");
                      }
               
                 	if($row2->num_rows()>0){
                 		$row=$row2->row();
                  ?>
                                    <tr class="text-uppercase text-center">
                                        <td style="width:10px;"><?php echo $i;?></td>
                                        
                                                <td style="width:30px;">
                                                <a href="<?php echo base_url();?>stockController/editstockitem/<?php echo $row->id;?>">
                                                <?php echo $row->name;?>
                                            <input type="hidden" name="rowid" value="<?php echo $row->id; ?>" id="rowid<?php echo $i;?>" />
                                            <input type="hidden" name="currentstatus" value="<?php echo $row->status?>"
                                                id="currentstatus<?php echo $i; ?>" /></a>
                                        </td>
                                        <td style="width:30px;"><?php echo $row->company;?></td>
                                        <td style="width:30px;"><?php echo $row->p_type;?></td>
                                        <td style="width:20px;"><?php echo $row->size;?></td>
                                         <td style="width:20px;"><?php echo $row->hsn;?></td>
                                        <td style="width:20px;"><?php echo $row->selling_price;?></td>
                                            <td style="width:20px;"><?php echo $row->mrp_price;?></td>
                                        <td style="width:8px;"><?php 
                                        if($this->session->userdata('login_type')==1){
                                        echo $row1->quantity;
                                        } elseif($this->session->userdata('login_type')==2){
                                             echo $row1->rec_quantity-$row1->sale_quantity;
                                        } elseif($this->session->userdata('login_type')==4){
                                             echo $row1->rec_quantity-$row1->sale_quantity;
                                        }?></td>
                                        <td><a href="<?php echo base_url();?>stockController/editstockitem/<?php echo $row->id;?>">
                                            <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1; ?>"
                                                style="height:50px;width:50px;" class="zoom1"></a></td>
                                       <!-- <td><a href="<?php echo base_url();?>stockController/editstockitem/<?php echo $row->id;?>">
                                            <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file2; ?>"
                                                style="height:50px;width:50px;" class="zoom1"></a></td>-->
                                        <?php if($this->session->userdata("login_type")==1) { ?>
                                        <td><button id="delete<?php echo $i; ?>" class="btn btn-warning"><i class="fa fa-trash-o" style="font-size:18px; color:red;"></i></button></td>
                                    <?php   } ?>
                                        <!-- <td ><button id="active<?php //echo $i; ?>"
                                                class="btn btn-warning"><?php //if($row->status){echo "Active"; } else{echo "Inactive";}?></button>
                                        </td> -->
                                         <!--<td style="width:100px;">-->
                                        <!--<a
                                                href="<?php echo base_url();?>stockController/editstockitem/<?php //echo $row->id;?>"><i
                                                    class="fa fa-eye" style="font-size:28px; color:green;"></i></a> -->
                                            <!--<button id="delete<?php // echo $i; ?>" class="btn btn-warning"><i class="fa fa-trash-o" style="font-size:28px; color:red;"></i></button>-->
                                        <!--</td>-->

                                    </tr>
                                  
                                    <script>
                                    $(document).ready(function() {

                                        $("#active<?php echo $i; ?>").click(function() {
                                            var rowid = $("#rowid<?php echo $i; ?>").val();
                                            var currentstatus = $("#currentstatus<?php echo $i;?>")
                                            .val();

                                            $.post("<?php echo site_url("stockController/activestockitem/") ?>", {
                                                rowid: rowid,
                                                currentstatus: currentstatus
                                            }, function(data) {

                                                $("#active<?php echo $i; ?>").html(data);
                                                if (currentstatus == 1) {
                                                    $("#currentstatus<?php echo $i; ?>").val(
                                                        "0");

                                                } else {
                                                    $("#currentstatus<?php echo $i; ?>").val(
                                                        "1");

                                                }
                                            });

                                        });

                                        $("#delete<?php echo $i; ?>").click(function() {

                                            var rowid = $("#rowid<?php echo $i; ?>").val();

                                            $.post("<?php echo site_url("stockController/deletestockitem/") ?>",{ rowid: rowid }, function(data) {
                                                alert(data);
                                                //$("#delete<?php echo $i; ?>").html(data);

                                            });
                                        });
                                    });
                                    </script>
                                    <?php  $i++;
                 	} endforeach; }?>
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

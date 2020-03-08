<div class="page-body">
  
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Transfer Product List</span></h4>
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
				<?php $id=$this->uri->segment(3);
				if($id==3){
				
				?>
				<div class="panel-body">
				    			<div class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
<h4 class="media-heading text-center">Welcome to Transfer Product List </h4>
<p>Here you can see Tarnsfer Product List .<br>
</p> </div>
				  <center>  <h3>Total Transfer Product List</h3></center>
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>-->
									<!--	<a href="#" class="export-pdf" data-table="#stocklist" >-->
									<!--		Save as PDF-->
									<!--	</a>-->
									<!--</li>-->
									<!-- <li>
										<a href="#" class="export-png" data-table="#sample-table-2">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#sample-table-2" >
											Save as CSV
										</a>
									</li> -->
									<!--<li>-->
									<!--	<a href="#" class="export-txt" data-table="#stocklist" >-->
									<!--		Save as TXT-->
									<!--	</a>-->
									<!--</li>-->
									<!-- <li>
										<a href="#" class="export-xml" data-table="#sample-table-2" >
											Save as XML
										</a>
									</li> -->
									<!-- <li>
										<a href="#" class="export-sql" data-table="#sample-table-2" >
										Save as SQL
										</a>
									
									
										<a href="#" class="export-json" data-table="#sample-table-2" >
											Save as JSON
										</a> -->
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#stocklist" >-->
									<!--	Export to Word-->
									<!--</a>-->
									<!--</li>-->
									<!-- <li>
										<a href="#" class="export-powerpoint" data-table="#sample-table-2">
											Export to PowerPoint
										</a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
  
  

    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">-->
    <!--</script>-->
     <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <table id="sample-table-2" class="table table-striped table-bordered nowrap">
      <thead>
        <tr style="background-color:#1ba593; color:white;">
          <th style="width:8px;">Sno</th>

          <th style="width:20px;">Product Name</th>
              <th style="width:20px;">Product Code</th>
             <th style="width:40px;">Size</th>
          <th style="width:20px;">Image </th>
          <th style="width:30px;">Quantity</th>
           <th style="width:30px;">Sender Username</th>
             <th style="width:30px;">Invoice Number</th>
              <th style="width:30px;">Date</th>
            <th style="width:30px;">Recieve</th>
            <!--<th style="width:30px;">Recieve</th>-->
        </tr>
      </thead>
      <tbody style="margin-top:2px;">
        <?php 
                //   
                $dt=date('Y-m-d');
             
                 $senderusername= $this->session->userdata("username");
               	
                  $this->db->where('sender_usernm',$senderusername);
                //   $this->db->where('DATE(date)',$dt); 
                  $brwproduct=$this->db->get('product_trans_detail')->result(); 
                //   print_r($brwproduct);
                //   exit();
                    $i=1;foreach ($brwproduct as  $value):
                $this->db->where('id',$value->p_code);
                  $sproduct1=$this->db->get('stock_products'); 
                  if($sproduct1->num_rows()>0){
                     $sproduct= $sproduct1->row();
                  
                  ?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>
          <td style="width:20px;"><?php if($sproduct->name){ echo $sproduct->name;}else{ echo "N/A";}?> </td>
          <td style="width:2px;"><?php if($sproduct->hsn) {echo $sproduct->hsn;}else{ "N/A" ;}?> </td>
           <td style="width:40px;color:black;"><?php if($sproduct->size) {echo $sproduct->size;} else{ "N/A"; }?> </td>
                  <td style="width:30px;color:black;"><?php if($sproduct->file1){ ?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $sproduct->file1; ?>"
                                                style="height:50px;width:30px;"class="zoom1" ><?php } else{ echo "N/A"; }?> </td>
          <td><?php if($value->quantity){ echo $value->quantity;}else{ echo "N/A";}?> </td>
                    <td><?php if($value->reciver_usernm) {echo $value->reciver_usernm;} else{ echo "N/A";}?> </td>
                     <td><?php if($value->invoice_number){ echo $value->invoice_number;} else{ echo "N/A"; }?> </td>
                      <td><?php echo date("d-m-y",strtotime($value->date));;?> </td>
              <td><?php if($value->status==0){ ?><a href="#" class="btn btn-danger"> Not Recieve </a><?php } else{?>  <a herf="" class="btn btn-success"> Recieved</a><?php }?></td>
       
        </tr>
        <?php  } $i++;endforeach;?>
      </tbody>
    </table>
    
  	
					</div>
					<?php } elseif($id==5){?>
								<div class="panel-body">
				    			<div class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
<h4 class="media-heading text-center">Welcome to Transfer Produc List </h4>
<p>Here you can see Tarnsfer Product List.<br>
</p> </div>
				   <center> <h3>Today Transfer Product List</h3></center>
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
							
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>-->
									<!--	<a href="#" class="export-pdf" data-table="#sample-table-2" >-->
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
									<!--	<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as TXT-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as SQL-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Save as JSON-->
									<!--	</a>-->
									<!--</li>-->
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Export to Word-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							
							</div>
						</div>
					</div>
  
  
  

    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">-->
    <!--</script>-->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <table id="sample-table-2" class="table table-striped table-bordered nowrap">
      <thead>
        <tr style="background-color:#1ba593; color:white;">
          <th style="width:8px;">Sno</th>

          <th style="width:20px;">Product Name</th>
              <th style="width:20px;">Product Code</th>
             <th style="width:40px;">Size</th>
          <th style="width:20px;">Image </th>
          <th style="width:30px;">Quantity</th>
           <th style="width:30px;">Sender Username</th>
             <th style="width:30px;">Invoice Number</th>
              <th style="width:30px;">Date</th>
            <th style="width:30px;">Recieve</th>
            <!--<th style="width:30px;">Recieve</th>-->
        </tr>
      </thead>
      <tbody style="margin-top:2px;">
        <?php 
                //   
                $dt=date('Y-m-d');
             
                 $senderusername= $this->session->userdata("username");
               	
                  $this->db->where('sender_usernm',$senderusername);
                   $this->db->where('Date(date)',$dt); 
                  $brwproduct=$this->db->get('product_trans_detail')->result(); 
                //   print_r($brwproduct);
                //   exit();
                    $i=1;foreach ($brwproduct as  $value):
                $this->db->where('id',$value->p_code);
                  $sproduct=$this->db->get('stock_products')->row(); 
                  ?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>
          <td style="width:20px;"><?php echo $sproduct->name;?> </td>
          <td style="width:2px;"><?php echo $sproduct->hsn;?> </td>
           <td style="width:40px;color:black;"><?php echo $sproduct->size?> </td>
                  <td style="width:30px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $sproduct->file1; ?>"
                                                style="height:50px;width:30px;"class="zoom1" > </td>
          <td><?php echo $value->quantity;?> </td>
                    <td><?php echo $value->reciver_usernm;?> </td>
                     <td><?php echo $value->invoice_number;?> </td>
                      <td><?php echo date("d-m-y",strtotime($value->date));?> </td>
              <td><?php if($value->status==0){ ?><a href="#" class="btn btn-danger"> Not Recieve </a><?php } else{?>  <a herf="" class="btn btn-success"> Recieved</a><?php }?></td>
       
        </tr>
        <?php $i++;endforeach;?>
      </tbody>
    </table>
    
  	
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
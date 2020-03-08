
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">My Favourite List </span></h4>
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
<h4 class="media-heading text-center">Welcome to My Favourite List Area </h4>
<p>In This Section You can create own Favourite Product List.Which Product you like then click on green thumb infornt of product
                image and then click on done button to show your favourite product list.You want product which is not present in list then you add product Detail in a OTHER PRODUCT LIST table.<br>
</p> </div>
				    
					<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<li>-->
										<a href="#" class="export-pdf" data-table="#sample-table-2" >
											Save as PDF
										</a>
									</li>
									<li>
										<a href="#" class="export-png" data-table="#sample-table-2">
											Save as PNG
										</a>
									</li>
									<li>
										<a href="#" class="export-csv" data-table="#sample-table-2" >
											Save as CSV
										</a>
									</li>
									<li>
										<a href="#" class="export-txt" data-table="#sample-table-2" >
											Save as TXT
										</a>
									</li>
									<li>
										<a href="#" class="export-xml" data-table="#sample-table-2" >
											Save as XML
										</a>
									</li>
									<li>
										<a href="#" class="export-sql" data-table="#sample-table-2" >
										Save as SQL
										</a>
									
									
										<a href="#" class="export-json" data-table="#sample-table-2" >
											Save as JSON
										</a>
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<li>
										<a href="#" class="export-doc" data-table="#sample-table-2" >
										Export to Word
									</a>
									</li>
									<li>
										<a href="#" class="export-powerpoint" data-table="#sample-table-2">
											Export to PowerPoint
										</a>
									</li>
								
							</div>
						</div>
					</div>
					<?php $dt1=date("Y-m-d",strtotime($dt1));?>
             <?php $dt2=date("Y-m-d",strtotime($dt2)); ?>
      	 <div><strong>
        <center> <h2 style='color: green'> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2></center></strong>
        </div>
				
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th>S.No</th>
                                        <th>Paid To</th>
                                        <th>Paid By Name</th>
                                        <th>Paid By Username</th>
                                        <th>Reason</th>
                                        <?php if($condition=="Both"){?>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <?php }?>
                                        <?php if($condition=="Debit"){?>
                                        <th>Debit</th>
                                        <?php }?>
                                        <?php if($condition=="Credit"){?>
                                        <th>Credit</th>
                                        <?php }?>
                                        <th>Closing Balance</th>
                                        <th>Pay Date</th>
                                        <th>Pay Mode</th>
                                        <th>Invoice Num</th>
									</tr>
								</thead>
                                <tbody>
							 <?php  if($select=="Allbranch"){?>
                <?php if($condition=="Both"){

                  $this->db->where_not_in('paid_by','admin');
                	$this->db->where('pay_date >=',$dt1);
                	$this->db->where('pay_date <=',$dt2);
                    $both=$this->db->get('day_book');
                	 if($both->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($both->result() as  $data):

                	 	?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                      	  $this->db->where('username',$data->paid_by);
                      	  $cust=$this->db->get('customers');
                      	  if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ }?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>

<td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td>
<td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td>
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                   <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; } 
                ?>
            <?php  } ?>

<!--end both -->
<!--start debit -->
          <?php 
         if(($condition==1)||($condition==0)){

                   if($condition=='Debit'){

                  $this->db->where_not_in('paid_by','admin');
                   $this->db->where('dabit_cradit',0);
                   $this->db->where('pay_date >=',$dt1);
                	$this->db->where('pay_date <=',$dt2);
                    $dabit1=$this->db->get('day_book');
                	 if($dabit1->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($dabit1->result() as  $data):

                	 	?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                      	  $this->db->where('username',$data->paid_by);
                      	  $cust=$this->db->get('customers');
                      	  if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ }?>
                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>
<td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td>
<!-- <td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td> -->
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                    <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; } ?>
                <?php } } ?>

<!--end debit -->
<!--start credit -->
                <?php 
            if($condition=='Credit'){

                  $this->db->where_not_in('paid_by','admin');
                   $this->db->where('dabit_cradit',1);
                   $this->db->where('pay_date >=',$dt1);
                	$this->db->where('pay_date <=',$dt2);
                    $cradit1=$this->db->get('day_book');
                	 if($cradit1->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($cradit1->result() as  $data):

                	 	?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                      	  $this->db->where('username',$data->paid_by);
                      	  $cust=$this->db->get('customers');
                      	  if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{}?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>

<!-- <td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td> -->
<td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td>
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                  <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; } ?>

                 <?php  } ?>

              <?php  } ?>

           <?php  if($select=="Onebranch"){?>
                    <?php 

                          $this->db->where('district',$branchid);
                          $Customer=$this->db->get('customers');
                          if($Customer->num_rows()>0){
                              
                              $cust= $Customer->result(); ?>

                <?php if($condition=="Both"){
                           
                 foreach ($cust as $value):

                   $this->db->where('paid_by',$value->username);
                  $this->db->where_not_in('paid_by','admin');
                  $this->db->where('pay_date >=',$dt1);
                  $this->db->where('pay_date <=',$dt2);
                    $both=$this->db->get('day_book');
                   if($both->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($both->result() as  $data):

                    ?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                          $this->db->where('username',$data->paid_by);
                          $cust=$this->db->get('customers');
                          if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ }?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>

<td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td>
<td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td>
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                    <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; }?>

<?php  endforeach;} }  
                ?>

               
<?php ?>
<!--end both -->
<!--start debit -->
<?php 
if(($condition==1)||($condition==0)){

                          $this->db->where('district',$branchid);
                          $Customer=$this->db->get('customers');
                          if($Customer->num_rows()>0){
                              
                              $cust= $Customer->result(); 


                   if($condition=='Debit'){

                   foreach ($cust as $value):

                    $this->db->where('paid_by',$value->username); 
                  $this->db->where_not_in('paid_by','admin');
                   $this->db->where('dabit_cradit',0);
                   $this->db->where('pay_date >=',$dt1);
                  $this->db->where('pay_date <=',$dt2);
                    $dabit1=$this->db->get('day_book');
                   if($dabit1->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($dabit1->result() as  $data):

                    ?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                          $this->db->where('username',$data->paid_by);
                          $cust=$this->db->get('customers');
                          if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ }?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>

<td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td>
<!-- <td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td> -->
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                  <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; }
                ?>

              
<?php  endforeach; } } ?>

<!--end debit -->
<!--start credit -->
<?php 

                    $this->db->where('district',$branchid);
                    $Customer=$this->db->get('customers');
                    if($Customer->num_rows()>0){
                              
                  $cust= $Customer->result(); 
                   if($condition=='Credit'){
                    foreach ($cust as $value):

                    $this->db->where('paid_by',$value->username); 
                  $this->db->where_not_in('paid_by','admin');
                   $this->db->where('dabit_cradit',1);
                   $this->db->where('pay_date >=',$dt1);
                  $this->db->where('pay_date <=',$dt2);
                    $cradit1=$this->db->get('day_book');
                   if($cradit1->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($cradit1->result() as  $data):

                    ?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                          $this->db->where('username',$data->paid_by);
                          $cust=$this->db->get('customers');
                          if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ }?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <?php $dr_cr=$data->dabit_cradit; ?>

<!-- <td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td> -->
<td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td>
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>
                    <?php $this->db->where('invoice_no',$data->invoice_no);
                          $invoice=$this->db->get('order_serial');
                          if($invoice->num_rows()>0){
                             $invoice1=$invoice->row();?>
                     <td><?php if($invoice1->status==1){?><a href="<?php echo base_url();?>wallet/invoice/<?php echo $invoice1->order_no?>"class="btn btn-primary"><?php echo $invoice1->invoice_no;?></a><?php }else{?><a href="#" class="btn btn-danger"><?php echo $invoice1->invoice_no;?></a><?php }?></td>
                    <?php  } ?>
                </tr>
                <?php $i++; endforeach; }  
                ?>

               

<?php endforeach; } } ?>

<?php } } ?>
              </tbody>
              <tfoot>
<tr>
<td>----</td>
<td>----------</td>
<td align="right"><strong>Total</strong></td>
<td>----------</td>
<td>----------</td>
<?php if($condition=="Both"){?>
<td><?php echo $dabit; ?></td>
<td><?php echo $cradit; ?></td>
<?php }?>
<?php if($condition=="Debit"){?>
<td><?php echo $dabit; ?></td>
<?php }?>
<?php if($condition=="Credit"){?>
<td><?php echo $cradit; ?></td>
<?php }?>

<td>----------</td>
<td>----------</td>
<td>----------</td>
</tr>
</tfoot>   
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>adminController/daybook">Goto Back</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
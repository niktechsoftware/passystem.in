
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Total Collection</span></h4>
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
										<a href="#" class="export-pdf" data-table="#sample-table-2" >
											Save as PDF
										</a>
									</li>
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
									<li>
										<a href="#" class="export-txt" data-table="#sample-table-2" >
											Save as TXT
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#sample-table-2" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#sample-table-2" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									
									
										<!--<a href="#" class="export-json" data-table="#sample-table-2" >-->
										<!--	Save as JSON-->
										<!--</a>-->
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
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#sample-table-2">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                        <th>#</th>
                                        <th>Paid to</th>
                                        <th>Paid By</th>
                                        <th>Debit / Credit</th>
                                        <th>Amount</th>
                                        <th>Closing Balance</th>
                                        <th>Invoice Number</th>
                                        <th>Payment Mode</th>
                                        <th>Date</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php $i=1; $t=0;
                                    $date=date("y-m-d");
                                    //$this->db->select_sum('amount');
                                    $id= $this->session->userdata('username');
                                    // $this->db->where('pay_date',$date);
                                    $this->db->where('paid_to',$id);
                                    $val=$this->db->get('day_book')->result();
                                    
                                    foreach($val as $row){ ?>                
									<tr class="text-uppercase text-center">
                                      <td class="text-uppercase"><?php echo $i;?></td>
                                      <td class="text-uppercase"><?php echo $row->paid_to;?></td>
                                      <td class="text-uppercase"><?php echo $row->paid_by;?></td>
                                      <?php if(($row->dabit_cradit)==0){?><td class="text-uppercase" style="color:red;"><?php echo "Debit" ;?></td>
                                      <?php } else{?> <td  class="text-uppercase"style="color:green;"><?php echo "Credit";?></td> <?php }?>
                    
                                      <td class="text-uppercase"><?php  echo $row->amount;?></td>
                                      <td class="text-uppercase"><?php  echo $row->closing_balance;?></td>
                                       <td class="text-uppercase"><?php  echo $row->invoice_no;?></td>
                                      <td class="text-uppercase"><?php  echo $row->pay_mode;?></td>
                                      <td class="text-uppercase"><?php  echo $row->pay_date;?></td>
                                    </tr><?php $i++;?>
                                    <?php
                                    }
                                   
                                       ?>
                                </tbody>   
							</table>
						</div>
						<a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>subscriberController/my_phlist">Goto Next Step</a>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
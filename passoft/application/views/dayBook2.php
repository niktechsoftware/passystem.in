
<div class="row">
	<div class="col-md-12">
		<!-- start: EXPORT DATA TABLE PANEL  -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">
					Day <span class="text-bold">Book</span> Report
				</h4>
				<div class="panel-tools">
					<div class="dropdown">
						<a data-toggle="dropdown"
							class="btn btn-xs dropdown-toggle btn-transparent-grey"> <i
							class="fa fa-cog"></i>
						</a>
						<ul class="dropdown-menu dropdown-light pull-right" role="menu">
							<li><a class="panel-collapse collapses" href="#"><i
									class="fa fa-angle-up"></i> <span>Collapse</span> </a></li>
							<li><a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i>
									<span>Refresh</span>
							</a></li>
							<li><a class="panel-config" href="#panel-config"
								data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span>
							</a></li>
							<li><a class="panel-expand" href="#"> <i class="fa fa-expand"></i>
									<span>Fullscreen</span>
							</a></li>
						</ul>
					</div>
					<a class="btn btn-xs btn-link panel-close" href="#"> <i
						class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 space20">
						<div class="btn-group pull-right">
							<button data-toggle="dropdown"
								class="btn btn-green dropdown-toggle">
								Export <i class="fa fa-angle-down"></i>
							</button>
<?php if($this->session->userdata('login_type') == '1'){?>
<ul class="dropdown-menu dropdown-light pull-right">
							

								<li><a href="#" class="export-excel"
									data-table="#sample-table-2"> Export to Excel </a></li>
							

							</ul>
<?php }?>
</div>
					</div>
				</div>

<?php $dt1=date("d-m-Y",strtotime($dt1));?>
<?php $dt2=date("d-m-Y",strtotime($dt2)); $v=1;?>
<div class="center">
					<strong>
						<h2 style='color: green'> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2>
					</strong>
				</div>


				<div class="table-responsive">
					<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
							<tr>
								<th>#</th>
								<th>Paid To</th>
								<!--<th>Paid By Name</th>-->
								<th>Paid By</th>
								<th style="width: 250px;">Reason</th>
								<th>Discount Amount</th>
<?php if($condition=='Both'){?>

<th>Class</th>
								<th>Debit</th>
								<th>Credit</th>
<?php } elseif($condition=='Debit'){?>
<th>Debit</th>
<?php } else{?>

<th>Class</th>
								<th>Credit</th>
<?php }?>
<?php	if($this->session->userdata('login_type') == '1'){  ?>
<th>Closing Balance</th>
<?php }?>
<th>Pay Mode</th>
								<th>Pay Date</th>
								<th>Invoice Num</th>
							</tr>
						</thead>
						<tbody>
<?php
$count = 1;

if (($condition == 1) || ($condition == 0)) {
	
	if ($condition == 'Debit') {
		
		?>

<?php
		
$sno = 1;
		while ( $row = mysqli_fetch_object ( $a ) ) {
			if ($count % 2 == 0) {
				$rowcss = "danger";
			} else {
				$rowcss = "warning";
			}
			$dr_cr = $row->dabit_cradit;
			if ($dr_cr == 0) {
				?>
<tr class="<?php echo $rowcss;?>">
								<td><?php echo $sno; ?></td>
								<td><?php echo $row->paid_to; ?></td>
<?php
			
				?>
<td><?php
				if ($id3) {
					echo strtoupper ( $id3->name ) . " " . "[" . ($id3->username) . "]";
				} else {
					$eid = $this->db->query ( "SELECT username From employee_info where id ='$row->paid_by' " )->row ();
					if ($eid) {
						echo $eid->username;
					} else {
						echo $row->paid_by;
					}
				}
				?></td>
								<!--<td><?php
				
if ($id_5 == 0) {
				} else {
				
					?><?php

					

				}
				?></td>-->
								<td><?php echo $row->reason;  ?></td>
								<td></td>
								<td style="color: red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $row->amount; echo $row->amount; } ?></td>
								<!--<td>888</td>-->
<?php if($this->session->userdata('login_type') == 'admin'){  ?>
<td><?php echo $row->closing_balance; ?></td>
<?php }?>
<td><?php if($row->pay_mode==1){ echo "Cash"; } elseif($row->pay_mode==2){ echo "Online Transfer" ;} elseif($row->pay_mode==3){ echo "Bank Chalan" ;} elseif($row->pay_mode==4){ echo "Cheque" ;}elseif($row->pay_mode==5){ echo "Swap Machine" ;}else{ echo "Cash Payment";} ?></td>
								<td><?php echo $row->pay_date;  ?></td>
								<td>
    <?php if($row->reason=="From sale Stock") { ?>
<a
									href="<?php echo base_url()?>index.php/dayBookControllers/invoiceCashPayment/<?php echo $row->invoice_no;?>/<?php echo $fsdt;?>/<?php if($v == 1){echo "true";} ?>"
									class="btn btn-blue">
<?php echo $row->invoice_no;  ?>
</a>
<?php } else{ ?>
<a
									href="<?php echo base_url()?>index.php/dayBookControllers/invoiceCashPayment/<?php echo $row->invoice_no;?>/<?php echo $fsdt;?>/<?php if($v == 1){echo "true";} ?>"
									class="btn btn-blue">
<?php echo $row->invoice_no;  ?>
</a>
<?php }?>
</td>
							</tr>  
<?php $sno++; $count++;}}} ?>

<?php
	
	if ($condition == 'Credit') {
		?>
<?php

		
$sno = 1;
		while ( $row = mysqli_fetch_object ( $a ) ) {
			if ($count % 2 == 0) {
				$rowcss = "danger";
			} else {
				$rowcss = "warning";
			}
			$dr_cr = $row->dabit_cradit;
			$unm = $row->paid_by;
			$this->db->where ( "id", $unm );
			$sinfo = $this->db->get ( "student_info" )->row ();
			// $sid=$sinfo->id;
			
			if ($dr_cr == 1) {
				?>
<tr class="<?php echo $rowcss;?>">
								<td><?php echo $sno; ?></td>
								<td><?php echo $row->paid_to; ?></td>
<?php $id = $this->db->query("SELECT name From student_info where id ='$row->paid_by' ")->row();?>

<?php
				
$id_4 = $this->db->query ( "SELECT name,username,class_id From student_info where id ='$row->paid_by'" );
				$id1 = $id_4->row ();
				$id_5 = $id_4->num_rows ();
				?>
<td><?php
				
if ($id1) {
					echo strtoupper ( $id1->name ) . " " . "[" . ($id1->username) . "]";
				} else {
					$eid = $this->db->query ( "SELECT username From employee_info where id ='$row->paid_by' AND school_code='$school_code'" )->row ();
					if ($eid) {
						echo $eid->username;
					} else {
						echo "Other";
					}
				}
				?></td>

								<td><?php
				
if (($row->reason) == "Fee Deposit") {
					$invoice = $row->invoice_no;
					$this->db->where ( "invoice_no", $invoice );
					$dpmonth = $this->db->get ( "deposite_months" );
					if ($dpmonth->num_rows () > 0) {
						
						$dpdata = $dpmonth->result ();
						
						foreach ( $dpdata as $dprow ) :
							$dpm = $dprow->deposite_month;
							$dateObj = DateTime::createFromFormat ( '!m', $dpm );
							$monthName = $dateObj->format ( 'F' );
							// $this->dtotime($date));
							
							echo $monthName;
							
						
						endforeach
						;
						// $dpmonth->row
					} else {
						echo "Deposit Month not define";
					}
					echo $row->reason;
				} else {
					echo $row->reason;
				}
				?></td>
								<td></td>
								<td><?php
				
if ($id_5 == 0) {
				} else {
					$this->db->where ( 'school_code', $school_code );
					$this->db->where ( 'id', $id1->class_id );
					$classname = $this->db->get ( 'class_info' );
					$classdf = $classname->row ();
					$this->db->where ( "id", $classdf->section );
					$secname = $this->db->get ( "class_section" )->row ()->section;
				}
				?><?php

				
echo $classdf->class_name . "-" . $secname;
				?></td>
								<td style="color: green"><?php if($dr_cr == 1 || $dr_cr == 2){ $cradit = $cradit + $row->amount; echo $row->amount; } ?></td>

<?php if($this->session->userdata('login_type') == 'admin'){  ?>
<td><?php echo $row->closing_balance; ?></td>
<?php }?>
<td><?php if($row->pay_mode==1){ echo "Cash"; } elseif($row->pay_mode==2){ echo "Online Transfer" ;} elseif($row->pay_mode==3){ echo "Bank Chalan" ;} elseif($row->pay_mode==4){ echo "Cheque" ;}elseif($row->pay_mode==5){ echo "Swap Machine" ;}else{ echo "Cash Payment";} ?></td>
								<td><?php echo $row->pay_date; $v=1;?></td>
								<td>
     <?php if($row->reason=="Fee Deposit") { ?>

<a
									href="<?php echo base_url()?>index.php/invoiceController/fee/<?php echo $row->invoice_no;?>/<?php echo $sinfo->id; ?>/<?php echo $fsdt;?>/<?php if($v == 1){echo "true"; } ?>"
									class="btn btn-blue">
<?php echo $row->invoice_no; ?>
<?php } else{ ?>
<a
										href="<?php echo base_url()?>index.php/invoiceController/printSaleReciept/<?php echo $row->invoice_no;?>"
										class="btn btn-blue">
<?php echo $row->invoice_no;  ?>
</a>
<?php }?>

								
								</td>
							</tr>
<?php
				
$sno ++;
				$count ++;
			}
		}
	}
}

if ($condition == 'Both') {
	$sno = 1;
	while ( $row = mysqli_fetch_object ( $a ) ) {
		$dr_cr = $row->dabit_cradit;
		$unm = $row->paid_by;
	
		// $sinfo->id;
		if ($count % 2 == 0) {
			$rowcss = "danger";
		} else {
			$rowcss = "warning";
		}
		?>
<tr class="<?php echo $rowcss;?>">
								<td><?php echo $sno; ?></td>
								<td><?php 
								
								$idempl=$this->db->query ( "SELECT * From customers where id ='$row->paid_to' " )->row ();
								if ($idempl) {
									echo $idempl->emp_name;
								}else{echo $row->paid_to; }?></td>
<?php
	
		?>
<td><?php
		
				echo $row->paid_by;
		
		?>
</td>
		<td><?php
			echo $row->reason;
	
		?></td>

<td>0.00</td>

<td></td>
								<td style="color: red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $row->amount; echo $row->amount; } ?></td>
								<td style="color: green"><?php if($dr_cr == 1 || $dr_cr == 2){ $cradit = $cradit + $row->amount; echo $row->amount; } ?></td>

<?php	if($this->session->userdata('login_type') == '1'){  ?>
<td><?php echo $row->closing_balance; ?></td>
<?php }?>
<td><?php if($row->pay_mode==1){ echo "Cash"; } elseif($row->pay_mode==2){ echo "Online Transfer" ;} elseif($row->pay_mode==3){ echo "Bank Chalan" ;} elseif($row->pay_mode==4){ echo "Cheque" ;}elseif($row->pay_mode==5){ echo "Swap Machine" ;}else{ echo "Cash Payment";} ?></td>
								<td><?php echo $row->pay_date; ?></td>

								<td>
<?php 
if(($row->invoice_no=="Delete Fee")||($row->invoice_no=="Delete")){}else{
if(($row->dabit_cradit == 1) ){ ?>

 <?php if($row->reason=="Fee Deposit") { ?>
<a
									href="<?php echo base_url()?>index.php/invoiceController/fee/<?php echo $row->invoice_no;?>/<?php echo $unm; ?>/<?php echo $fsdt;?>/<?php if($v == 1){echo "true"; } ?>"
									class="btn btn-blue">
<?php echo $row->invoice_no; ?>
<?php } else{ ?>
<a
										href="<?php echo base_url()?>index.php/shopController/saleInvoice/<?php echo $row->invoice_no;?>"
										class="btn btn-blue">
<?php echo $row->invoice_no;  ?>
</a>
<?php }?>
<?php } if(($row->dabit_cradit  == 0)){?>
<a
										href="<?php echo base_url()?>index.php/dayBookControllers/invoiceCashPayment/<?php echo $row->invoice_no;?>/<?php if($v == 1){echo "true"; } ?>"
										class="btn btn-blue">
<?php echo $row->invoice_no; ?>
<?php }if(($row->dabit_cradit  == 2)){?>
<a
											href="<?php echo base_url()?>index.php/invoiceController/printDueFee/<?php echo $row->invoice_no;?>/<?php echo $fsdt;?>/<?php if($v == 1){echo "true"; } ?>"
											class="btn btn-blue">
<?php echo $row->invoice_no; ?>
<?php }}?>

								
								</td>
							</tr>
<?php $sno++; $count++;} 
} 


?>
</tbody>
						<tfoot>
							<tr>
								<td>----</td>
								<td>----------</td>
								<td align="right"><strong>Total</strong></td>
								<td>----------</td>
								<td>----------</td>
								<td>----------</td>
								<td><?php echo $dabit; ?></td>
								<td><?php echo $cradit; ?></td>
								<td>----------</td>
								<td>----------</td>
								<td>----------</td>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>



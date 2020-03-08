<div class="row">
	<div class="col-md-12">
		<!-- start: EXPORT DATA TABLE PANEL  -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Day <span class="text-bold">Book</span> Report</h4>
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
						<button class="btn btn-orange add-row">
							Add New <i class="fa fa-plus"></i>
						</button>
						<div class="btn-group pull-right">
							<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
								Export <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu dropdown-light pull-right">
								
								
								<li>
									<a href="#" class="export-csv" data-table="#sample-table-2" >
										Save as CSV
									</a>
								</li>
								
								
								
							
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
                            <tr>
                                <th>#</th>
                                <th>FORM_FEE</th>
                                <th>TUTION_FEE</th>
                                <th>ADMISSION_FEE</th>
                                <th>FACILITY</th>
                                <th>EXAM_FEE</th>
                                <th>REGISTRATION</th>
                                <th>BOARD_REGISTRATION</th>
                                <th>OTHER_FEE</th>
                                <th>I_CARD_FEE</th>
                                <th>COMPUTER</th>
                                <th>DIGITAL</th>
                                <th>EXAM</th>
                                <th>DISCOUNT</th>
                                <th>LATE</th>
                                <th>TRANSPORT</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
						<tbody>
						    <?php foreach($feeDetail as $key => $value): ?>
                                <tr>
                                    <td><?= $value['className'] ?></td>
                                    <td><?= $value['feeData']->FORM_FEE == null ? 0 : $value['feeData']->FORM_FEE ?></td>
                                    <td><?= $value['feeData']->TUTION_FEE == null ? 0 : $value['feeData']->TUTION_FEE ?></td>
                                    <td><?= $value['feeData']->ADMISSION_FEE == null ? 0 : $value['feeData']->ADMISSION_FEE ?></td>
                                    <td><?= $value['feeData']->FACILITY == null ? 0 : $value['feeData']->FACILITY ?></td>
                                    <td><?= $value['feeData']->EXAM_FEE == null ? 0 : $value['feeData']->EXAM_FEE ?></td>
                                    <td><?= $value['feeData']->REGISTRATION == null ? 0 : $value['feeData']->REGISTRATION ?></td>
                                    <td><?= $value['feeData']->BOARD_REGISTRATION == null ? 0 : $value['feeData']->BOARD_REGISTRATION ?></td>
                                    <td><?= $value['feeData']->OTHER_FEE == null ? 0 : $value['feeData']->OTHER_FEE ?></td>
                                    <td><?= $value['feeData']->I_CARD_FEE == null ? 0 : $value['feeData']->I_CARD_FEE ?></td>
                                    <td><?= $value['feeData']->COMPUTER == null ? 0 : $value['feeData']->COMPUTER ?></td>
                                    <td><?= $value['feeData']->DIGITAL == null ? 0 : $value['feeData']->DIGITAL ?></td>
                                    <td><?= $value['feeData']->EXAM == null ? 0 : $value['feeData']->EXAM ?></td>
                                    <td><?= $value['feeData']->DISCOUNT == null ? 0 : $value['feeData']->DISCOUNT ?></td>
                                    <td><?= $value['feeData']->LATE == null ? 0 : $value['feeData']->LATE ?></td>
                                    <td><?= $value['feeData']->TRANSPORT == null ? 0 : $value['feeData']->TRANSPORT ?></td>
                                    <td>
                                        <?php 
                                            $a = $value['feeData']->FORM_FEE == null ? 0 : $value['feeData']->FORM_FEE;
                                            $a1 = $value['feeData']->TUTION_FEE == null ? 0 : $value['feeData']->TUTION_FEE;
                                            $a2 = $value['feeData']->ADMISSION_FEE == null ? 0 : $value['feeData']->ADMISSION_FEE;
                                            $a3 = $value['feeData']->FACILITY == null ? 0 : $value['feeData']->FACILITY;
                                            $a4 = $value['feeData']->EXAM_FEE == null ? 0 : $value['feeData']->EXAM_FEE;
                                            $a5 = $value['feeData']->REGISTRATION == null ? 0 : $value['feeData']->REGISTRATION;
                                            $a6 = $value['feeData']->BOARD_REGISTRATION == null ? 0 : $value['feeData']->BOARD_REGISTRATION;
                                            $a7 = $value['feeData']->OTHER_FEE == null ? 0 : $value['feeData']->OTHER_FEE;
                                            $a8 = $value['feeData']->I_CARD_FEE == null ? 0 : $value['feeData']->I_CARD_FEE;
                                            $a9 = $value['feeData']->COMPUTER == null ? 0 : $value['feeData']->COMPUTER;
                                            $a10 = $value['feeData']->DIGITAL == null ? 0 : $value['feeData']->DIGITAL;
                                            $a11 = $value['feeData']->EXAM == null ? 0 : $value['feeData']->EXAM;
                                            $a12 = $value['feeData']->DISCOUNT == null ? 0 : $value['feeData']->DISCOUNT;
                                            $a13 = $value['feeData']->LATE == null ? 0 : $value['feeData']->LATE;
                                            $a14 = $value['feeData']->TRANSPORT == null ? 0 : $value['feeData']->TRANSPORT;
                                            $total = $a + $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13 + $a14;
                                            echo $total;
                                        ?>
                                            
                                    </td>
                                </tr>
                            <?php endforeach; ?>
		                </tbody>	
					</table>
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	TableExport.init();
</script>







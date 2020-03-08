
<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
								
								<ul class="dropdown-menu dropdown-light pull-right">
									<!--<li>-->
									<!--	<a href="#" class="export-pdf" data-table="#alt-pg-dt" >-->
									<!--		Save as PDF-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-png" data-table="#alt-pg-dt">-->
									<!--		Save as PNG-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-csv" data-table="#alt-pg-dt" >-->
									<!--		Save as CSV-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-txt" data-table="#alt-pg-dt" >-->
									<!--		Save as TXT-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-xml" data-table="#alt-pg-dt" >-->
									<!--		Save as XML-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-sql" data-table="#alt-pg-dt" >-->
									<!--	Save as SQL-->
									<!--	</a>-->
									<!--</li>-->
									<!--<li>-->
									
									<!--	<a href="#" class="export-json" data-table="#alt-pg-dt" >-->
									<!--		Save as JSON-->
									<!--	</a></li>-->
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
									<!--<li>-->
									<!--	<a href="#" class="export-doc" data-table="#alt-pg-dt" >-->
									<!--	Export to Word-->
									<!--</a>-->
									<!--</li>-->
									<!--<li>-->
									<!--	<a href="#" class="export-powerpoint" data-table="#alt-pg-dt">-->
									<!--		Export to PowerPoint-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
            <div class="table-reponsive">
            <table id="sample-table-2" class="table table-striped table-hover">
              <thead>
                <tr style="background-color: #1ba593; color: white;">
                    <th style="width:8px;">S. No.</th>
                <th style="width:8px;">Sub Branch Name</th>
                   <th style="width:8px;">Order Date</th>
                  <th style="width:8px;">Order Number</th>
                  <th style="width:8px;">Invoice NUmber</th>
                  <th style="width:8px;">Total Rs.</th>
                  <th style="width:8px;">Username</th>
                 
                  <!--  <th> Password</th> -->
                </tr>
              </thead>
              <tbody>
              <tr class="text-uppercase">
          <?php $i=1; $t=0;
if($view->num_rows()>0){
        $subbr=$view->result();
        //print_r($subbr);exit();
           foreach($subbr as $row):
?>                <td style="width:8px;"><?php echo $i;?></td>
                    <td style="width:8px;"><?php $this->db->where('id',$subid);
                    $snm=$this->db->get('sub_branch')->row(); echo $snm->bname;?></td>
                  <td style="width:8px;"><?php echo $row->order_date;?></td>
                  <td style="width:8px;"><a href="<?php echo base_url();?>index.php/shopController/invoiceDetail/<?php echo $row->order_no;?>"  class="btn btn-danger"> <?php echo $row->order_no;?></a></td>
                   <td style="width:8px;"><?php echo $row->invoice_no;?></td>
                  <td style="width:8px;"><?php echo $row->total_amount;?></td>
                  <td style="width:8px;"><?php $this->db->where('id',$row->cust_id);
                    $cnm=$this->db->get('customers');
                    if($cnm->num_rows()>0) { echo $cnm->row()->username; }else{ echo "N/A"; } ?></td>

                </tr><?php $i++;?>
                <?php
                endforeach;
               
               }   ?>
              </tbody>

            </table>
            </div>
           	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
           
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light btn-warning">
                <h4 class="panel-title">Day Book Record </h4>
              </div><br>
<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="card">
      	 <div class="card-header">
      	<?php $dt1=date("Y-m-d",strtotime($dt1));?>
             <?php $dt2=date("Y-m-d",strtotime($dt2)); ?>
      	 <div><strong>
        <center> <h2 style='color: green'> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2></center></strong>
        </div>
        </div>
        <div class="card-block">
          <div class="dt-responsive table-responsive">
            <table id="alt-pg-dt"  class="table table-striped table-bordered nowrap">
              <thead>	
                <tr>
                    <th>S.No</th>
                    <th>Paid To</th>
                    <th>Paid By Name</th>
                    <th>Paid By Username</th>
                    <th>Reason</th>
                  
                    <th>Debit</th>
                    <th>Credit</th>
                   
                    <th>Closing Balance</th>
                    <th>Pay Date</th>
                    <th>Pay Mode</th>
                    <th>Invoice Num</th>
                </tr>
            </thead>
              <tbody>
                <?php
                	$this->db->where('pay_date >=',$dt1);
                	$this->db->where('pay_date <=',$dt2);
                    $both1=$this->db->get('day_book');
                	 if($both1->num_rows()>0){
                    $dabit=0;$cradit=0;
                      $i=1;foreach($both1->result() as  $data):

                	 	?>
                <tr class="text-uppercase">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data->paid_to; ?></td>
                    <?php if($data->paid_by=="admin"){?>
                    <td><?php echo $data->paid_by;?></td> 
                      <?php } else { 

                      	  $this->db->where('username',$data->paid_to);
                      	  $cust=$this->db->get('customers');
                      	  if($cust->num_rows()>0){?>
                     <td><?php  echo $cust->row()->name;?></td>
                      <?php } else{ 
                      ?><td></td><?php
                      
                      }?>


                      <?php } ?>
                     <td><?php echo $data->paid_by;?></td>

                     
                    <td><?php echo $data->reason; ?></td>
                   <!--<td><?php echo $dr_cr=$data->dabit_cradit; ?></td>-->

<td style="color:red"><?php if($dr_cr == 0 || $dr_cr == 0){ $dabit = $dabit + $data->amount; echo $data->amount; } ?></td>
<td style="color:green"><?php if($dr_cr == 1 || $dr_cr == 1){ $cradit = $cradit +  $data->amount; echo $data->amount; } ?></td>
                    <td><?php echo $data->closing_balance; ?></td>
                    <td><?php echo $data->pay_date; ?></td>
                    <td><?php echo $data->pay_mode; ?></td>

                  
                         
                     <td><a href="<?php echo base_url();?>wallet/invoice/<?php echo $data->invoice_no;?>"class="btn btn-primary"><?php echo $data->invoice_no;?></a></td>
                   
                </tr>
                <?php $i++; endforeach; } 
                ?>



<tr>
<td>----</td>
<td>----------</td>
<td align="right"><strong>Total</strong></td>
<td>----------</td>
<td>----------</td>


<td><?php echo $dabit; ?></td>
<td><?php echo $cradit; ?></td>


<td>----------</td>
<td>----------</td>
<td>----------</td>
</tr>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>
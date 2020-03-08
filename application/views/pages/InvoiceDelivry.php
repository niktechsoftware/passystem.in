<section class="login-page section-b-space">
    <div class="container">
    	<?php $id=$this->uri->segment(3);
    	$this->db->where('id',$id);
    	$row= $this->db->get('delivery_boy')->row();
    	//print_r($row);?>
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 style=" color: rgb(242, 0, 137);">Delivery Incharge Invoice</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px; width: 80%;">
                		<table class="table table-bordered table-hover">
                			<tr class="text-uppercase">
                				<th>Name</th>
                				<td><label><?php echo $row->name;?></label></td>
                			</tr>
                			<tr class="text-uppercase">
                				<th>Username</th>
                				<td><label><?php echo $row->username;?></label></td>
                			</tr>
                			<tr>
                				<th class="text-uppercase">Password</th>
                				<td><label><?php echo $row->password;?></label></td>
                			</tr>

                			<tr class="text-uppercase">
                				<th>Registration No</th>
                				<td><label><?php echo $row->id;?></label></td>
                			</tr>
                			<tr class="text-uppercase">
                			    <th>Registration Date</th>
                			    <td><lable><?php echo $row->created_date;?></lable></td>
                			</tr>
                			<!--<tr >-->
                			<!--    <th colspan="2">Your Rgistration is successfull.Pay 1100 Rs to Admin by cash/paytm to admin/your Joiner For activation</th>-->
                			<!--</tr>-->

                		</table>
               </div>
            </div>
        </div>
    </div>
</section>

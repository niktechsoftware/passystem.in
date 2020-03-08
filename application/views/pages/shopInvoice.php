<section class="login-page section-b-space">
    <div class="container">
    	<?php $id=$this->uri->segment(3);
    	$this->db->where('id',$id);
    	$row= $this->db->get('sub_branch')->row();
    	//print_r($row);?>
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 style=" color: rgb(242, 0, 137);">Sub Branch Invoice</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px; width: 80%;">
                		<table class="table table-bordered table-hover" style="text-transform:uppercase">
                		    <tr>
                				<th>District Name</th>
                				<?php 
                				$this->db->where("id" ,$row->district);
                			$dt  =	$this->db->get("branch");
                			if($dt->num_rows()>0){
                			   
                				?>
                				<td><label><?php echo $dt->row()->b_name;?></label></td>
                				<?php }
                				else{?>
                					<td><label>There is some problem in your Branch</label></td>
                			<?php	}?>
                			</tr>
                			<tr>
                				<th>Sub Branch Name</th>
                				<td><label><?php echo $row->bname;?></label></td>
                			</tr>
                			<tr>
                				<th> Owner Name</th>
                				<td><label><?php echo $row->ownername;?></label></td>
                			</tr>
                			<tr>
                				<th>Username</th>
                				<td><label><?php echo $row->username;?></label></td>
                			</tr>
                			<tr>
                				<th>Password</th>
                				<td><label><?php echo $row->password;?></label></td>
                			</tr>

                				<tr>
                				<th>Registration No</th>
                				<td><label><?php echo $row->id;?></label></td>
                			</tr>

                			<!--<tr>-->
                			<!--    <th>Registration Date</th>-->
                			<!--    <td><lable><?php //echo $row->created_date;?></lable></td>-->
                			<!--</tr>-->
                				<tr >
                			    <th colspan=2>Your Rgistration is successfull.Pay 1100 Rs to Admin by cash/paytm to admin/your Joiner  For activation</th>
                			</tr>

                		</table>
               </div>
            </div>
        </div>
    </div>
</section>

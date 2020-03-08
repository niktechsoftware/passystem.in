<div class="container">
    	<?php $id=$this->uri->segment(3);
    	//print_r($id);exit();
    	$this->db->where('id',$id);
    	$row= $this->db->get('customers')->row();
    	//print_r($row);?>
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 style=" color: rgb(242, 0, 137);">Subscriber Invoice</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px; width: 50%;">
                		<table class="table table-bordered table-hover">
                			<tr class="text-uppercase">
                				<th>Name</th>
                				<td><label><?php echo $row->name;?></label></td>
                			</tr>
                				<tr class="text-uppercase">
                				<th>Branch Name</th>
                					<?php 
                				// 	echo $row->district;
                				$this->db->where("id" ,$row->district);
                		    	$dt =$this->db->get("branch");
                			if($dt->num_rows()>0){
                			   $rowdt= $dt->row();
                				?>
                				<td><label><?php echo $rowdt->district."[".$rowdt->b_name."]";?></label></td>
                				<?php }
                				else{?>
                					<td><label>There is some problem in your Branch</label></td>
                			<?php	}?>
                			</tr>
                				<tr class="text-uppercase">
                				<th>Sub Branch Name</th>
                						<?php 
                				$this->db->where("id" ,$row->sub_branchid);
                			$dt1  =	$this->db->get("sub_branch");
                			if($dt1->num_rows()>0){
                			   $subdt= $dt1->row();
                				?>
                				<td><label><?php echo $subdt->bname;?></label></td>
                				<?php }
                				else{?>
                					<td><label>There is some problem in your Sub Branch</label></td>
                			<?php	}?>
                			</tr>
                			<tr class="text-uppercase">
                				<th>Username</th>
                				<td><label><?php echo $row->username;?></label></td>
                			</tr>
                			<tr>
                				<th class="text-uppercase">Password</th>
                				<td><label><?php echo $row->password;?></label></td>
                			</tr>
                				<tr>
                				<th class="text-uppercase">Registration No</th>
                				<td><label><?php echo $row->id;?></label></td>
                			</tr>
                			<tr>
                			    <th class="text-uppercase">Registration Date</th>
                			    <td><lable><?php echo $row->created;?></lable></td>
                			</tr>
                				<tr>
                			    <th colspan="2">Congratulations your registration is Under Process.Please pay 1100 Rs for Activation</th>
                			</tr>
                				<tr>
                			    <th colspan="2"><span style="font-size:14px;color:red">Note :-</span><span style="color:red;font-size:12px;">Your registration will be automatically cancelled if you do not pay the mentioned amount within 12 hours.</span></th>
                			</tr>
                			<tr>
                			    <th colspan="2"><a href="<?php echo base_url();?>index.php/auth/signin">login Panel</a></th>
                			</tr>
                		</table>
               </div>
            </div>
        </div>
    </div>
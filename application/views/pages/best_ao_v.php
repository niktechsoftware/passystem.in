<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Best Advising Officer's</h2></center>
</div>

<div class="container">
    <table class="table table-border" id="bst">
        <thead>
            <tr>
                <th>Sno</th>
                <th><div class="col-md-4" style="margin-left:3%">Advising officer's</div></th>
                <th>Employee ID</th>
                <th><div class="col-md-8 ">View's</div></th>
            </tr>
        </thead>
        <div style="margin-left:3%">
            <tbody>
                 <?php
                   $this->db->order_by("pv", "desc");
                   $this->db->like('emp_id','PSUAO', 'after');
        	       $this->db->limit(10);
        	       $row1=$this->db->get('emp_pv')->result();
        	       $i=1;
        	       foreach($row1 as $edata)
        	       {
        	            $this->db->where('username',$edata->emp_id);
        	            $edata1= $this->db->get('employee')->row();
        	             $this->db->where('emp_username',$edata1->username);
        	            $empfd=$this->db->get('emp_feedback');
        	             ?>
        	             <tr>
        	             <td> <?php echo $i;?> </td>
        	             <td><a href="<?php echo base_url();?>index.php/about_us_cont/ao_v/<?php echo $edata1->username;?>">
        	                 <?php if(strlen($edata1->photo)>0)
        	                 {?><img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/employee/' . $edata1->photo; ?>"/><?php } else{?>
        			<img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/>
        		    <?php	}?></a></td>
        		    <td><?php echo $edata1->username;?></td>
        	             <td><?php echo $edata1->name;?><br>
        	             <p style ="font-size:20px;"><?php   if($empfd->num_rows()>0){if(strlen($empfd->row()->description)>0){ echo $empfd->row()->description; } else { echo "FeedBack Not Fill.."; } }  else { echo "FeedBack Not Fill.."; } ?></p>
        	             </td>
        	            </tr>
        	       <?php $i++; }
        	       ?>
        	    
        	
            </tbody>
        </div>
    </table>
</div>

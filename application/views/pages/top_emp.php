<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Top 20 Employee</h2></center>
</div>

<div class="container">
    <table id="bst" class="table table-border">
        <thead>
            <tr>
                <th>SNo</th>
                <th><div class="col-md-4" style="margin-left:3%">Employee</div></th>
                <th>Employee ID</th>
                <th><div class="col-md-8 ">View's</div></th>
            </tr>
        </thead>
        <div style="margin-left:3%">
            <tbody>
                 <?php 
        	    $this->db->order_by("rank", "asc");
        	    $emp= $this->db->get("rank_emp")->result();
        $i=1;
        	foreach($emp as $data){
        	  
        	    $this->db->where("username",$data->username);
        	   $customerdt= $this->db->get("employee");
       if($customerdt->num_rows()>0)
                    {  ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><a href="<?php echo base_url();?>index.php/about_us_cont/ao_v/<?php echo $customerdt->row()->username;?>">
                    <?php 
                       if(strlen($customerdt->row()->photo)>0){?><img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/employee/' . $customerdt->row()->photo; ?>"/><?php } else{?>
        			<img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/>
        		    <?php }  
                   
                   	?>
                    <!--<img src="<?php //echo base_url();?>/passoft/assets/images/gallery/<?php// echo $customerdt->image;?>" style="height:150px;width:150px;"><br>-->
                    </a></td>
                    <td><?php echo $data->username; ?></td>
                    <td><?php echo $customerdt->row()->name."<br>"; 
                     $this->db->where("emp_username",$data->username);
                        $empfd= $this->db->get("emp_feedback");
                        if($empfd->num_rows()>0)
                        {
                            if(strlen($empfd->row()->description)>0)
                            {
                            echo $empfd->row()->description;
                            }
                            else 
                            {
                            echo "Employee FeedBack Is Not Availble.";
                            }    
                        }
                        else
                        {
                            echo "Employee FeedBack Is Not Availble.";
                        }
                        ?>
                        </td>
                </tr>
                <?php } $i++; } ?>
            </tbody>
        </div>
    </table>
</div>

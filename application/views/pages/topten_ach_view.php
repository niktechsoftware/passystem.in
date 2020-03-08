<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  /*border:1px;*/
  width: 60%;
  height:150px;
  background-color: antiquewhite;
}
</style>
<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Top Ten Achiever's</h2></center>
</div>

<div class="container">
    <table id ="bst" class="table table-border">
        <thead>
            <tr>
                <th>SNo</th>
                <th><div class="col-md-4" style="margin-left:3%">Achiever's</div></th>
                <th>UserID</th>
                <th><div class="col-md-8 ">View's</div></th>
                <th>#</th>
            </tr>
        </thead>
        <div style="margin-left:3%">
            <tbody>
                 <?php 
        // 	$row =$this->db->query("select  * from pv order by pv desc limit 10")->result();
        $row =$this->db->query("select  * from pv order by pv desc")->result();
        	$i=1;
        	foreach($row as $data)
        	{
        	  
        	    $this->db->where("id",$data->cid);
        	   $customerdt= $this->db->get("customers")->row();
        	   //echo "<pre>";
        	   //print_r($customerdt);
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><a href="<?php echo base_url();?>index.php/about_us_cont/achiever_detail/<?php echo $customerdt->username;?>">
                    <?php if(strlen($customerdt->image)>0){?><img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'); ?>/images/subscriber/<?php echo $customerdt->image;?>"/><?php } else{?>
        			<img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'); ?>/images/subscriber/userlogo.png"/>
        		    <?php	}?>
                    <!--<img src="<?php //echo base_url();?>/passoft/assets/images/gallery/<?php// echo $customerdt->image;?>" style="height:150px;width:150px;"><br>-->
                    </a></td>
                    <td><?php echo $customerdt->username;?></td>
                    <td><?php echo $customerdt->name."<br>"; 
                        $this->db->where("emp_username",$customerdt->username);
                        $empfd= $this->db->get("emp_feedback");
                        if($empfd->num_rows()>0)
                        {
                            if(strlen($empfd->row()->description)>0)
                            {
                            echo $empfd->row()->description;
                            }
                            else 
                            {
                            echo "Subscriber FeedBack Is Not Fill.";
                            }    
                        }
                        else
                        {
                            echo " Subscriber FeedBack Is Not Fill.";
                        }
                        ?>
                        </td>
                        <td style="font-color:red"><?php echo "Rank".$i;?></td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </div>
    </table>
</div>
<center><div class="card" style="margin-top:20px;">
    <form method="post" action="<?php echo base_url();?>index.php/about_us_cont/see_rank_ach">
    <label style="color:grey; font-size:18px;">See Your Rank : </label>
    <input type="text" style="width:50%" class ="form-control" name="userid" required placeholder="Enter Your userID"/>
   <input type="submit" class="btn btn-info" value="Submit">
    </form>
</div></center>
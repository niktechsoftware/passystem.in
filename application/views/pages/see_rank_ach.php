<?php echo $this->input->post("userid");?>

<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Your Rank</h2></center>
</div>

<div class="container">
    <table id ="bst" class="table table-border">
        <thead>
            <tr>
                <th>SNo</th>
                <!--<th><div class="col-md-4" style="margin-left:3%">Achiever's</div></th>-->
                <th>Customer Name</th>
                <th>UserID</th>
                <th>rank</th>
            </tr>
        </thead>
        <div style="margin-left:3%">
            <tbody>
                 <?php 
                $userid = $this->input->post('userid');
        	    $this->db->where("username",$userid);
        	   $customerdt= $this->db->get("customers");
        	   if($customerdt->num_rows()>0)
        	   {
        	       $this->db->where('cid',$customerdt->row()->id);
        	       $pv_dt = $this->db->get('pv');
        	       if($pv_dt->num_rows()>0)
        	       {
        	           $this->db->where('pv >', $pv_dt->pv);
        	           $this->db->limit(5);
        	           $ddt = $this->db->get('pv');
        	           $i=1;
        	           foreach($ddt->result() as $dtt)
        	           { ?>
        	                <tr>
                                <td><?php echo $i;?></td>
                                <td>
                                    <?php 
                                          $this->db->where("id",$dtt->cid);
        	                                $custdt= $this->db->get("customers")->row();
        	                                echo $custdt->name;
                                    ?>
                                </td>
                                <td><?php  echo $custdt->username;?></td>
                                <td></td>
                            </tr>       
        	       <?php  $i++;  }
        	       }
        	       
        	   }
        	
            ?>
              
            </tbody>
        </div>
    </table>
</div>
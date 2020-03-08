<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  /*border:1px;*/
  width: 60%;
  height:350px;
  background-color: antiquewhite;
}
</style>

    <div style="background-color: antiquewhite;">
        <center><h2 style="color:#f20089;margin:3%;">Achiever's view</h2></center>
    </div>

    <center><div class="card">
    <div class="row">
        <div class="col-md-4" style="padding:50px;">
           <?php if(strlen($sub_data->image)>0)
        	                 {?><img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/subscriber/' . $sub_data->image; ?>"/><?php } else{?>
        			<img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/>
        		    <?php	}?>
        		    <h4><?php echo $sub_data->name;?></h4>
        </div>
         <div class="col-md-8" style=" padding:40px;">
             <p style ="font-size:20px; text-align:center;">"
            <?php    $this->db->where('cus_username',$sub_data->username);
        	            $empfd=$this->db->get('viewmessage'); 
        	            if($empfd->num_rows()>0)
        	            {
        	                if(strlen($empfd->row()->viewmsg)>0)
        	                { 
        	                    echo $empfd->row()->viewmsg; 
        	                    
        	                } 
        	                else
        	                { 
        	                    echo "FeedBack Not Fill..";
        	                }
        	            }
        	            else
        	            {
        	                 echo "FeedBack Not Fill..";
        	            }
        	            ?>
        	           " </p>
        </div>
    </div>
</div>

    <div>
        <a href="<?php echo base_url();?>index.php/about_us_cont/topten_ach_view" class="btn btn-info">BACK</a></center>
    </div>

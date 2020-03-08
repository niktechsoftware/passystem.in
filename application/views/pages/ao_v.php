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

<?php $this->db->where('username',$this->uri->segment(3));
$emp = $this->db->get('employee');
if($emp->num_rows()>0)
{
if($emp->row()->emp_type == 7)
{ ?>
    <div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Advising Officer</h2></center>
</div>
<?php }
else
{ ?>
    <div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Employee Details</h2></center>
</div>
<?php }


?>

    <center><div class="card">
    <div class="row">
        <div class="col-md-4" style="padding:50px;">
           <?php if(strlen($emp->row()->photo)>0)
        	                 {?><img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/employee/' . $emp->row()->photo; ?>"/><?php } else{?>
        			<img style="margin-left:10%; margin-right:10%; width:150px; height:150px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/>
        		    <?php	}?>
        		    <h4><?php echo $emp->row()->name;?></h4>
        </div>
         <div class="col-md-8" style=" padding:40px;">
             <p style ="font-size:20px; text-align:center;">"
            <?php    $this->db->where('emp_username',$emp->row()->username);
        	            $empfd=$this->db->get('emp_feedback'); 
        	            if($empfd->num_rows()>0)
        	            {
        	                if(strlen($empfd->row()->description)>0)
        	                { 
        	                    echo $empfd->row()->description; 
        	                    
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
<?php 
if($emp->row()->emp_type == 7)
{ ?>
    <div >
<a href="<?php echo base_url();?>index.php/about_us_cont/best_ao" class="btn btn-info">BACK</a></center>
</div>
<?php }
else
{ ?>
    <div >
<a href="<?php echo base_url();?>index.php/about_us_cont/top_emp" class="btn btn-info">BACK</a></center>
</div>
<?php }


?>

<?php }
?>

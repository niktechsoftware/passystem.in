<style>
.button1 {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
.button2 {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing1 1500ms infinite;
  -moz-animation: glowing1 1500ms infinite;
  -o-animation: glowing1 1500ms infinite;
  animation: glowing1 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}


@-webkit-keyframes glowing1 {
  0% { background-color: #26b200; -webkit-box-shadow: 0 0 3px #00b23f; }
  50% { background-color: #00ff63; -webkit-box-shadow: 0 0 40px #e6e8e8; }
  100% { background-color: #00b20c; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing1 {
  0% { background-color: #26b200; -moz-box-shadow: 0 0 3px #00b23f; }
  50% { background-color: #00ff63; -moz-box-shadow: 0 0 40px #e6e8e8; }
  100% { background-color: #00b20c; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing1 {
  0% { background-color: #26b200; box-shadow:  0 0 3px #00b23f; }
  50% { background-color: #00ff63; box-shadow: 0 0 40px  #e6e8e8; }
  100% { background-color: #00b20c; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing1 {
  0% { background-color: #26b200; box-shadow:  0 0 3px #00b23f; }
  50% { background-color: #00ff63; box-shadow: 0 0 40px  #e6e8e8; }
  100% { background-color: #00b20c; box-shadow: 0 0 3px #B20000; }
}
</style>



<?php 
$this->db->where("id" , $this->session->userdata("id"));
$custdt=  $this->db->get("customers")->row();
if($custdt->tstatus==1){
 ?>
<div style="margin:10px;">    
<a class="button1"  href="<?php echo base_url();?>subscriberController/change_status">Click me!! To Change Permanent Subscriber</a>
</div>
<?php } ?>
<?php 

$this->db->where("cust_id" , $this->session->userdata("id"));
$this->db->where("order_status" ,0);
$this->db->where("shop_order" ,1);
$orderdt=  $this->db->get("order_serial");

if($orderdt->num_rows()>0){
    foreach($orderdt->result() as $od_data){ if($od_data->del_boy_id>0){ ?>
        <div style="margin:10px;">    
        <a class="button2"  href="<?php echo base_url();?>subscriberController/new_invoice/<?php echo $od_data->order_no;?>">Your Order [&nbsp;<?php echo $od_data->order_no; ?>&nbsp;] deliver soon.</a>
        </div>
        <?php } 
    }
}       ?>

<?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i>Now You Are Change Into PERMANENT PASSYSTEM SUBSCRIBER Successfully!!!!!
							</div>
                <?php }elseif($this->uri->segment(3)==6){?> 
                    <div class="successHandler alert alert-danger">
								<i class="fa fa-ok"></i> Not Successfully Done!!!!!
							</div>
                 <?php }?>

<?php

$this->db->where("username" , $this->session->userdata("username"));
$custdt=  $this->db->get("customers")->row();
if(($custdt->tstatus==1) || ($custdt->pstatus==1)){

    ?>


<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green text-center core-icon">
                    <i class="fa fa-inr fa-3x icon-big"></i><br>
					<span class="subtitle"></span>
                </div>
                <a href="<?php echo base_url();?>subscriberController/wallet">
	                <div class="padding-20 core-content">
	                	<!--	<h3 class="title block no-margin">Fee Reports</h3>-->
	               		<!-- <h3 class="title block no-margin">Today Fees Collection</h3>-->
	                	<!--<br/>-->
	                	<!--<span class="subtitle"> Find Out Fee Reports  </span>-->
	                	
	                	 <h2 class="text-black">Total Pass Value</h2>
                                                <?php 
                                                     $cid=$this->session->userdata("id");
                                                      $usernm=$this->session->userdata("username");
                                                        $this->db->where("cid",$cid);
                                                     $cpv= $this->db->get("pv");
                                                     if($cpv->num_rows()>0){
                                                          $pv=$cpv->row()->pv;
                                                     }else{
                                                         $pv=0;
                                                     }
                                                    
                                                      
                                                     $this->db->where("cust_id",$cid);
                                                     $row1= $this->db->get("register_pv");
                                                     if($row1->num_rows()>0)
                                                     {
                                                      $dt= $row1->row();
                                                      $totpv=$dt->pv+$pv; ?>
                                                      <h4 class="text-black m-b-0">Pv: <?php echo $totpv. "  Pv "; ?></h4>
                                                  <?php } else { ?>
                                                  <h4 class="text-black m-b-0">Pv: <?php echo $pv." Pv"; ?></h4>
                                               <?php   } ?></a>
                                                
                                                    <div class="card-footer"> <?php $date=date('d-M-Y h:i:s a');?>
                                                        <p class="text-black m-b-0"><i class="feather icon-clock text-black f-14 m-r-10"></i>Update : <?php echo $date;?></p>
                                                    </div>
	                	
	                	
	                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure text-center core-icon">
                    <i class="fa fa-inr fa-3x icon-big"></i>
                    	 <span class="subtitle">
					
                </div>
                
                <a href="#">
                <div class="padding-20 core-content">
                   <h2 class="text-black">Total Rs. Value</h2>
                    <?php $cid=$this->session->userdata("id");
                     $this->db->where("cid",$cid);
                     $row1= $this->db->get("pv");
                     if($row1->num_rows()>0){
                      $dt= $row1->row();?>
                    <h4 class="text-black m-b-0">Rs: <?php echo $dt->rupee; ?></h4>
                    <?php   }else{?>
                   <h4 class="text-black m-b-0">Rs: <?php echo "0.00"; ?></h4>
                    <?php } ?>
                        </a>
                    <div class="card-footer"> 
                        <?php $date=date('d-M-Y h:i:s a');?>
                        <p class="text-black m-b-0"><i class="feather icon-clock text-black f-14 m-r-10"></i>Update : <?php echo $date;?></p>
                    </div>
                    
                    
                    
                    <!-- <h4 class="title block no-margin">DayBook</h4>-->
     <!--               <h4 class="title block no-margin">Today DayBook</h4>-->
					<!--<br/>-->
					<!--<div class="row">-->
					<!--	<div class="col-sm-6">-->
					<!--	<h6 class="block no-margin">Credit Amount</h6>-->
						
					<!--	</div>-->
					<!--</div>-->
					
					
                </div>
                
            </div>
        </div>
    </div>

<div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                     <br>
                    	<span class="subtitle"> </span>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                   <h2 class="text-black">Up/Down line Subscribers</h2>
                      <?php $this->db->where('parentID',$this->session->userdata('id'));
                    $tree=  $this->db->get('tree')->num_rows();
                    if($tree > 0)
                    {
                       ?>
                    <h4 class="text-black m-b-0"><?php echo $tree; ?></h4>
                    <?php  }else{?>

                    <h4 class="text-black m-b-0"><?php echo "NO Any Subscriber"; ?></h4>
                    <?php }?>
                     <div class="card-footer"> 
                        <?php $date=date('d-M-Y h:i:s a');?>
                        <p class="text-black m-b-0"><i class="feather icon-clock text-black f-14 m-r-10"></i>Update : <?php echo $date;?></p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
  </div>  
  <div class="row">
        <div class="panel panel-default panel-white core-box" style="margin-left:20px; width:550px; height:350px;">
            <div class="panel-body no-padding">
                <div class="partition-pink text-center core-icon">
                    <div class="card-block text-center text-black" style="margin-top:50px">
                       <div class="m-b-25">
                           <?php if(strlen($custdt->image)>0){?><img src="<?php echo $this->config->item('asset_url');?>/images/subscriber/<?php echo $custdt->image;?>" style="max-height: 70px; max-width: 100px;"> <?php } else { ?> <img src="<?php echo base_url();?>assets/tree/userlogo.png" style="max-height: 70px; max-width: 100px;"> <?php }?>
                        </div>
                        <h6 class="f-w-600"><?php echo $custdt->name; ?></h6>
                        <p>Subscriber</p>
                     
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:50px;">
                    <div class="card-block" style="margin-left:200px">
                        <center><h3 style="margin-right:30px"><u>Subscriber Information</u></h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Phone</h6>
                            </div>
                            <div class="col-md-6">    
                                <h6><?php echo $custdt->mobile;?></h6>
                            </div>
                        </div>
                        <!--<center><h3>Login</h3></center>-->
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Username</h6>
                            </div>
                            <div class="col-md-6">    
                                <h6><?php echo $custdt->username;?></h6>
                            </div>
                            <div class="col-md-6">
                                <h6>Password</h6>
                            </div>
                            <div class="col-md-6">    
                                <h6><?php echo $custdt->password;?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
   
   
							 <?php
                                         }
                                         else{ ?>
                                         <h1 style="text-align:center; color:red; margin-top:80px;">Currently Your Account Is Inactive Please Contact Admin To Activate Your Account</h1>
 
                                     <?php     }
                                       ?>

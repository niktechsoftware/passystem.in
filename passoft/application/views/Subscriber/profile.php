<?php 
// echo "<h1>dsfdfdfdsd</h1>";
// print_r($sub_data1);
//  exit;
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Subscriber Full Profile</h4>
			</div>
			<div class="panel-body">
			
			    <div class="col-md-12">
			        <div class="alert alert-info">
		                <button data-dismiss="alert" class="close"></button>
		                <h3 class="media-heading text-center" style="text-align:center">Welcome to Profile View Area</h3>
		                <p style="text-align:center;margin-top:20px;margin-bottom:20px;">In this area you can see your profile and update your profile.</p>
        		    </div>

					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
					</div>
					
				</div>
                <?php if($this->uri->segment(3)==5){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Profile Image is Successfully Done!!!!!
							</div>
                <?php }elseif($this->uri->segment(3)==6){?> 
                    <div class="successHandler alert alert-danger">
								<i class="fa fa-ok"></i> Profile Image is Not Successfully Done!!!!!
							</div>
                 <?php }?>
                 <?php if($this->uri->segment(3)==1){?>
							<div class="successHandler alert alert-success">
								<i class="fa fa-ok"></i> Successfully Done!!!!!
							</div>
                <?php }elseif($this->uri->segment(3)==2){?> 
                    <div class="successHandler alert alert-danger">
								<i class="fa fa-ok"></i> Update Not Successfully Done!!!!!
							</div>
                 <?php }?>
                <?php 
                //print_r($sub_data); exit;
                if($sub_data->num_rows()>0){
                        $data=$sub_data->row();
                
                ?>
	        	<!-- <form action="<?php// echo base_url();?>index.php/branchController/saveBranch"  method ="post" role="form" id="form"> -->
                <div class =container>
                <div class="row"> 
                    <div class="col-md-2">
                        <?php if(strlen($data->image)>0){ ?>
                        <img class="zoom1" width="150px" height="200px" src="<?php echo $this->config->item('asset_url');?>/images/subscriber/<?php echo $data->image; ?>">
                        <?php } else {?> <img class="zoom1" width="150px" height="200px" src="<?php echo $this->config->item('asset_url');?>/images/userlogo.png"> <?php } ?>
                        <div style="margin:10px;">
                            <form method="post" action="<?php echo base_url();?>subscriberController/uploadProfile_img" enctype="multipart/form-data" >
                                <div style="margin:5px;"><input type="file" name="upload_img" required /></div>
                                <div style="margin:5px;"><input type="submit" name="upload_img_bt" class="btn btn-primary" value="Update Your Image"/></div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-md-10">
                    <div class="col-md-12 space20">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Name
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->name;?>
                                </div>
                            </div>
                            
                         
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        Father Name 
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->father_name;?>
                                </div>
                            </div> 
                             <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Mobile Number
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->mobile;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        Email Id
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->email;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Address 
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->address;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        Pin Code 
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->pin;?>
                                </div>
                            </div>
                            <br><br>
                           
                             <div class="col-md-6" style="padding:1%">
                                <div class="col-md-6">
                                Sub Branch Name
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                    $this->db->where("id" ,$data->sub_branchid);
                                   $dt= $this->db->get("sub_branch")->row();
                                   echo $dt->bname;
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        State 
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->state;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                Aadhar Number
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->adhar;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        Pan Number
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->pan;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                Gender
                                </div>
                                <div class="col-md-6">
                                <?php if($data->gender==1){ echo "Male"; } elseif($data->gender==0){ echo "Female";} else {echo "Third Gender";}?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        Pass Branch Name
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                    $this->db->where("id" ,$data->district);
                                   $dt= $this->db->get("branch")->row();
                                   echo $dt->b_name;
                                    ?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                1 Nominee Name
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom1;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    1 Nominee Aadhar No.
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom_ad1;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                1 Nominee Relation
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom_rel1;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                        2 Nominee Name
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom2;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                2 Nominee Aadhar No.
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom_ad2;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    2 Nominee Relation
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->nom_rel2;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                UserName
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->username;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Password
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->password;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Branch Name
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->branch_name;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    Joiner Id
                                </div>
                                <div class="col-md-6">
                                <?php if($data->parentID==0){ echo "NO JOINER"; } else { echo $data->parentID; }?>
                                </div>
                            </div>
                            <br><br>
                            <!--<div class="col-md-6">-->
                            <!--    <div class="col-md-6">-->
                            <!--    Image-->
                            <!--    </div>-->
                            <!--    <div class="col-md-6">-->
                            <!--    <?php //if(strlen($data->image)>0){?> <img width="50px" height="50px" src="<?php //echo $this->config->item('asset_url');?>/images/subscriber/<?php //echo $data->image;?>"> <?php // } else { echo "Image Not Found";} ?>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-md-6">
                                <div class="col-md-6">
                                Bank Name
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->bank_name;?>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                Account Number
                                </div>
                                <div class="col-md-6">
                                    <?php echo $data->account_no;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    IFSC Code
                                </div>
                                <div class="col-md-6">
                                <?php echo $data->ifsc;?>
                                </div>
                            </div>

                    <?php } 
                     ?>
                        </div>
                    </div>
                        
                </div>
                </div>
                
                <div><center><a class="btn btn-primary" href="<?php echo base_url();?>index.php/subscriberController/editProfile">Edit Your Profile</a></center></div>
            </div>
        </div>
    </div>
</div>
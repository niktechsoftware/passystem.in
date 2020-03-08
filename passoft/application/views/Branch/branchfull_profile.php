<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light">
                <h4 class="panel-title">Branch Full Profile </h4>
            </div>
            <div class="panel-body">
            
            <div class="col-md-12">
            <div class="alert alert-info">
                  <button data-dismiss="alert" class="close"></button>
                  <h3 class="media-heading text-center">Welcome In Branch Full Profile  Section</h3>
                You can see your full profile. If you want edit your prifile then click on Edit Button...
                Note: image should be less than 50 kb.
                </div>
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                            </div>
                            <?php if($this->uri->segment(3)==5){?>
                            <div class="successHandler alert alert-success">
                                <i class="fa fa-ok"></i> Branch Profile is Successfully Updated!!!!!
                            </div>
                            <?php }?>
                        </div>
                         <?php 
                if($unm->num_rows()>0){
                    $row= $unm->row();?>
                <form action="<?php echo base_url();?>index.php/branchController/updateBranch/<?php echo $row->id;?>"  method ="post" role="form" id="form" enctype="multipart/form-data">
            
                     <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">
                            <div class="col-md-12"> 
                <?php if(strlen($row->image)>0) { ?>
                 <img src="<?php echo $this->config->item('asset_url'); ?>/images/branch/<?php echo $row->image;?>" style="width:100px;height:90px;"> <?php } 
                 else { ?> <img src="<?php echo $this->config->item('asset_url'); ?>/images/userlogo.png" style="width:100px;height:90px;"> <?php } ?>
                                <input type="file" name="image">
                                <span style="color:brown";>Image size is less than 50 kb</span>
                               </div>
                        </div>           
                    </div>   
                </div>
                <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">

                            <div class="col-md-4">
                                 Branch Name<span class="symbol required"></div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control"  name="b_name" minlength="6" maxlength="30" style="text-transform:uppercase" required="required" value="<?php echo $row->b_name;?>" readonly="readonly"/>
                                </div>
                        </div>
                        <div class="col-md-6">
                             <div class="col-md-4">
                                Owner Name<span class="symbol required">
                            </div>
                            <div class="col-md-8">
                                <input type="text"  class="form-control"  name="name"  minlength="6" maxlength="30" style="text-transform:uppercase" required="required" value="<?php echo $row->name;?>" readonly="readonly"/>
                                </div>
                        </div>               
                    </div>   
                </div>
                <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">
                            <div class="col-md-4">
                                 Mobile Number<span class="symbol required"></div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control" name="mob_no" pattern="^[6-9]\d{9}$"  required="required" value="<?php echo $row->mobile;?>" readonly="readonly"/>
                                </div>
                        </div>
                        <div class="col-md-6">
                             <div class="col-md-4">
                                 Aadhaar Number<span class="symbol required">
                            </div>
                            <div class="col-md-8">
                                <input type="text" data-type="adhaar-number" class="form-control" name="aadhar" minlength="14" maxlength="14" required ="required" value="<?php echo $row->aadhar;?>" readonly="readonly"/>
                            </div>
                        </div>               
                    </div>   
                </div>
                <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">
                            <div class="col-md-4">
                                 District<span class="symbol required"></div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control" name="district"  required="required" value="<?php echo $row->district;?>" readonly="readonly" onkeypress="return isalphabate(event)" style="text-transform:uppercase"/>
                                </div>
                        </div>
                        <div class="col-md-6">
                             <div class="col-md-4">
                                 E-mail
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email"  value="<?php echo $row->email_id;?>"/>
                            </div>
                        </div>               
                    </div>   
                </div>
                <div class="row"> 
                     <div class="col-md-12 space20">
                        <div class="col-md-6">
                             <div class="col-md-4">
                                 Username<span class="symbol required">
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" value="<?php echo $row->username;?>" readonly=""/>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="col-md-4">
                                 Password<span class="symbol required"></div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control" name="password"  required="required"  value="<?php echo $row->password;?>"/>
                                </div>
                        </div>
                                       
                    </div>   
                </div>
                <div class="row"> 
                     <div class="col-md-12 space20">
                        <div class="col-md-6">
                             <div class="col-md-4">
                                 Bank Name
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bankname" value="<?php echo $row->bank_name;?>" onkeypress="return isalphabate(event)" style="text-transform:uppercase"/>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="col-md-4">
                                 Account No. </div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control" name="acc_no"    value="<?php echo $row->account_no;?>" onkeypress="return isNumber(event)"/>
                                </div>
                        </div>
                                       
                    </div>   
                </div>
                 <div class="row"> 
                     <div class="col-md-12 space20">
                        <div class="col-md-6">
                             <div class="col-md-4">
                                 Branch Name
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="branchName" value="<?php echo $row->branch_name;?>" onkeypress="return isalphabate(event)" style="text-transform:uppercase"/>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="col-md-4">
                                 IFSC Code</div>
                                 <div class="col-md-8">
                                 <input type="text"  class="form-control" name="ifsc"   value="<?php echo $row->ifsc;?>" style="text-transform:uppercase"/>
                                </div>
                        </div>
                                       
                    </div>   
                </div>
                    <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">
                            <div class="col-md-4">
                                </div>
                                 <div class="col-md-8">
                                 </div>
                        </div>
                        <div class="col-md-6">
                             <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class= "btn btn-success" id="subbutton">Update Branch</button>
                            </div>
                        </div>               
                    </div>   
                </div>
           
            </form>
             <?php }?>
            </div>
          </div>
         </div> 
    </div>       
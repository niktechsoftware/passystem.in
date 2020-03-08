<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <!--<h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">View Complain </h3>-->
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/auth/complainSave" >
                   <div class="row">
                   <?php
                   // print_r($view);exit();
                   if($view->num_rows>0){
                       $row=$view->row();?>
                        <div class="col-md-12">
                        <div class="form-group">
                           <div class="row">
                                <div class="col-md-4">
                                <label for="name">Complain Person <span style="color:red"> * </span></label> 
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                    $this->db->where('username',$row->sub_ID);
                                    $cc = $this->db->get('customers');
                                    if($cc->num_rows()>0)
                                    {
                                        $dtt= $cc->row();
                                    }
                                    else
                                    {
                                        $this->db->where('username',$row->sub_ID);
                                        $cc = $this->db->get('employee');
                                        if($cc->num_rows()>0)
                                        {
                                            $dtt= $cc->row();
                                        }
                                        else
                                        {
                                            echo "N/A";
                                        }
                                    }
                                    ?>
                               <input type="text" name="c_type" value="<?php echo  $dtt->name; ?>" class="form-control"/>
                              <span class="form-bar" id="valid"></span>
                                </div>
                           </div>
                        </div>
                      <!--   <div class="form-group">
                           <div class="row">
                                <div class="col-md-4">
                                <div class="col-md-12">
                                <div class="form-group" id="p_member_id">
                            <label for="name">Pass Member ID <span style="color:red"> * </span></label> 
                            <input type="text" name="pmember_id" id="pmember_id"  class="form-control" style="text-transform:uppercase"
                            onchange="aoName()" value="<?php echo $row->complain_id;?>">
                              <span class="form-bar" id="valid"></span>
                        </div>
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_name">
                                                <label for="name"> Name <span style="color:red"> * </span></label> 
                                                <input type="text" name="name" id="name"  class="form-control" style="text-transform:uppercase"
                                                onchange="aoName()" value="<?php echo $row->name;?>" >
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_mobile">
                                                <label for="name"> Mobile <span style="color:red"> * </span></label> 
                                                <input type="text" name="contactno" id="contactno"  class="form-control" style="text-transform:uppercase"
                                                onchange="isNumber()"  value="<?php echo $row->mobile;?>">
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_address">
                                                <label for="name"> Address <span style="color:red"> * </span></label> 
                                                <input type="text" name="address" id="address"  class="form-control" style="text-transform:uppercase"
                                                onchange="isalphabate()" value="<?php echo $row->address;?>">
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>
                                </div>
                           </div>
                        </div>
                        </div> -->
                        <div class="form-group">
                           <div class="row">
                                <div class="col-md-4">
                                <label for="name">Complain Message<span style="color:red"> * </span></label> 
                                </div>
                                <div class="col-md-8">
                                <textarea type="text" name="complain_msg" id="complain_msg"  class="form-control" style="text-transform:uppercase"
                            onchange="aoName()" required=""><?php echo $row->message;?></textarea>
                              <span class="form-bar" id="valid"></span>
                                </div>
                           </div>
                        </div> 
                        <div class="form-group">
                           <div class="row">
                                <div class="col-md-4">
                                <label for="name"> Solution</label> 
                                </div>
                                <div class="col-md-8">

                                  <?php if(($row->status) == 1) { ?>
                                  <textarea class="form-control" style="text-transform:uppercase" ><?php echo $row->solution; } else { echo "Please Wait For Response"; } ?></textarea>
                              <!--<input type="text" name="solution" value="<?php //echo $row->solution; ?>">-->
                              <?php //} else{ ?><?php //echo "Please Wait For Response";
                              //} ?>

                              <span class="form-bar" id="valid"></span>
                                </div>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <button class="btn btn-solid btn-success" id="subbutton" type ="submit">Register now</button> &emsp;&emsp;<input type="checkbox" required title="Please Accept Terms and Conditions" /> I accept the  <a href="<?php echo base_url()?>index.php/auth/termCondition"><span style="color:blue;">Terms & Conditions</span></a> </p></center> 
                      </div>
                     </div>
                  <div class="row">
                  <div class="col-md-12">
                    <center><p class="text-inverse  link_css"><a href="<?php echo base_url();?>"><b class="f-w-600">Back to  website</b> </a>, Already user <a href="<?php echo base_url();?>index.php/auth/signin"> <b> Login Panel</b> </a></center>
                    </p>
                  </div>
                </div>
                     </div> -->
<?php }?>
                   </div>
                  </form>
                </div>
               
            </div>
        </div>
    </div>

</section>
<!--Section ends-->


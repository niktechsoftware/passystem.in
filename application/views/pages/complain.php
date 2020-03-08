<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php $uri = $this->uri->segment(3);
                if($uri==1)
                { ?>
                    <div> <p style="color:green;">Submit Successfully.</p></div>
                <?php }
                elseif($uri==2)
                { ?>
                     <div> <p style="color:red;">Please Enter Correct UserID and Password.</p></div>
               <?php }
                ?>
              <h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">Complain Registration</h3>
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/auth/complainSave" >
                   <div class="row">
                        <div class="col-md-12">
                        <!--<div class="form-group">-->
                        <!--   <div class="row">-->
                        <!--        <div class="col-md-4">-->
                        <!--        <label for="name">Complain Person <span style="color:red"> * </span></label> -->
                        <!--        </div>-->
                        <!--        <div class="col-md-8">-->
                                <!--<select name="c_type" class="form-control" id="c_type">-->
                                <!--    <option value="">Select<option>-->
                                <!--    <option value="pass member">Pass Member<option>-->
                                <!--</select>-->
                        <!--      <span class="form-bar" id="valid"></span>-->
                        <!--        </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                        <!--   <div class="row">-->
                        <!--        <div class="col-md-4">-->
                        <!--        <div class="col-md-12">-->
                        <!--        <div class="form-group" id="p_member_id">-->
                        <!--    <label for="name">Pass Member ID <span style="color:red"> * </span></label> -->
                        <!--    <input type="text" name="pmember_id" id="pmember_id"  class="form-control" style="text-transform:uppercase"-->
                        <!--    onchange="aoName()">-->
                        <!--      <span class="form-bar" id="valid1"></span>-->
                        <!--    </div>-->
                        <!--        </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-md-8">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-md-4">-->
                        <!--                <div class="form-group" id="p_name">-->
                        <!--                        <label for="name"> Name <span style="color:red"> * </span></label> -->
                        <!--                        <input type="text" name="name" id="name"  class="form-control" style="text-transform:uppercase"-->
                        <!--                        onchange="aoName()"  >-->
                        <!--                        <span class="form-bar" id="valid"></span>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-4">-->
                        <!--                <div class="form-group" id="p_mobile">-->
                        <!--                        <label for="name"> Mobile <span style="color:red"> * </span></label> -->
                        <!--                        <input type="text" name="contactno" id="contactno"  class="form-control" style="text-transform:uppercase"-->
                        <!--                        onchange="isNumber()"  >-->
                        <!--                        <span class="form-bar" id="valid"></span>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-4">-->
                        <!--                <div class="form-group" id="p_address">-->
                        <!--                        <label for="name"> Address <span style="color:red"> * </span></label> -->
                        <!--                        <input type="text" name="address" id="address"  class="form-control" style="text-transform:uppercase"-->
                        <!--                        onchange="isalphabate()" >-->
                        <!--                        <span class="form-bar" id="valid"></span>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--        </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--</div>-->
                         <div class="form-group">
                           <div class="row">
                                <div class="col-md-6">
                                <label for="name">UserID<span style="color:red"> * </span></label>
                                <input type="text" name="userid" class="form-control" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Password<span style="color:red"> * </span></label> 
                                    <input type="password" name="pass" class="form-control" required />
                              <!--<span class="form-bar" id="valid"></span>-->

                                </div>
                                <div class="col-md-8" id="nameValue">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_name">
                                                <label for="name"> Name <span style="color:red"> * </span></label> 
                                                <input type="text" name="name" id="name"  class="form-control" style="text-transform:uppercase"
                                                onchange="aoName()"  >
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_mobile">
                                                <label for="name"> Mobile <span style="color:red"> * </span></label> 
                                                <input type="text" name="contactno" id="contactno"  class="form-control" style="text-transform:uppercase"
                                                onchange="isNumber()"  >
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group" id="p_address">
                                                <label for="name"> Address <span style="color:red"> * </span></label> 
                                                <input type="text" name="address" id="address"  class="form-control" style="text-transform:uppercase"
                                                onchange="isalphabate()" >
                                                <span class="form-bar" id="valid"></span>
                                            </div>
                                        </div>

                                </div>
                           </div>
                        </div> 
                        <div class="form-group" style="margin-top:10px;">
                           <div class="row">
                                <div class="col-md-4">
                                <label for="name">Complain Message<span style="color:red"> * </span></label> 
                                </div>
                                <div class="col-md-8">
                                <textarea type="text" name="complain_msg" id="complain_msg"  class="form-control" required="" ></textarea>
                              <span class="form-bar" id="valid"></span>
                                </div>
                           </div>
                        </div> 
                        <div class="form-group">
                           <div class="row">
                                <div class="col-md-4">
                                <label for="name">Upload Complain Image</label> 
                                <!--<span style="color:red"> max-size: 50kb </span>-->
                                </div>
                                <div class="col-md-8">
                               <input type="file" name="image" class="form-control"/>
                                <span style="color:red"> max-size: 50kb </span>
                              <!--<span class="form-bar" id="valid"></span>-->
                                </div>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <button class="btn btn-solid btn-success" id="subbutton" type ="submit">Submit</button>
                      </div>
                     </div>
                  <div class="row">
                  <div class="col-md-12">
                    <center><p class="text-inverse  link_css"><a href="<?php echo base_url();?>"><b class="f-w-600">Back to  website</b> </a>, Already user <a href="<?php echo base_url();?>index.php/auth/signin"> <b> Login Panel</b> </a></center>
                    </p>
                  </div>
                </div>
                     </div>
                
                   </div>
                  </form>
                </div>
               
            </div>
        </div>
    </div>

</section>
<!--Section ends-->


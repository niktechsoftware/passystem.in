
<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="padding-top: 50px;">
              <h3 style=" color: rgb(242, 0, 137);" class="text-center">Subscriber Registration</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" action="<?php echo base_url();?>index.php/auth/customer_value">
                   <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Upline Username like PSU1C201,PSU1C202 :</label> 
                            <input type="text"  id="joinerid" name="joinerid" class="form-control" required=""  onkeyup="this.value = this.value.toUpperCase();" placeholder="Upline Username like PSU1C201, PSU1C202 ">
                            <span class="form-bar" id="message1"></span>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Upline Password :</label> 
                            <input type="password"  id="joinerpass" name="joinerpass" class="form-control" required=""  onkeyup="this.value = this.value.toUpperCase();" placeholder="Upline Password ">
                            <span class="form-bar" id="message1"></span>
                        </div>
                        </div>
                      </div>
                        <div class="row" id="aarju">
                        <div class="col-lg-12">
                          
                        </div>
                      </div>
                      <div class="row">
                  <div class="col-md-12">
                    <center><p class="text-inverse  link_css"><a href="<?php echo base_url();?>"><b class="f-w-600">Back to  website</b> </a>, Already user <a href="<?php echo base_url();?>index.php/auth/signin"> <b> Login Panel</b> </a></center>
                    </p>
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


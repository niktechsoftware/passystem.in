<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">Track Your Order</h3>
              <?php if($this->uri->segment(3)==5)
              { ?>
                  <div style="background-color:white"> <label style="color:red;">please enter correct Order No.</label></div>
             <?php }
              ?>
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/auth/gps_order" >
                   <!--<div class="row">-->
                        <!--<div class="col-md-12">-->
                         <!--<div class="col-md-6">-->
                        <div class="row">
                            <div class="col-md-6"> <label style="float:right; font-size:16px;" for="name">Order NO.<span style="color:red"> * </span></label> </div>
                            <div class="col-md-6"> <input type="text" id="orderid" name="orderid" style="width:500px; margin-top:0px; margin-bottom:10px;" placeholder="Enter Your Order number" class="form-control"/></div>
                        </div>
                        <!--</div>-->
                     <div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <button class="btn btn-solid btn-success" id="subbutton" type ="submit">Submit</button></center>
                      </div>
                     </div>
                  <div class="row">
                  <div class="col-md-12">
                    <center><p class="text-inverse  link_css"><a href="<?php echo base_url();?>"><b class="f-w-600">Back to  website</b> </a>, Already user <a href="<?php echo base_url();?>index.php/auth/signin"> <b> Login Panel</b> </a></center>
                    </p>
                  </div>
                </div>
                     </div>
                
                   <!--</div>-->
                  </form>
                <!--</div>-->
               
            </div>
        </div>
    </div>

</section>
<!--Section ends-->


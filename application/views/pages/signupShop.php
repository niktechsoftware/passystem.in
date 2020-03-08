
  <section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 class="text-center" style=" color: rgb(242, 0, 137);">Sub Branch Registration</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" action="<?php echo base_url();?>index.php/auth/subbranch_value">
                      
                       <div class="row">
                     <div class="col-md-6">
                        
                      
                      <?php $dt= $this->db->get("branch")->result();?>
                         <div class="form-group">
                            <label for="review">CHOOSE BRANCH:<span style="color:red">*</span></label>
                               <select name="district"  class="form-control" required  style="margin-left:0px;">
                                <option value="" selected="" >--Choose Branch(District)--</option>
                                <?php foreach($dt as $row):  ?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->district;?></option>
                                <?php endforeach ;?>
                              </select>
                              <span class="form-bar"></span>
                        </div>
                      
                     </div>
                     
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">SUB BRANCH NAME :<span style="color:red">*</span></label> 
                           <input type="text" name="bname" id="name" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerName()" required="" >
                             <span class="form-bar"></span>
                        </div></div>
                    </div>
                      
                   <div class="row">
                    
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">OWNER NAME :<span style="color:red">*</span></label> 
                           <input type="text" name="ownername" id="fname" class="form-control" style="text-transform:uppercase"
			        onchange="fatherName()"  required="" >
                            <span class="form-bar"></span>
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">MOBILE NUMBER :<span style="color:red">*</span></label>
                             <input  type="text" id="contactno" name="mobile" class="form-control" style="text-transform:uppercase"
			          onkeypress="return isNumber(event)" required="" maxlength="10" minlength="10">
                         <span class="form-bar" id="messageno"></span>
						</div></div>
                        </div>
                        
                           <div class="row">
                     <div class="col-md-6">
                    
                         <div class="form-group">
                            <label for="review">ADDRESS :<span style="color:red">*</span></label>
                             <input type="text" name="address" id="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase" required="">
                                <span class="form-bar"></span>
                        </div></div>
                         <div class="col-md-6">
                    
                        <div class="form-group">
                            <label for="review">STREET :<span style="color:red">*</span></label>
                              <input type="text" name="street" id="customerstate" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerState()" required="" >
                                 <span class="form-bar"></span>
                        </div></div></div>
                      
					<div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">YOUR CITY :<span style="color:red">*</span></label>
                             <input type="text" name="city" id="city" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerCity()" required="">
                                <span class="form-bar"></span>
                        </div></div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">PINCODE :<span style="color:red">*</span></label>
                               <input type="text" name="pin"  pattern="^[2-9]\d{5}$" class="form-control" maxlength="6" minlength="6"  onkeypress="return isNumber(event)" required="" >
                              <span class="form-bar"></span>
                        </div></div></div>
                        
                    <div class="row">
                        
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">PANCARD :<span style="color:red">*</span></label>

                               <input type="text" name="pan" class="form-control"  id="panNumber"   required="" maxlength="10" minlength="10" >
                        <span class="form-bar" id="messagepan"></span>

                        </div></div>
                        
                         <div class="col-md-6">
                   
                        
                        <div class="form-group">
                            <label for="review">AADHAR NUMBER :<span style="color:red">*</span></label>
                              <input type="text" name="aadhar" class="form-control" id="adhar" data-type="adhaar-number" onkeypress="return isNumber(event)"   onkeyup="this.value = this.value.toUpperCase();" maxlength="14" minlength="14" required="">
                  <span class="form-bar" id ="msgShop" style="color:red;"></span>
                        </div></div>
                        </div>
                        
                 
               
                 <div class="row">
                    
                         <div class="col-md-6">
                   
                        <div class="form-group">
                            <label for="review">GST NUMBER :<span style="color:red">*</span></label>
                               <input type="text" name="gst" class="form-control"   pattern="^[A-Z][1-0]\d{5}$" onkeyup="this.value = this.value.toUpperCase();" required=""  maxlength="15" minlength="15">
                                 <span class="form-bar"></span>
                        </div></div>
                        
                        <div class="col-md-6">
                   
                        
                         <div class="form-group">
                            <label for="review">PASSWORD :<span style="color:red">*</span></label>
                               <input type="password" id="password"  name="password" class="form-control" required=""
                        placeholder="Password">
                      <span class="form-bar"></span>
                        </div>
                     </div>
                        </div>
                         <div class="row">
                     
                       <div class="col-md-6">
                   
                       <div class="form-group">
                            <label for="review">CONFIRM PASSWORD :<span style="color:red">*</span></label>
                                <input type="password" id="conformpassword"  onkeyup="this.value = this.value.toUpperCase();" name="" class="form-control" required=""
                        placeholder="Confirm Password">
                      <span class="form-bar" id="message"></span>
                        </div></div>
                     
                     </div>
                     
                      
 
                     <div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <input class="btn btn-solid btn-success " id="subbutton" type ="submit" value="Sign up now"/> &emsp;&emsp;<input type="checkbox" required title="Please Accept Terms and Conditions" /> I accept the  <a href="<?php echo base_url()?>index.php/auth/termCondition"><span style="color:blue;">Terms & Conditions</span></a> </p></center> 
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

</section>
<!--Section ends-->


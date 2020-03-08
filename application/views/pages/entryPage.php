<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">Entry Page Registration</h3>
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" action="<?php echo base_url();?>index.php/auth/entry_value">
                   <div class="row">
                     <div class="col-md-6">
                     <div class="form-group">
                            <label for="name">Advising Officer Name <span style="color:red"> * </span></label> 
                            <input type="text" name="ao_name" id="ao_name"  class="form-control" style="text-transform:uppercase"
                            onchange="aoName()" required="" >
                              <span class="form-bar" id="valid"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Date Of Advising <span style="color:red"> * </span></label> 
                            <input type="date" name="date"  class="form-control" style="text-transform:uppercase"
			         required="" >
                              <span class="form-bar" id="valid"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Visitor Name <span style="color:red"> * </span></label> 
                            <input type="text" name="vname" id="vname"   onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			        onkeyup="vName()" required="" >
                              <span class="form-bar" id="valid"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Address Where to speach <span style="color:red"> * </span></label> 
                            <textarea class="form-control" name="address"  onkeypress="return isalphabate(event)" required="" ></textarea>
                              <span class="form-bar" id="valid"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                            <label for="name"> Contact Number <span style="color:red"> * </span></label> 
                            <input type="text" pattern="^[6-9]\d{9}$"  id="contactno" name="contactno" onkeypress="return isNumber(event)" maxlength="109" name="mob_no" class="form-control" required>
                             <span class="form-bar" id="messageno"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Present /Absent <span style="color:red"> * </span></label> 
                            <input type="text" name="presentAbsent" id="presentAbsent"   class="form-control" style="text-transform:uppercase"
			     required="" >
                              <span class="form-bar" id="valid"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Feed Back</label> 
                            <textarea  name="feedback" id="feedback"   onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			        onkeyup="fatherName()" ></textarea>
                              <span class="form-bar" id="valid"></span>
                        </div>
                     </div>
                  
                     </div>
                     <div class="container">
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
                     </div>
                
                   </div>
                  </form>
                </div>
               
            </div>
        </div>
    </div>

</section>
<!--Section ends-->


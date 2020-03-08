  <section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="padding-top:50px;">
              <h3 class="text-center" style=" color: rgb(242, 0, 137);">Delivery Incharge Registration</h3>
                <!--<?php if($this->uri->segment(3)){
                //echo "Success";
                }?>--> 
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" action="<?php echo base_url();?>index.php/auth/deliverBoy_value">
                   <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> NAME :<span style="color:red;">*</span></label> 
                           <input type="text" name="d_name" id="name" class="form-control" style="text-transform:uppercase"
                    onchnage="customerName()" required="" >
                            <span class="form-bar"></span>
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">FATHER NAME :<span style="color:red;">*</span></label> 
                            <input type="text" name="fname" id="fname" class="form-control" style="text-transform:uppercase"
			        onchange="fatherName()" required="">
                              <span class="form-bar"></span>
                        </div></div>
                         </div>
                        <div class="row">
                     <div class="col-md-6">
                    
                        <div class="form-group">
                            <label for="review">EMAIL :<span style="color:red;">*</span></label>
                             <input type="text" name="email" id="email" onkeyup="emailId()" class="form-control"  required>
                             <span id="emailID" style="color:red;" class="form-bar"></span>
                        </div></div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">MOBILE NUMBER :<span style="color:red;">*</span></label>
                            <input type="text" pattern="^[6-9]\d{9}$" onkeypress="return isNumber(event)" id="contactno" maxlength="10" name="mob_no" class="form-control" required>
                             <span class="form-bar" id="messageno"></span>
                        </div></div>
                        </div>
                         <div class="row">
                       
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">DATE OF BIRTH:<span style="color:red;">*</span></label>
                            <input type="date" name="dob" id="date-input"  onchange="getObject();" class="form-control" required="" >
                            <span class="form-bar" id="valid"> </span>
                        </div></div>
                        
                        <div class="col-md-6">
                     
                         <div class="form-group">
                            <label for="name">ADDRESS :<span style="color:red;">*</span></label> 
                            <input  type="text" id="address" style="text-transform:uppercase" onkeyup="stuAddress()" name="address" class="form-control" required="" />
                          
                             <span class="form-bar"></span>
                        </div></div>
                        
                        
                        
                        
                       
                      
                     </div>
                     <div class="row">
                         
                          <div class="col-md-6">
                         <div class="form-group">
                            <label for="name">PINCODE :<span style="color:red;">*</span></label> 
                            <input type="text" id="pincode" name="pincode" class="form-control" onkeypress="return isNumber(event)" pattern="^[2-9]\d{5}$" required="" maxlength="6" minlength="6">
                             <span class="form-bar"></span>
                        </div></div>
                        
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">STATE:<span style="color:red;">*</span></label>
                            <input type="text" name="state" id="customerstate" class="form-control"style="text-transform:uppercase"
                    onkeyup="customerState()" value="UTTER PRADESH" required>
                             <span class="form-bar" id="messagee"></span>
                        </div></div>
                        
                        
                        
                        
                        </div>
                        <div class="row">
                    
                        
                        
                         
                          <div class="col-md-6">
                      
                        <div class="form-group">
                            <label for="name">COUNTRY :</label> 
                            <input type="text" id="country" name="country" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerCity()" required="" value="INDIA">
                             <span class="form-bar"></span>
                        </div></div>
                        
                         <div class="col-md-6">
                      
                         <div class="form-group">
                            <label for="review">AADHAR NUMBER :<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" data-type="adhaar-number" id="aadhar" onkeypress="return isNumber(event)" minlength="14" maxlength="14" name="aadhar" required >
                            <span class="form-bar" id="aadhardeli"style="color:red;"></span>
                        </div></div>
                        
                    
                        
                         
                        
                        </div>
                        
                          <div class="row">
                              
                                <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">PASSWORD :<span style="color:red;">*</span></label> 
                            <input type="password" id="password" style="text-transform:uppercase" name="password" class="form-control" required="" >
                             <span class="form-bar"></span>
                        </div></div>
                        
                     
                        <div class="col-md-6">
                     
                       <div class="form-group">
                            <label for="review">CONFIRM PASSWORD :</label>
                             <input type="password" id="conformpassword" name="" class="form-control" required="" >
                            <span class="form-bar" id="message"></span>
                        </div>
                        </div>
                       
                       
                     </div>
                     <div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <button class="btn btn-solid btn-success" id="subbutton" type ="submit">Sign up now</button> &emsp;&emsp;<input type="checkbox" required title="Please Accept Terms and Conditions" /> I accept the  <a href="<?php echo base_url()?>index.php/auth/termCondition"><span style="color:blue;">Terms & Conditions</span></a> </p></center> 
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
<script>

    function getObject(object)
{
  var date = new Date($('#date-input').val());
  var now = new Date();
  
     if (now.getFullYear() - date.getFullYear() < 18) {
    $('#valid').html('Not Valid Age').css('color', 'red');
        return false;
    }
    if (now.getFullYear() - date.getFullYear() == 18) {
       if (dtCurrent.getMonth() < dtDOB.getMonth()) {
      $('#valid').html('Not Valid Age').css('color', 'red');
         return false;
        }
     if (dtCurrent.getMonth() == dtDOB.getMonth()) {
      if (dtCurrent.getDate() < dtDOB.getDate()) {
     $('#valid').html('Not Valid Age').css('color', 'red');
       return false;
        } }   }
   $('#valid').html('Valid Age').css('color', 'green');    
    return true;
 } 
    
    
</script>

</section>
<!--Section ends-->

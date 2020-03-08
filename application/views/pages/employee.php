  <section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">Employee Registration</h3>
                <div class="theme-card" style="margin-top:40px;">
                  <form method="post" action="<?php echo base_url();?>index.php/auth/employee_value">
                   <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">EMPLOYEE NAME <span style="color:red"> * </span></label> 
                           <input type="text" name="e_name" id="name" class="form-control"  style="text-transform:uppercase"
                    onkeyup="customerName()"  onkeypress="return isalphabate(event)" required="" >
                            <span class="form-bar"></span>
                        </div>
                        </div>
                        
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">FATHER NAME <span style="color:red"> * </span></label> 
                            <input type="text" name="fname" id="fname"  onkeypress="return isalphabate(event)" class="form-control" style="text-transform:uppercase"
			        onkeyup="fatherName()" required="" >
                              <span class="form-bar"></span>
                        </div>
                        
                        
                        
                        </div>
                         </div>
                        <div class="row">
                             <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">EMAIL <span style="color:red"> * </span></label>
                            <input type="text" name="email" id="email" onkeyup="emailId()" class="form-control"  required>
                             <span id="emailID" style="color:red;" class="form-bar"></span>
                        </div></div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">MOBILE NUMBER <span style="color:red"> * </span></label>
                            <input type="text" pattern="^[6-9]\d{9}$"  id="contactno" onkeypress="return isNumber(event)" maxlength="10" name="mob_no" class="form-control" required>
                             <span class="form-bar" id="messageno"></span>
                        </div></div>
                        
                         
                         </div></div>
                         
                          <div class="row">
                             <div class="col-md-6">
                       
                        <div class="form-group">
                            <label for="name">DATE OF BIRTH <span style="color:red"> * </span></label> 
                            <input type="date" name="dob" id="date-input"  onchange="getObject();" class="form-control" required="" >
                              <span class="form-bar" id="valid"></span>
                        </div></div>
                        
                         <div class="col-md-6">
                       
                         <div class="form-group">
                            <label for="name">ADDRESS <span style="color:red"> * </span></label> 
                            <input  type="text" id="address" name="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase" required="" >
                          
                             <span class="form-bar"></span>
                        </div></div>
                        </div>
                       
                         <div class="row">
                             <div class="col-md-6">
                       
                        <div class="form-group">
                            <label for="review">STATE <span style="color:red"> * </span></label>
                            <input type="text" name="state" id="customerstate" value="UP" class="form-control"style="text-transform:uppercase"
                               onkeyup="customerState()" required>
                             <span class="form-bar" id="messagee"></span>
                        </div></div>
                      
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="name">PINCODE <span style="color:red"> * </span></label> 
                            <input type="text" id="pincode" name="pincode" class="form-control" required="" onkeypress="return isNumber(event)" pattern="^[2-9]\d{5}$" maxlength="6" minlength="6">
                             <span class="form-bar"></span>
                        </div></div>
                      
                    </div>
                    
                     <div class="row">
                         
                          <div class="col-md-6">
                       
                        
                          <div class="form-group">
                            <label for="name">COUNTRY <span style="color:red"> * </span></label> 
                            <input type="text" id="country" name="country" value="India" class="form-control" style="text-transform:uppercase"
                    onkeyup="customerCity()" required="" >
                             <span class="form-bar"></span>
                        </div></div>
                            
                             <div class="col-md-6">
                                 
                       
                         <div class="form-group">
                            <label for="review">AADHAR NUMBER <span style="color:red"> * </span></label>
                            <input type="text" class="form-control" data-type="adhaar-number" id="aadhar" onkeypress="return isNumber(event)"  minlength="14" maxlength="14" name="aadhar" required >
                            <span class="form-bar" style="color:red" id="aadharmsg"></span>
                        </div></div>
                            
                         
                        
                         </div>
                        
                        
                        
                         <div class="row">
                            
                              <?php 
                                      
                                 $cat =$this->db->get("emp_type")->result();?>
                                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="review">EMPLOYEE TYPE <span style="color:red"> * </span></label>
                           <select  id="empidd" name="empid" class="form-control" style="margin-left:-2px;">
                            <option value=""> Select Employee Type</option>
                            <?php foreach($cat as $row):?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->type;?></option>
                            <?php endforeach;?>
                          </select>
                        </div></div>
                             <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">EMPLOYEE SUB TYPE <span style="color:red"> * </span> </label> 
                        <select name="sub_category" id="sub_category"  class="form-control">
                        </select>
                        </div></div>
                        
                      
                      
                      
                      </div>
                       
                        
                         <div class="row">
                             <div class="col-md-6">
                       
                         <div class="form-group">
                            <label for="name">PASSWORD <span style="color:red"> * </span></label> 
                            <input type="password" id="password" name="password" class="form-control" required="" >
                             <span class="form-bar"></span>
                        </div></div>
                        
                           <div class="col-md-6">
                       
                          <div class="form-group">
                            <label for="review">CONFIRM PASSWORD <span style="color:red"> * </span></label>
                             <input type="password" id="conformpassword" style="text-transform:uppercase" name="" class="form-control" required="" >
                            <span class="form-bar" id="message"></span>
                        </div></div>
                        
                        
                       
                       
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script>
          $("#empidd").change(function() {
            var classv = $("#empidd").val();
           // alert(classv);
            $.post("<?php echo site_url("auth/getsubtype1") ?>", {
              classv: classv
            }, function(data) {
              $("#sub_category").html(data);
             // alert("data");
            });

          });
          
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

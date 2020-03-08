<div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel">
                                                <div class="panel-heading panel-blue border-light">
                                                <center>  <h5 class="panel-title">Admin Profile Edit</h5></center>
                                                </div>
                                                <div class="panel-body">
                                                <?php 
                 $this->db->where("id",$unm);
                 $row= $this->db->get("general_settings")->row();
                  ?>
                   <div class="dt-responsive table-responsive">
            <form action="<?php echo base_url();?>adminController/admineditval/<?php echo $row->admin_username;?>" method="post" enctype="multipart/form-data" >
              <table id="h" class="table table-striped  nowrap">
              
                  <tr>
                    
                    <td><strong>Owner Name</strong></td>
                    <td><input type="text" name="name" onkeypress="return isalphabate(event)" required="" value="<?php echo $row->owner_name;?>"></td>
                     
                       <th><strong>Institute Name</strong></th>
                    <td><input type="text" name="institute" onkeypress="return isNumber(event)" required="" minlength="10" maxlength="10" value="<?php echo $row->institute_name;?>"></td>
                     
                </tr>
                <tr>
                    <th><strong>Mobile Number</strong></th>
                     <td><input type="text" name="mobile" required="" value="<?php echo $row->mobile_number;?>"></td>
                     
                        <th><strong>Email ID</strong></th>
                    <td><input type="text" name="email" onkeypress="return isNumber(event)" required="" minlength="12" maxlength="12" value="<?php echo $row->email1;?>"></td>
                      
                </tr>
                <tr>
                    <th><strong>Address</strong></th>
                    <td><input type="text" name="address" onkeypress="return isNumber(event)" minlength="10" maxlength="10" required="" value="<?php echo $row->address_1;?>"></td>
                      
                       <th><strong>City Name</strong></th>
                    <td><input type="text" name="city" value="<?php echo $row->city;?>"></td>
                      
                </tr>
               
              
                <tr>
                    <th><strong>State Name</strong></th>
                    <td><input type="text" name="state" required="" value="<?php echo $row->state;?>"></td>
                      
                       <th><strong>Pin Code</strong></th>
                    <td><input type="text" name="pin" required=""  value="<?php echo $row->pin;?>"></td>
                      
                </tr>

                <tr>
                    <th><strong>Username Name</strong></th>
                    <td><input type="text" name="usernm" required="" value="<?php echo $row->admin_username;?>"></td>
                      
                       <th><strong>Password</strong></th>
                    <td><input type="text" name="password" required=""  value="<?php echo $row->admin_password;?>"></td>
                      
                </tr>
            
                  <tr>
                    <th></th>
                    <td></td>
                      
                       <th></th>
                    <td><input type="submit" name="submit" class="btn btn-primary" value="Update Your Profile"></td>
                      <!--  <th><strong>Registration Fees</strong></th>
                    <td><input type="text" name="fname" value="<?php// echo $row->amount;?>"></td>
                       -->
                </tr>
              
                
                
                 
                  
                 
                
              </table>
              </form>
              </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                                            <script type="text/javascript">
      

function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;

}
$('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});

function isalphabate(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return true;
  }
  return false;

}
        </script>
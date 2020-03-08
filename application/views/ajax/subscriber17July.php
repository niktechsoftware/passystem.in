
<?php  if($view->num_rows()>0){
         $rw1=$view->row();
       $this->db->where("parentID",$rw1->id);
       $data= $this->db->get("tree");
      if($data->num_rows()<20){    ?>
             <div class="container">
		<div class="row">
			<div class="col-lg-6">
			    <div class="form-group">

       				 <label for="name">ID of A.O(Advising Officer) <span style="color:red;">*</span></label> 

<input type="hidden" value="<?php echo $rw1->username;?>" id="view" name="view">
                

     				 <input type="text" name="ao" id="ao" class="form-control" style="text-transform:uppercase; color:#09b37d;"
                    onchange="aoNo()" required="">
                 	 <span class="form-bar " style="color:red;" id="aomsg"></span>
  				 </div>
			    
				<div class="form-group">
       				 <label for="name">NAME :<span style="color:red;">*</span></label> 
     				 <input type="text" name="usernm" id="name" class="form-control" style="text-transform:uppercase; color:#09b37d;"
                    onchange="customerName()" required="">
                 	 <span class="form-bar"></span>
  				 </div>
             <div class="form-group">

              <label for="name"> FATHER'S/HUSBAND'S  NAME :<span style="color:red;">*</span></label> 

             <input type="text" name="f_name" id="fname" class="form-control" style="text-transform:uppercase; color:#09b37d;"
              onchange="fatherName()" required="" >
            <span class="form-bar"></span>
          </div>
          
                       <div class="form-group">

              <label for="name"> MOTHER'S/WIFE'S NAME :<span style="color:red;">*</span></label> 

             <input type="text" name="m_name" id="fname" class="form-control" style="text-transform:uppercase; color:#09b37d;"
              onchange="fatherName()" required="" >
            <span class="form-bar"></span>
          </div>
  				  <div class="form-group">
			        <label for="name"> MOBILE NUMBER:<span style="color:red;">*</span></label> 
			     	<input  type="text" id="contactno" name="mobile" class="form-control" style="color:#09b37d;"
			          onkeypress="return isNumber(event)" required="" maxlength="10" minlength="10">
			           <span class="form-bar" id="messageno"></span>
			    </div>
			    <div class="form-group">
			        <label for="name"> EMAIL ADDRESS:</label> 
			     	<input type="text" name="email" id="email" onkeyup="emailId()" class="form-control" style="color:#09b37d;" >
                  <span id="emailID" style="color:red;" class="form-bar"></span>

			    </div>
			    <div class="form-group">
			        <label for="name"> DATE OF BIRTH:<span style="color:red;">*</span></label> 
			     	<input type="date" name="dob" class="form-control"   id="date-input"  onchange="checkDOB();" style="color:#09b37d;" requried="" >
                  <!--<span id="emailID" style="color:red;" class="form-bar"></span>-->
                   <span id="age" style="color:red;" class="form-bar"></span>
			    </div>
			    <?php $dt= $this->db->get("branch")->result();?>

			   
          <div class="form-group">
              <label for="name"> GENDER:</label> 
             <select name="gender" class="form-control" require style="text-transform:uppercase; color:#09b37d;">
                    <option style="color:#09b37d;" value="" selected="">Choose Gender</option>
                    <option style="color:#09b37d;" value="1">Male</option>
                    <option style="color:#09b37d;" value="0">Female</option>
                    <option style="color:#09b37d;" value ="2">Others</option>
                  </select>
                  <span class="form-bar"></span>
          </div>
<!--<<<<<<< HEAD-->
          
<!--          <div class="form-group">-->
<!--              <label for="name"> AADHAR NUMBER :</label> -->
<!--            <input type="text" name="aadhar" class="form-control" style="color:#09b37d;" data-type="adhaar-number"  onkeypress="return isNumber(event)" style="text-transform:uppercase" minlength="14" maxlength="14" required=""-->
<!--=======-->
          <div class="form-group">
              <label for="name"> AADHAR NUMBER :<span style="color:red;">*</span></label> 
                <input type="text" class="form-control" style="color:#09b37d;" id="aadhar" data-type="adhaar-number" onkeypress="return isNumber(event)"  minlength="14" maxlength="14" name="aadhar" required >
                <span class="form-bar " style="color:red;" id="aadharmsg"></span>
          </div>
          
           <div class="form-group">
              <label for="name">YOUR ADDRESS:<span style="color:red;">*</span></label> 
            <input type="text" name="address" id="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase; color:#09b37d;" required="" >
                  <span class="form-bar"></span>
          </div>
          <div class="form-group">
              <label for="name">PERMANENT ADDRESS:<span style="color:red;">*</span></label> 
            <input type="text" name="pr_address" id="address" class="form-control" onkeyup="stuAddress()"
                    style="text-transform:uppercase; color:#09b37d;" required="" >
                  <span class="form-bar"></span>
          </div>
          <div class="form-group">
              <label for="name"> PAN NUMBER :</label> 
            <input type="text" id="panNumber" name="pan"   maxlength="10"  minlength="10" class="form-control" style="text-transform:uppercase; color:#09b37d;">
                  <span class="form-bar" id="messagepan"></span>

          </div>
          <div class="form-group">
			        <label for="name"> STATE:<span style="color:red;">*</span></label> 
			     	<input type="text" name="state" id="customerstate" class="form-control" value="UTTAR PRADESH" style="text-transform:uppercase; color:#09b37d;"
                    onkeyup="customerState()" required="">
                  <span class="form-bar"></span>
			    </div>
           

          <div class="form-group">
              <label for="name"> PIN CODE :<span style="color:red;">*</span></label> 

            <input type="text" name="pin" class="form-control" style="text-transform:uppercase; color:#09b37d;"
                    onkeypress="return isNumber(event)" maxlength="6" minlength="6" required="">
                  <span class="form-bar"></span>
          </div>

           
			</div>
			<div class="col-lg-6">

			    <div class="form-group">
              <label for="name"> Nominee Name 1 :</label> 
            <input type="text" name="nom1" class="form-control" style="text-transform:uppercase; color:#09b37d;"
                    onchange="nomName()" >
                  <span class="form-bar"></span>
          </div>
          <div class="form-group">

            <label for="name"> Nominee Aadhar 1</label>
             <input type="text" name="nom_ad1" class="form-control" id="aadhar2" data-type="adhaar-number"
                    onkeypress="return isNumber(event)" style="text-transform:uppercase; color:#09b37d;" minlength="14" maxlength="14" 

                   >
                  <span class="form-bar " style="color:red;" id="aadharmsg1"></span>
          </div>
          <div class="form-group">
            <label for="name">Nominee Relation 1</label>

             <input type="text" name="nom_rel1" class="form-control" style="text-transform:uppercase; color:#09b37d;"

                    onchange="customerName()" >
                  <span class="form-bar"></span>
          </div>
          <div class="form-group">
            <label for="name">Nominee Name 2 </label>
            <input type="text" name="nom2" class="form-control" style="text-transform:uppercase; color:#09b37d;"
                    onchange="nomName2()" >
                  <span class="form-bar"></span>
          </div>
           <div class="form-group">

            <label for="name"> Nominee Aadhar 2</label>
             <input type="text" name="nom_ad2" class="form-control " id="aadhar3" data-type="adhaar-number"
                    onkeypress="return isNumber(event)" style="text-transform:uppercase; color:#09b37d;" minlength="14" maxlength="14"

                   >
                  <span class="form-bar " style="color:red" id="aadharmsg2"></span>
          </div>
          <div class="form-group">
            <label for="name">Nominee Relation 2</label>

             <input type="text" name="nom_rel2" class="form-control" style="text-transform:uppercase; color:#09b37d;"

                    onchange="customerName()" >
                  <span class="form-bar"></span>
          </div>
          <div class="form-group">
              <label for="name">Choose Branch(District) :<span style="color:red;">*</span></label> 

             <select name="district"  id="branchid" style="text-transform:uppercase; color:#09b37d;" class="form-control" required>

                    <option style="color:#09b37d;" value="" selected="">Select</option>
                    <?php foreach($dt as $row):  ?>
                    <option style="color:#09b37d;" value="<?php echo $row->id;?>"><?php echo $row->district;?></option>
                    <?php endforeach ;?>
                  </select>
                  <span class="form-bar"></span>
          </div>
			    <div class="form-group">
			        <label for="name"> Sub Branch <span style="color:red;">*</span></label> 
			     	 <select name="subbranch" id="subbranch" class="form-control" require style="text-transform:uppercase; color:#09b37d;" required>
                    
                  </select>
                  <span class="form-bar"></span>
			    </div>
			    

		
          <div class="form-group">
              <label for="name">Registration Type:<span style="color:red;">*</span></label>
              <div class="col-md-12" style="margin-bottom:35px;margin-top:15px;">
                  <input type="radio" name="tpstatus" value="t" required=""> &nbsp;TRIAL &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tpstatus" value="p" required="">&nbsp;PERMANENT
              </div>
             <!--<select class="form-control" style="color:#09b37d;" name="tpstatus" required="required">-->
             <!-- <option style="color:#09b37d;" value="">--Select Subscriber--</option>-->
             <!--  <option style="color:#09b37d;" value="t">Trial </option>-->
             <!--  <option style="color:#09b37d;" value="p">Permanent</option>-->
             <!--</select>-->
             <span class="form-bar"></span>
          </div>
          <div class="form-group">
              <label for="name">PASSWORD : <span style="color:red;">*</span></label>
             <input type="password" name="password" id="password" class="form-control" style="color:#09b37d;" required="">
             <span class="form-bar"></span>
          </div>

			    <div class="form-group">
			        <label for="name"> CONFIRM PASSWORD :<span style="color:red;">*</span></label> 
			     	<input type="password" name="" id="conformpassword" class="form-control" style="color:#09b37d;" required=""
                       >
                      <span class="form-bar" id="message"></span>
			    </div>
			    	    <div class="form-group">
			        <label for="name">ENTER AMOUNT :</label> 
			     	
                   <!--<input type="text" name="amount" class="form-control" style="color:#09b37d;" value="200" readonly="" required="" onkeypress="return isNumber(event)"-->
                   <!-- style="text-transform:uppercase">-->
             <!--      <select class="form-control" style="color:#09b37d;" name="tpstatus" required="required">-->
             <!-- <option style="color:#09b37d;" value="">--Select Value--</option>-->
             <!--  <option style="color:#09b37d;" value="1100" checked="">1100</option>-->
             <!--       <option style="color:#09b37d;" value="200">200</option>-->
             <!--       <option style="color:#09b37d;" value="0">Free</option>-->
             <!--</select>-->
                    <!--<div class="row">-->
                    <!--    <select name="amount" class="fomr-control"  required="">-->
                    <!--<option style="color:#09b37d;">-Select Value-</option>-->
                    <!--<option style="color:#09b37d;" value="1100" checked="">1100</option>-->
                    <!--<option style="color:#09b37d;" value="200">200</option>-->
                    <!--<option style="color:#09b37d;" value="0">Free</option>-->
                    <!--</select>-->
                    <!--</div>-->
                    
                     <input type="text" name="amount" class="form-control" value="1100" required="" readonly="" onkeypress="return isNumber(event)"
                    style="text-transform:uppercase; color:#09b37d;">
                  
                  <span class="form-bar"></span>
			    </div>
          <!--<div class="form-group">-->
          <!--    <label for="name">Registration Type:</label> -->
          <!--   <select class="form-control" style="color:#09b37d;" name="tpstatus" required="required">-->
          <!--    <option style="color:#09b37d;" value="">--Select Subscriber--</option>-->
          <!--     <option style="color:#09b37d;" value="t">Tairl Subscriber</option>-->
          <!--     <option style="color:#09b37d;" value="p">Permanent Subscriber</option>-->
          <!--   </select>-->
          <!--   <span class="form-bar"></span>-->
          <!--</div>-->
          
			    <div class="form-group">
			        <label for="name">CHOOSE A PAYMENT MODE:<span style="color:red;">*</span></label>
			        <div class="col-md-12">
                    <input type="radio" name="payment"  onclick="myFunction()">&nbsp;ACCOUNT &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="payment" onclick="myFunction1()" >&nbsp;PAYTM &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="payment" onclick="myFunction2()" checked="checked" >&nbsp;CASH
                    </div>
             <span class="form-bar"></span>
          </div>
          <div class="form-group" id="mypayment1" style="display:none;">
			       <div class="row">
			            <div class="col-md-3">
			        <img src="<?php echo base_url()?>assets/images/grocery/Offline Merchant1.png" style="width:200px; height:250px;">
			        </div>
			        <div class="col-md-9" style="padding-left:40px;">PASS SYSTEM</div>
			       </div>
			        <label for="name">QR CODE:</label>
             <span class="form-bar"></span>
          </div>
          <div class="form-group" id="mypayment" style="display:none;" table="table table-bordered">
			        <label for="name" style="color:blue;">ACCOUNT DETAILS:</label>
			       <div class="col-md-12">
			            <lable>ACCOUNT HOLDER NAME:</lable>&nbsp;&nbsp;<span>PROGENY ALTERATION OF SUBSCRIBING SYSTEM</span>
			       
			       </div>
			       <div class="col-md-12">
			            <lable>ACCOUNT NO: </lable>&nbsp;&nbsp;&nbsp;<span>696020110000470</span>
			      
			       </div>
			       <div class="col-md-12">
			             <lable>BANK NAME :</lable>&nbsp;&nbsp;&nbsp;<span>BANK OF INDIA</span>
			       
			       </div>
			       <div class="col-md-12">
			            <lable>IFSC CODE :</lable>&nbsp;&nbsp;&nbsp;<span>BKID0006960</span>
			       </div>
             <span class="form-bar"></span>
          </div>
			</div>
	
			<div class="container">
                     <div class="row">
                      <div class="col-md-12">
                        <center> <p>  <button class="btn btn-solid btn-success " id="subbutton" type ="submit">Submit</button> &emsp;&emsp;<input type="checkbox" required title="Please Accept Terms and Conditions" /> I accept the  <a href="<?php echo base_url()?>index.php/auth/termCondition" target="_blank"><span style="color:blue;">Terms & Conditions</span></a> </p></center> 
                      </div>
                     </div>
                   </div>
			 

		</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
  
  jQuery(document).ready(function() {
 $("#panNumber").change(function(){
 var panVal = $('#panNumber').val();
 $.post("<?php echo site_url('auth/match_pan') ?>", {panVal : panVal}, function(data){
    	                //$("#streamList").html(data);
    	                //alert(data);
    	    		});
var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

if(regpan.test(panVal)){
	 $('#messagepan').html('').css('color', 'green');
	 document.getElementById("subbutton").disabled =false;
} else {
	// $('#messagepan').html('invalid pan card number').css('color', 'red');
	 $('#messagepan').html('please enter correct Pan Number').css('color', 'red');
	 document.getElementById("subbutton").disabled = true;
	  if (panVal == "") {
            document.getElementById("messagepan").innerHTML = " ";
        }
}

 });
 $("#branch").change(function(){
 var branchid = $('#branch').val();
 //alert(branchid)
 $.post("<?php echo site_url('auth/subbranchid') ?>", {branchid : branchid}, function(data){
     $("#subbranch").html(data);
});

 });
  $("#contactno").change(function(){
  var mno = $('#contactno').val();
var regpan = /^([6-9]){1}([0-9]){9}?$/;

if(regpan.test(mno)){
	 $('#messageno').html('').css('color', 'green');
	 document.getElementById("subbutton").disabled =false;
} else {
	// $('#messagepan').html('invalid pan card number').css('color', 'red');
	 $('#messageno').html('<p class="error" style="color:red;">Invalid Mobile Number</p>').css('color', 'red');
	 document.getElementById("subbutton").disabled =true;
}
 });
 
      $("#branchid").change(function(){
             var branchid = $('#branchid').val();
           // alert(branchid);
             $.post("<?php echo site_url('auth/subbranchid') ?>", {branchid : branchid}, function(data){
                 $("#subbranch").html(data);
                 	                
                   });
               });
  //$('')
          });

  </script>
        <script type="text/javascript">
         $('#message1').hide();
    $('#conformpassword').on('keyup', function() {
    if ($('#password').val() == $('#conformpassword').val()) 
       {
      $('#message').html('Matched').css('color', 'green');
       document.getElementById("subbutton").disabled =false;
        } 
    else{
      $('#message').html('Password Not Matching').css('color', 'red');
      document.getElementById("subbutton").disabled = true;
      }    
  });

function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;

}


////////////////
/*$(document).ready(function(){
     $('#subbutton').click(function(){
var aa= $("p[class!='error']").css("color", "red");
var bb= $("p[class!='error']").css("color", "green");
 if(aa){
             alert("please fill the valid entry");
              document.getElementById("subbutton").disabled =true;
              }
              else if(bb){
                  alert("valid");
                  document.getElementById("subbutton").disabled =false;
                  }else{
                      alert("hh");}
});
});*/
$(document).ready(function(){
$('#subbutton').click(function(){	
if( $('.error').css('color') == 'rgb(255, 0, 0)' ) {
    alert("please fill the valid entry");
document.getElementById("subbutton").disabled =true;
} else if( !$('.error').css('color') == 'rgb(255, 0, 0)'  ){
    document.getElementById("subbutton").disabled =false;
}
});
});
/////////////
$('#aadhar').change(function(){
 var adhar = $('#aadhar').val();
 //alert(adhar);
$.post("<?php echo site_url('auth/match_adhar_subs') ?>", {adhar : adhar
        }, function(data){
            $('#aadharmsg').html(data);
document.getElementById("subbutton").disabled =false;
       });
});

$('#ao').change(function(){
 var ao = $('#ao').val();
 //alert(adhar);
$.post("<?php echo site_url('auth/match_ao') ?>", {ao : ao
        }, function(data){
            $('#aomsg').html(data);
document.getElementById("subbutton").disabled =false;
       });
});



$('#aadhar1').change(function(){
 var adhar = $('#aadhar1').val();
 //alert(adhar);
$.post("<?php echo site_url('auth/match_adhar_subs') ?>", {adhar : adhar
        }, function(data){
            $('#aadharmsg1').html(data);
            document.getElementById("subbutton").disabled = true;
       });
});
$('#aadhar3').change(function(){
 var adhar = $('#aadhar3').val();
 //alert(adhar);
$.post("<?php echo site_url('auth/match_adhar_subs') ?>", {adhar : adhar
        }, function(data){
            $('#aadharmsg3').html(data);
            document.getElementById("subbutton").disabled = true;
       });
});
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
function stuAddress() 
{
    var text_value = document.getElementById("address").value;
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z0-9- )]*/g, "");
    document.getElementById("address").value=value;

}

function aoNo() 
{
    var text_value = document.getElementById("ao").value;
   
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )(0-9)]*/g, "");
    document.getElementById("ao").value=value;
    
 }
function customerName() 
{
    var text_value = document.getElementById("name").value;
    if(text_value.length<2){
        alert('Name must be greater then two character');
    }else{
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("name").value=value;
    }
 }
 function nomName() 
{
    var text_value = document.getElementById("nom1").value;
    if(text_value.length<2){
        alert('Name must be greater then two character');
    }else{
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("name").value=value;
    }
 }
 function nomName2() 
{
    var text_value = document.getElementById("nom2").value;
    if(text_value.length<2){
        alert('Name must be greater then two character');
    }else{
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("name").value=value;
    }
 }
function fatherName() 
{
    var text_value = document.getElementById("fname").value;
    if(text_value.length<2){
        alert('Name must be greater then two character');
    }else{
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("fname").value=value;
    }

}
function customerState() 
{
    var text_value = document.getElementById("customerstate").value;
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("customerstate").value=value;

}
function emailId() 
{
    var text_value = document.getElementById("email").value;
    if (!text_value.match(/^[a-z0-9._]+[@][a-z]+[.][a-z]+$/)) {
        document.getElementById("emailID").innerHTML = "<p class='error' style='color:red;'>Enter valid email id</p>";
        document.getElementById("subbutton").disabled = true;
        document.getElementById("email").focus();
        if (text_value == "") {
            document.getElementById("emailID").innerHTML = " ";
        }
    }else{
    	document.getElementById("emailID").innerHTML = " ";
        document.getElementById("email").focus();
        document.getElementById("subbutton").disabled =false;
    }

}
function myFunction1() {
  var x = document.getElementById("mypayment1");
  var y = document.getElementById("mypayment");
  if (x.style.display == "block") {
    x.style.display = "none";
   
  } else {
    x.style.display = "block";
    y.style.display = "none";
  }
}
function myFunction() {
  var x = document.getElementById("mypayment");
  var y = document.getElementById("mypayment1");
  if (x.style.display == "block") {
    x.style.display = "none";
    
  } else {
    x.style.display = "block";
    y.style.display = "none";
  }
}
function myFunction2() {
  var x = document.getElementById("mypayment");
  var y = document.getElementById("mypayment1");
  if (x.style.display == "block") {
    x.style.display = "none";
  } 
  else if (y.style.display == "block") {
    y.style.display = "none";
  } else{
    x.style.display = "none";
    y.style.display = "none";
  }
}


function checkDOB() {
        var dateString = document.getElementById('date-input').value;
        var myDate = new Date(dateString);
        var today = new Date();
        if ( myDate > today ) { 
            $('#age').html('Not Valid Age').css('color', 'red');
             document.getElementById("subbutton").disabled = true;
            return false;
        }
        else{
         $('#age').html('Valid age').css('color', 'green');
           document.getElementById("subbutton").disabled = false;
        return true;
        }
    }

</script>

     <?php } else{?>
        <script type="text/javascript">
           $('#message1').hide();
             alert("20 user exits");
        </script>   
      <?php }?>
   <?php } else
   {?>
   <script>
     $('#message1').html('user does not exits').css('color', 'red'); 
     
           $('.form-control').css({
        'color' : '#09b37d',
    });
   </script>

  <?php  }
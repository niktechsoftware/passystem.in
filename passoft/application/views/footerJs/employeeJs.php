<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/velocity/jquery.velocity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>-->
<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/lib/d3.v3.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBarChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedArea.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedAreaChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CORE JAVASCRIPTS  -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!-- end: CORE JAVASCRIPTS  -->
<script>
    jQuery(document).ready(function() {
    	$('#emptype').change(function(){
            var emptype= $('#emptype').val();
           // alert(emptype);
           $.post("<?php echo site_url("employeeController/getsubtype") ?>", {
            emptype: emptype
            }, function(data) {
              $("#empSubType").html(data);
             // alert("data");
            });
        });
        $("#panNumber").change(function(){
 var panVal = $('#panNumber').val();
 $.post("<?php echo site_url('auth/match_pan') ?>", {panVal : panVal}, function(data){
    	                //$("#streamList").html(data);
    	                alert(data);
    	    		});
var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

if(regpan.test(panVal)){
	 $('#messagepan').html('').css('color', 'green');
	 document.getElementById("subbutton").disabled =false;
} else {
	// $('#messagepan').html('invalid pan card number').css('color', 'red');
	 $('#messagepan').html('<ul class="error" style="list-style-type:disc;color:red;"><li>first 5 digit should be alphabetic</li><li>then 4 digit should be numeric</li><li>last 1 digit should be alpabetic</li></ul>').css('color', 'red');
	 document.getElementById("subbutton").disabled = true;
	 if (panVal == "") {
            document.getElementById("messagepan").innerHTML = " ";
        }
}

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
	  if (mno == "") {
            document.getElementById("messageno").innerHTML = " ";
        }
}
 });
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
  $('#branch').change(function(){
      var branch= $('#branch').val();
      //alert(branch);
      $.post("<?php echo site_url("employeeController/subBranch") ?>", {
        branch: branch
            }, function(data) {
              $("#subbranch").html(data);
             // alert("data");
            });
  });

        Main.init();
        SVExamples.init();
        FormElements.init();
        TableExport.init();
        UIModals.init();
    });
    function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;

}
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
$('#aadhar').change(function(){
 var adhar = $('#aadhar').val();
 //alert(adhar);
$.post("<?php echo site_url('employeeController/match_adhar_emp') ?>", {adhar : adhar
        }, function(data){
            $('#aadharmsg').html(data);
            document.getElementById("subbutton").disabled = false;
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
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z0-9-/ )]*/g, "");
    document.getElementById("address").value=value;

}
function customerName() 
{
    var text_value = document.getElementById("name").value;

    if(text_value){
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("name").value=value;
}

}
function fatherName() 
{
    var text_value = document.getElementById("fname").value;
    if(text_value){
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
function customerCity() 
{
    var text_value = document.getElementById("country").value;
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("country").value=value;

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
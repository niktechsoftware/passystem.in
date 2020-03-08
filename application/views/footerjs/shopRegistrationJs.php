
<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/greensock/TweenMax.min.js"></script>

<script src="<?php echo base_url();?>assets/js/custom.js"></script>
</body>
</html>
<script>
    $('.cat_menu_container, .header_search_button, .cart_count').css({
        'background' : '#f20089',
    });
    
        $('.logo>a, .main_nav_dropdown>li>a, .footer_phone').css({
        'color' : '#f20089',
    });
      $('.form-control').css({
        'color' : '#09b37d',
    });
    
    $("li").hover(function(e) { 
    $(this).css("color",e.type === "mouseenter"?"green":"") 
});
    
</script>

 
<!--  <script>-->
<!--    jQuery(document).ready(function() {-->
<!--          $("#joinerid").keyup(function(){-->
<!--              var cat = $("#joinerid").val();-->
<!--              $.post("<?php echo site_url("auth/checkjoinerid") ?>",{cat : cat}, function(data){-->
<!--                $('#message1').show();-->
<!--                $("#aarju").html(data);-->
<!--                });-->
<!--            });-->
<!--          });-->
          
<!--</script>-->
<script>
  $('img').addClass('zoom');
  $("img").wrap("<a href='<?php echo base_url();?>index.php/auth/signin'></a>");
 </script> 
 	
<script>
  jQuery(document).ready(function() {
 $("#panNumber").change(function(){
 var panVal = $('#panNumber').val();
 $.post("<?php echo site_url('auth/match_pan_shop') ?>", {panVal : panVal}, function(data){
    	                $("#messagepan").html(data);
    	               // alert(data);
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
             document.getElementById("subbutton").disabled =false;
        }
}

 });
 
  $("#contactno").keyup(function(){
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
$('#adhar').change(function(){
 var adhar = $('#adhar').val();
 //alert(adhar);
$.post("<?php echo site_url('auth/match_adhar_shop') ?>", {adhar : adhar
        }, function(data){
          $('#msgShop').html(data);
          document.getElementById("subbutton").disabled =false;
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
    //alert(text_value);
    // if(text_value.length<2){
    //     alert('Name must be greater then two character');
    // }else{
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("name").value=value;
  //  }

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
function customerCity() 
{
    var text_value = document.getElementById("city").value;
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
    document.getElementById("city").value=value;

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
</script>

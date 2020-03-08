<!-- <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script> -->
<script src="<?php echo base_url();?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url();?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="<?php echo base_url();?>assets/js/contact_custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

<script>
$(document).ready(function(){
  $('#p_member_id').hide();
  $('#p_name').hide();
  $('#p_mobile').hide();
  $('#p_address').hide();

  $('#c_type').change(function(){
    var c_type= $('#c_type').val();
    if (c_type == 'pass member'){
      $('#p_member_id').show();
    $('#p_name').show();
    $('#p_mobile').show();
    $('#p_address').show();
    } else if (c_type == 'other'){
    $('#p_member_id').hide();
  $('#p_name').show();
  $('#p_mobile').show();
  $('#p_address').show();
    }
});

$('#pmember_id').keyup(function(){
  var p_id= $('#pmember_id').val();
  //alert(p_id);
          $.post("<?php echo site_url('auth/match_subscriber') ?>",{p_id : p_id },function(data){
          //  $("#name").html(data);
          // alert(data);	
            var d = jQuery.parseJSON(data);		
            $("#msg").html(d.msg);
           //$('#pmember_id').val(pmember_id);
            $('#name').val(d.name);
            $('#contactno').val(d.mobile);
            $('#address').val(d.address);
//alert(d.name);

});
       });
$('#pID').keyup(function(){
  var pid= $('#pID').val();
  //alert(pid);
  $.post("<?php echo site_url('auth/viewComplainDetail') ?>",{pid : pid},function(data){
							$("#viewDetail").html(data);
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
	 $('#messageno').html('Invalid Mobile Number').css('color', 'red');
	 document.getElementById("subbutton").disabled =true;
	  if (mno == "") {
            document.getElementById("messageno").innerHTML = " ";
        }
}
 });
          });

    function aoName() {
    var text_value = document.getElementById("ao_name").value;
    if(text_value){
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )(0-9)]*/g, "");
    document.getElementById("ao_name").value=value;
}
}
function vName() {
    var text_value = document.getElementById("vname").value;
    if(text_value){
    value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )(,)]*/g, "");
    document.getElementById("vname").value=value;
}
}
function isalphabate(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return true;
  }
  return false;

}
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;

}
</script>
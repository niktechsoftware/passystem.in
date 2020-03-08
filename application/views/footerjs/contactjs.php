<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
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
    jQuery(document).ready(function() {
          $("#joinerid").keyup(function(){
              var cat = $("#joinerid").val();
              $.post("<?php echo site_url("auth/checkjoinerid") ?>",{cat : cat}, function(data){
                $('#message1').show();
                $("#aarju").html(data);
                });
            });
            
           
            
            
          });
          
          
  
           

          

          
</script>
<script>
  $('img').addClass('zoom');
  $("img").wrap("<a href='<?php echo base_url();?>index.php/auth/signin'></a>");
 </script> 
 	
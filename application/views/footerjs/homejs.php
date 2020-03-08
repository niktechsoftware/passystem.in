<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url();?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/plugins/slick-1.8.0/slick.js"></script>
<script src="<?php echo base_url();?>assets/plugins/easing/easing.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



</body>

</html>

<script>
    
    $('.cat_menu_container, .header_search_button, .cart_count,.page_menu_content').css({
        'background' : '#f20089',
    });
    
        $('.logo>a, .main_nav_dropdown>li>a, .footer_phone').css({
        'color' : '#f20089',
    });
  $('.form-control').css({
        'color' : '#09b37d',
    });

    $('img').addClass('zoom');
    // $("img").wrap("<a href='<?php echo base_url();?>index.php/auth/signin'></a>");
    
    $("li").hover(function(e) { 
    $(this).css("color",e.type === "mouseenter"?"#f20089":"") 
});
    
    
</script>

  <script>
    jQuery(document).ready(function() {
          $("#joinerpass").change(function(){
              var cat = $("#joinerid").val();
               var pass = $("#joinerpass").val();
               if((cat.length)>0 && (pass.length)>0 )
               {
              $.post("<?php echo site_url("auth/checkjoinerid") ?>",{cat : cat , pass : pass}, function(data){
                $('#message1').show();
                $("#aarju").html(data);
                });
               }
               else{
                  // alert("plz fill upline username and password.");
               }
            });
            
           
            
            
          });
          
</script>

    <script>
$(document).ready(function() {
     $('#bst').DataTable({
//   "pageLength": 20,
});
    $('#product').DataTable({
  "pageLength": 20,
});
} );
    </script>
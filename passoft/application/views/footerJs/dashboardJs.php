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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/tableExport/tableExport.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/html2canvas.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/table-export.js"></script>
<!-- start: CORE JAVASCRIPTS  -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- end: CORE JAVASCRIPTS  -->

<script>
    jQuery(document).ready(function() {
     	$('#demandlist').DataTable();
     
        $('#sbfav').DataTable();
        $('#sbdemlist').DataTable();
    	$('#sbdemlist1').DataTable();
    	$('#sbdemlist2').DataTable();
     
        
      
    });
    
    
$(document).ready(function() {


  
  $("#textArea1").keyup(function() {
    var totalc = $("#textArea1").val();
    // alert(totalc);
    $.post("<?php echo site_url('sms/countChar1') ?>", {
      totalc: totalc
    }, function(data) {
      $("#totalCharacter1").val(data);
      // alert(data);
    });
  });

  $("#textArea2").keyup(function() {
    var totalc = $("#textArea2").val();
    // alert(totalc);
    $.post("<?php echo site_url('sms/countChar2') ?>", {
      totalc: totalc
    }, function(data) {
      $("#totalCharacter2").val(data);
      // alert(data);
    });
  });

  $("#textArea3").keyup(function() {
    var totalc = $("#textArea3").val();
    // alert(totalc);
    $.post("<?php echo site_url('sms/countChar3') ?>", {
      totalc: totalc
    }, function(data) {
      $("#totalCharacter3").val(data);
      // alert(data);
    });
  });

  $("#textArea4").keyup(function() {
    var totalc = $("#textArea4").val();

    $.post("<?php echo site_url('sms/countChar4') ?>", {
      totalc: totalc
    }, function(data) {
      $("#totalCharacter4").val(data);
    });
  });



 




});
    

    	
        Main.init();
        SVExamples.init();
        FormElements.init();
        TableExport.init();
        UIModals.init();
</script>
<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		
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
		<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-elements.js"></script>


		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
<script>
jQuery(document).ready(function() {
	$("#textArea").keyup(function(){
			var totalc = $("#textArea").val();
			
			$.post("<?php echo site_url('index.php/msgNoticeControllers/countChar') ?>", {totalc : totalc},function(data){
		          $("#totalCharacter").html(data);
			});	
		});
		/*find sms unit js*/
		$("#textArea").keyup(function(){
			var totalc = $("#textArea").val();
			
			$.post("<?php echo site_url('index.php/msgNoticeControllers/countCharunit') ?>", {totalc : totalc},function(data){
		          $("#totalCharacter1").html(data);
			});	
		});
		
		$("#submit").click(function(){
			var message = $("#message").val();
			var subject = $("#subject").val();
			var reciever = $("#reciever").val();
			$.post("<?php echo site_url('index.php/msgNoticeControllers/sendMsg') ?>", {message : message,subject : subject,reciever : reciever},function(data){
		          $("#msg").html(data);
			});	
		});
		

		$("#s_reg").click(function(){
			var message = $("#s_reg").val();
		//	alert(message);
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});
		});
		$("#b_reg").click(function(){
			var message = $("#b_reg").val();
		//	alert(message);
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#sb_reg").click(function(){
			var message = $("#sb_reg").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#del_reg").click(function(){
			var message = $("#del_reg").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		
		$("#emp_reg").click(function(){
			var message = $("#emp_reg").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#active").click(function(){
			var message = $("#active").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#all_b").click(function(){
			var message = $("#all_b").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#all_sb").click(function(){
			var message = $("#all_sb").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		$("#all_sub").click(function(){
			var message = $("#all_sub").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
		
			$("#indivisual").click(function(){
			var message = $("#indivisual").val();
			$.post("<?php echo site_url('index.php/smsAjax/smsSetting') ?>", {message : message},function(data){
		          $("#smsSetting").html(data);
			});	
		});
				


	
	});
		Main.init();
		SVExamples.init();
		FormElements.init();
</script>
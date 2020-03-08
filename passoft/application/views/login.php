<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
		<title><?php echo $title; ?></title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/all.css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<!-- <div class="logo"> -->
					<!-- <img src="<?php echo base_url(); ?>assets/images/logo.png"> -->
					<div style="text-align:center; color:white; font-size:20px;">
					
					 PROGENY ALTERATION OF SUBSCRIBING SYSTEM 
					</div>
				<!-- start: LOGIN BOX -->
				<div class="box-login" style="border: 1px solid #808909; margin-top: 0px;">
				<img style="height:70px; width:70px; float:right;" src="<?php echo $this->config->item('asset_url'); ?>/images/logo.png">
					<h3><?php echo $this->lang->line('login_welcome_message'); ?></h3>
					
					<p>
						<?php echo $this->lang->line('login_message'); ?>
					</p>
					<form  action="<?php echo base_url(); ?>homeController/login_check" method="post" >
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						<?php echo validation_errors(); ?>
						
							<div class="form-group">
								<span class="input-icon">
								
									<input type="text" class="form-control" name="username" placeholder="<?php echo $this->lang->line('login_username'); ?>">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="<?php echo $this->lang->line('login_password'); ?>">
									<i class="fa fa-lock"></i>
									<a class="forgot" href="#">
										<?php echo $this->lang->line('login_forgot'); ?>
									</a> </span>
							</div>
								<!--  <div class="form-group form-actions">
								<span class="input-icon">
									<input type="text" class="form-control password" name="mobile" placeholder="<?php echo $this->lang->line('login_mobile'); ?>">
									<i class="fa fa-lock"></i>
									<a class="forgot" href="#">
										<?php echo $this->lang->line('login_forgot_mobile'); ?>
									</a> </span>
							</div> -->
							<?php if($this->uri->segment(3) == "authFalse"):?> <code>Wrong Userid or Password...</code><?php endif;?>
							<?php if($this->uri->segment(3) == "8"):?> <code>Password sent to your Email-Account</code><?php endif;?>
							<div class="form-actions">
								<label for="remember" class="checkbox-inline">
									<input type="checkbox" class="grey remember" id="remember" name="remember">
									<?php echo $this->lang->line('login_keep_me'); ?>
								</label>
								<button type="submit" class="btn btn-green pull-right">
									<?php echo $this->lang->line('login_login'); ?> <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						<?php echo $this->lang->line('common_copy_right'); ?>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: LOGIN BOX -->
				<!-- start: FORGOT BOX -->
				<div class="box-forgot">
					<h3><?php echo $this->lang->line("login_forgot_msg"); ?></h3>
					<p>
						<?php echo $this->lang->line('login_reset_msg'); ?>
					</p>
					<form  action="<?php echo base_url(); ?>homeController/sendEmail" method="post" >
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="userID" placeholder="User ID">
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email1" placeholder="Email">
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-actions">
								<a class="btn btn-light-grey go-back">
									<i class="fa fa-chevron-circle-left"></i> <?php echo $this->lang->line('login_login'); ?>
								</a>
								<button type="submit" class="btn btn-green pull-right">
									<?php echo $this->lang->line('common_submit'); ?> <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						<?php echo $this->lang->line('common_copy_right'); ?>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: FORGOT BOX -->
			</div>
			
			
				<!-- end: FORGOT BOX -->
			</div>
			
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
			<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>
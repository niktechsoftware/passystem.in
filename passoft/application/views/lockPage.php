
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
		<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/theme_light.html" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/print.css" type="text/css" media="print"/>
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="lock-screen">
		<div class="main-ls animated flipInX">
			<div class="logo">
				<img src="<?php echo base_url()?>assets/images/logo.png">
			</div>
			<div class="box-ls">
				<?php if(strlen($this->session->userdata('photo')) > 1):?>
		    		<?php if($this->session->userdata('login_type') == 'student'): ?>
		        		<img src="<?php echo base_url()?>assets/images/stuImage/<?php echo $this->session->userdata('photo');?>" width="80" alt="">
		        	<?php else: ?>
		        		<img src="<?php echo base_url()?>assets/images/empImage/<?php echo $this->session->userdata('photo');?>" width="80" alt="">
		        	<?php endif;?>
		        <?php else:?>
		        	<img src="<?php echo base_url()?>assets/images/anonymous.jpg" width="150" alt="">
		        <?php endif;?>
				<div class="user-info">
					<h3><i class="fa fa-lock"></i> <?php echo $this->session->userdata("name"); ?></h3>
					<span><em>Please enter your password to un-lock.</em></span>
					<?php if($this->uri->segment(3) == 'false'): ?>
						<code>Wrong password. Please try again....</code>
					<?php endif;?>
					<form action="<?php echo base_url()?>index.php/homeController/unlock" method="post">
						<div class="input-group">
							<input type="hidden" value="<?php echo $this->session->userdata("username"); ?>" name="username" />
							<input type="hidden" value="<?php echo $this->session->userdata("login_type"); ?>" name="logintype" />
							<input type="password" placeholder="Password" name="password" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-green" type="submit">
									<i class="fa fa-chevron-right"></i>
								</button> </span>
						</div>
						<div class="relogin">
							<a href="<?php echo base_url()?>index.php/homeController/logout">
								Not <?php echo $this->session->userdata("name"); ?> ?</a>
						</div>
					</form>
				</div>
			</div>
			<div class="copyright">
				<?php echo $this->lang->line('common_copy_right'); ?>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url()?>assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
	</body>
	<!-- end: BODY -->

</html>
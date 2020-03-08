	<!-- Footer -->
	<footer class="footer mt-5">
	<div class="container">
	<div class="row">
	<div class="col-lg-3 footer_col">
    <div class="footer_column footer_contact">
	<div class="logo_container">
		<div class="logo"><img style="height:200px; width:200px;" src="<?php echo base_url();?>passoft/assets/logo.png"></div>
	</div>

		</div>
		</div>
	<div class="col-lg-3">
					<div class="footer_column">
						<div class="footer_title" style="color: rgb(242, 0, 137);">SUBSCRIBER</div>
							<div class="footer_phone">+91&nbsp;&nbsp;739&nbsp;482&nbsp;6066</div>
	<div class="footer_contact_text">
    <p>W2/618 Juhi Kalan Damodar Nagar,</p>
	<p>Barra, Kanpur Nagar, 208027 U.P.</p>
		</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="footer_column">
						<div class="footer_title" style="color: rgb(242, 0, 137);">INFORMATIONS</div>
						<ul class="footer_list">
						    	<li><a style="font-family: 'Rubik', sans-serif; color: #828282;" href="<?php echo base_url();?>index.php/auth/signupShop">Registration</a></li>
							<li><a style="font-family: 'Rubik', sans-serif; color: #828282;" href="<?php echo base_url();?>index.php/bussiness_plan_cont/cashback">Cashback</a></li>
							<li><a style="font-family: 'Rubik', sans-serif; color: #828282;" href="<?php echo base_url();?>index.php/contact_us_cont/contact">Contact Us</a></li>
							<li><a style="font-family: 'Rubik', sans-serif; color: #828282;" href="<?php echo base_url();?>index.php/auth/signin">Login</a></li>
						</ul>
					</div>
					<div class="footer_social">
					    <div class="footer_column">
		<ul>
		<li><a href="https://www.facebook.com/Passystem-2604660499760693/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="<?php echo base_url();?>assets/#"><i class="fab fa-twitter"></i></a></li>
			<li><a href="<?php echo base_url();?>assets/#"><i class="fab fa-youtube"></i></a></li>
			<li><a href="<?php echo base_url();?>assets/#"><i class="fab fa-google"></i></a></li>
			<li><a href="<?php echo base_url();?>assets/#"><i class="fab fa-vimeo-v"></i></a></li>
		</ul>
		</div>
		</div>
				</div>
				<div class="col-lg-3 mt-4">
				    <div class="footer_column">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3572.990856973435!2d80.3077066058966!3d26.42377163062785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c47c2dae8d919%3A0xcc14b94b87a71c50!2sPAS+System!5e0!3m2!1sen!2sin!4v1562665790593!5m2!1sen!2sin" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
			</div>
			</div>
		</div>
	</footer>
	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://niktechsoftware.com/" target="_blank">Niktech Software Solutions</a> All Rights Reserved.
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
							<li style="font-size: large;">Total Visits
							        <?php
									/* counter */
									//opens countlog.txt to read the number of hits
									$datei = fopen("./counter.txt","r");
									$count = fgets($datei,50000);
									fclose($datei);
									$count=$count + 1 ;
									?><label style="font-size:20px; text-shadow: 0px 1px red;"><?php
									if($count<100)
									{
									    echo "00".$count ;
									}
									else
									{
									    echo $count ;
									}
									
									?></label>
									<?php
									// opens countlog.txt to change new hit number
									$datei = fopen("./counter.txt","w");
									fwrite($datei, $count);
									fclose($datei);
									?>
							
							        <!--<a href="http://www.hitwebcounter.com" target="_blank">-->
               <!--                     <img src="http://hitwebcounter.com/counter/counter.php?page=7111963&style=0014&nbdigits=4&type=page&initCount=1001" title="good hits" Alt="good hits"   border="0" >-->
               <!--                     </a>-->
                            </li>
								<!-- <li><a href="<?php echo base_url();?>assets/#"><img src="<?php echo base_url();?>assets/images/logos_1.png" alt=""></a></li>
								<li><a href="<?php echo base_url();?>assets/#"><img src="<?php echo base_url();?>assets/images/logos_2.png" alt=""></a></li>
								<li><a href="<?php echo base_url();?>assets/#"><img src="<?php echo base_url();?>assets/images/logos_3.png" alt=""></a></li>
								<li><a href="<?php echo base_url();?>assets/#"><img src="<?php echo base_url();?>assets/images/logos_4.png" alt=""></a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

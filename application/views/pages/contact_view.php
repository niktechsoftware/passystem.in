
	<!-- Contact Info -->

	<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url();?>assets/images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">+91&nbsp; 7394826066</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url();?>assets/images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">
                                    <a>passystem1@gmail.com</a>
                                </div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url();?>assets/images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Address</div>
								<div class="contact_info_text">W2/618 Juhi Kalan Damodar Nagar, Barra, Kanpur Nagar-208027  </div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title" style="background-color: antiquewhite; color:#f20089">Get in Touch</div>

						<form action="<?php echo base_url();?>index.php/contact_us_cont/contact_value" id="contact_form" method="post">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text"  id="contact_form_name" style="border:1px solid" class="contact_form_name input_field" placeholder="Your name" name="name" required="required" data-error="Name is required.">
								<input type="email" id="contact_form_email" style="border:1px solid" class="contact_form_email input_field" placeholder="Your email" name="email" required="required" data-error="Email is required.">
								<input type="number" id="contact_form_phone" style="border:1px solid" class="contact_form_phone input_field" name="phone" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" style="border:1px solid" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							</div>
							<div class="contact_form_button">
								<button style="background: #f20089;" type="submit" class="button contact_submit_button">Send Message</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3572.990856973435!2d80.3077066058966!3d26.42377163062785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c47c2dae8d919%3A0xcc14b94b87a71c50!2sPAS+System!5e0!3m2!1sen!2sin!4v1562665790593!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
<!-- 
	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div> -->

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="<?php echo base_url();?>assets/images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button style="background: #f20089;" class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a style="color:#f20089" href="<?php echo base_url();?>assets/#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

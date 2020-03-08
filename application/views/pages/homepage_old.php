
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<!--css--->	
<style>
/* image slider */
.clearfix1 {
  overflow: auto;
  padding:35px;
}
.img1{
	border-radius:10%;
	float: left;
}
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}


/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* .active, .dot:hover {
  background-color: #717171;
} */

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
@media only screen and (max-width: 400px) {
  .font_size1 {font-size:35px}
}

	</style>
	
	<!-- Banner -->
	<div class="container-fluid">

	<div class="banner" style="height: 400px;">
		<div class="banner_background" style="background-image:url(<?php echo base_url();?>assets/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image" style="height:400px; width:100%;">
					<video controls style=" margin-left:50px; margin-top: 10px; height: 300px; width:80%;">
						<source src="<?php echo base_url();?>assets/videos/mov_bbb.mp4" type="video/mp4">

					</video>
				</div>
				<!-- <img src="<?php echo base_url();?>assets/images/gold.png" style="height:300px; margin-top:60px;" alt=""> -->
				<!-- <div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h2 class="banner_text">Hot Mixture<br/> of Spices</h2>
						<div class="banner_price"><span></span>GARAM MASALA</div>
						<div class="banner_product_name"></div>
						<div class="button banner_button"><a href="<?php echo base_url();?>index.php/auth/signin">Shop Now</a></div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	</div>
	
	
	<div class="container" style="margin-top:50px;">
	<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Best Supporting Authorities</h3>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="background-image: url('<?php echo base_url();?>assets/images/people/bg.jpeg');" >
    <div class="carousel-item active">
      <center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
    <div class="carousel-item">
	<center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
    <div class="carousel-item">
	<center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

	<div class="container" style="margin-top:50px;">
	<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Top Ten Achievers</h3>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner" style="background-image: url('<?php echo base_url();?>assets/images/people/bg.jpeg');">
				<div class="carousel-item active">
				<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
				</div>
   				 <div class="carousel-item">
					<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    			</div>
    			<div class="carousel-item">
				<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    			</div>
  			</div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
	
<!-- ]]]]]]]]]]]]]]]]]]]]]]]]]]]]]] -->

	
<div class="container" style="margin-top:50px;">
	<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Best Advising Officers</h3>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="background-image: url('<?php echo base_url();?>assets/images/people/bg.jpeg');">
    <div class="carousel-item active">
      <center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
    <div class="carousel-item">
	<center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
    <div class="carousel-item">
	<center><img src="<?php echo base_url();?>assets/images/people/IMG_20190630_154853.jpg" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
	  <p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

	<div class="container" style="margin-top:50px;">
	<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Top Ten Employees</h3>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner" style="background-image: url('<?php echo base_url();?>assets/images/people/bg.jpeg');">
				<div class="carousel-item active">
				<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
				</div>
   				 <div class="carousel-item">
					<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    			</div>
    			<div class="carousel-item">
				<center><img  src="<?php echo base_url();?>assets/images/people/5.png" alt="First slide" style="height:150px; width:150px; margin-top:50px;">
				<p style="margin:5%; color:black">In that way it takes in consideration increases (or decreases) in computational power at any given time. If 100 computers mine, the algorithm will make the challenge fittingly difficult for those hundred.</p></center>
    			</div>
  			</div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
	


	<!-- Adverts -->

	<!--<div class="adverts">-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->

	<!--			<div class="col-lg-4 advert_col">-->
					
					<!-- Advert Item -->

	<!--				<div class="advert d-flex flex-row align-items-center justify-content-start">-->
	<!--					<div class="advert_content">-->
	<!--						<div class="advert_title"><a style="color: rgb(242, 0, 137);" href="<?php echo base_url();?>assets/#">SPECIAL</a></div>-->
	<!--						<div class="advert_text">Mix Products.</div>-->
	<!--					</div>-->
	<!--					<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url();?>assets/images/makeup.png" alt=""></div></div>-->
	<!--				</div>-->
	<!--			</div>-->

	<!--			<div class="col-lg-4 advert_col">-->
					
					<!-- Advert Item -->

	<!--				<div class="advert d-flex flex-row align-items-center justify-content-start">-->
	<!--					<div class="advert_content">-->
	<!--						<div class="advert_subtitle" style="color: rgb(242, 0, 137);">Trends 2018</div>-->
	<!--						<div class="advert_title_2"><a href="<?php echo base_url();?>index.php/auth/signin">Sale -45%</a></div>-->
	<!--						<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>-->
	<!--					</div>-->
	<!--					<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url();?>assets/images/mix.jpg" alt=""></div></div>-->
	<!--				</div>-->
	<!--			</div>-->

	<!--			<div class="col-lg-4 advert_col">-->
					
					<!-- Advert Item -->

	<!--				<div class="advert d-flex flex-row align-items-center justify-content-start">-->
	<!--					<div class="advert_content">-->
	<!--						<div class="advert_title"><a style="color: rgb(242, 0, 137);" href="<?php echo base_url();?>assets/#">Trends 2018</a></div>-->
	<!--						<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>-->
	<!--					</div>-->
	<!--					<div class="ml-auto"><div class="advert_image"><img src="<?php echo base_url();?>assets/images/atta.jpg" alt=""></div></div>-->
	<!--				</div>-->
	<!--			</div>-->

	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->

	<!-- Trends -->

	<!-- <div class="trends"> -->
	<!--<div class="" style="padding-bottom: 40px; padding-top: 20px;">-->
	<!--	<div class="trends_background" style="background-image:url(<?php echo base_url();?>assets/images/trends_background.jpg)"></div>-->
	<!--	<div class="trends_overlay"></div>-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->

				<!-- Trends Content -->
	<!--			<div class="col-lg-3">-->
	<!--				<div class="trends_container">-->
	<!--					<h2 class="trends_title" style="color: rgb(242, 0, 137);">SPECIAL</h2>-->
	<!--					<div class="trends_text"><p>Mix Products.</p></div>-->
	<!--					<div class="trends_slider_nav">-->
	<!--						<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>-->
	<!--						<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->

				<!-- Trends Slider -->
	<!--			<div class="col-lg-9">-->
	<!--				<div class="trends_slider_container">-->

						<!-- Trends Slider -->
	<!--					<div class="owl-carousel owl-theme trends_slider">-->
							<!-- Trends Slider Item -->
	<!--						<div class="owl-item">-->
	<!--							<div class="trends_item is_new">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/atta.jpg" alt=""></div>-->
	<!--								 <div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">Jump White</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div> -->
	<!--							</div>-->
	<!--						</div>-->

							<!-- Trends Slider Item -->
	<!--						<div class="owl-item">-->
	<!--							<div class="trends_item">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/mix.jpg" alt=""></div>-->
	<!--								 <div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">Samsung Charm...</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div> -->
	<!--							</div>-->
	<!--						</div>-->

							<!-- Trends Slider Item -->
	<!--						<div class="owl-item">-->
	<!--							<div class="trends_item is_new">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/makeup.png" alt=""></div>-->
	<!--								 <div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">DJI Phantom 3...</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div> -->
	<!--							</div>-->
	<!--						</div>-->

							<!-- Trends Slider Item -->
	<!--						 <div class="owl-item">-->
	<!--							<div class="trends_item is_new">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/atta.jpg" alt=""></div>-->
	<!--								<div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">Jump White</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div>-->
	<!--							</div>-->
	<!--						</div> -->

							<!-- Trends Slider Item -->
	<!--						 <div class="owl-item">-->
	<!--							<div class="trends_item">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/makeup.png" alt=""></div>-->
	<!--								<div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">Jump White</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div>-->
	<!--							</div>-->
	<!--						</div> -->

							<!-- Trends Slider Item -->
	<!--						 <div class="owl-item">-->
	<!--							<div class="trends_item is_new">-->
	<!--								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url();?>assets/images/mix.jpg" alt=""></div>-->
	<!--								<div class="trends_content">-->
	<!--									<div class="trends_category"><a href="<?php echo base_url();?>index.php/auth/signin">Smartphones</a></div>-->
	<!--									<div class="trends_info clearfix">-->
	<!--										<div class="trends_name"><a href="<?php echo base_url();?>index.php/auth/signin">Jump White</a></div>-->
	<!--										<div class="trends_price">$379</div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<ul class="trends_marks">-->
	<!--									<li class="trends_mark trends_discount">-25%</li>-->
	<!--									<li class="trends_mark trends_new">new</li>-->
	<!--								</ul>-->
	<!--								<div class="trends_fav"><i class="fas fa-heart"></i></div>-->
	<!--							</div>-->
	<!--						</div> -->

	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->

	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->


		<!-- Brands -->

	<div class="brands" style="padding-top: 5%; padding-bottom: 5%;">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/attalogo.png" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/lakmelogo.png" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:150px;" src="<?php echo base_url();?>assets/images/masalalogo.png" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/patanjalilogo.png" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/daburlogo.png" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:180px; margin-top:30px;" src="<?php echo base_url();?>assets/images/britannialogo.png" alt=""></div></div>
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/chocolatelogo.webp" alt=""></div></div>-->
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/goldilogo.png" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
						
						

					</div>
				</div>
			</div>
		</div>
	</div>
	
	

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/1.jpg" alt=""></div>
									<div class="viewed_content text-center"><br>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Lakme Lip Care</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/4.png" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"></div><br>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Aashirvaad Atta</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/3.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"></div><br>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Lakme Foundation</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/m2.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"></div><br>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Pav Bhaji Masala</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/m5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"><span></span></div>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Chhola Masala</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item" style="height:100px;">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="<?php echo base_url();?>assets/images/5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price"></div>
										<div class="viewed_name"><a href="<?php echo base_url();?>index.php/auth/signin">Sugar Free Cookies</a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


				
		<div class="container-fluid mb-5 mt-5">
			<div class="row">
				
				<div class="col-lg-3 col-md-6 char_col mt-3">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Fast Delivery</div>
							<div class="char_subtitle">Within 2 Days</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 char_col mt-3">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Tracking Your Order</div>
							<div class="char_subtitle">with GPS</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col mt-3">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Cash on Delivery</div>
							<div class="char_subtitle">from Rs. 1999</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col mt-3">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Branded & Original Product</div>
							<div class="char_subtitle">On Official Tag Price</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

	<!-- Newsletter -->

	<!-- <div class="newsletter">
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
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="<?php echo base_url();?>index.php/auth/signin">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	
	  
	   

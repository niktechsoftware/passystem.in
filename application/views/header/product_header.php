<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">
	    
	    
	    
	    	    <div class="top_bar">
<div class="container">
<div class="row">
<div class="col d-flex flex-row">
<div class="top_bar_contact_item">+917394826066</div>
<div class="top_bar_contact_item"><a href="mailto:passystem1@gmail.com">passystem1@gmail.com</a></div>
<div class="top_bar_content ml-auto">
<div class="top_bar_menu">


</div>
<div class="top_bar_user">

<div><a href="<?php echo base_url();?>auth/signupSubscriber">Register</a></div>
<div><a href="<?php echo base_url();?>index.php/auth/signin">Sign in</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
	    
	    
	    

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url();?>">P.A.S.S</a></div>
						</div>
					</div>
					

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
								<?php 
        $attr = array("class" => "header_search_form clearfix", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("pagination/search", $attr);?>
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" id="book_name" name="book_name" class="header_search_input" value="<?php echo set_value('book_name'); ?>" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"></span>
												<ul class="custom_list clc">
													<li><a class="clc" href="<?php echo base_url();?>">All Categories</a></li>
													<li><a class="clc" href="<?php echo base_url();?>">Computers</a></li>
													<li><a class="clc" href="<?php echo base_url();?>">Laptops</a></li>
													<li><a class="clc" href="<?php echo base_url();?>">Cameras</a></li>
													<li><a class="clc" href="<?php echo base_url();?>">Hardware</a></li>
													<li><a class="clc" href="<?php echo base_url();?>">Smartphones</a></li>
												</ul>
											</div>
												<a href="<?php echo base_url(). "index.php/pagination/index"; ?>" class="btn btn-primary " style="color:white; margin-top:-16%; margin-left:25%;">Reset</a>
										</div>
										<button type="submit" id="btn_search" name="btn_search" class="header_search_button trans_300" value="Submit"><img src="<?php echo base_url();?>assets/images/search.png" alt=""></button>
									
										<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<!--<div class="wishlist d-flex flex-row align-items-center justify-content-end">-->
							<!--	<div class="wishlist_icon"><img src="<?php echo base_url();?>assets/images/heart.png" alt=""></div>-->
							<!--	<div class="wishlist_content">-->
							<!--		<div class="wishlist_text"><a href="<?php echo base_url();?>">Wishlist</a></div>-->
							<!--		<div class="wishlist_count">115</div>-->
							<!--	</div>-->
							<!--</div>-->

							<!-- Cart -->
							<!--<div class="cart">-->
							<!--	<div class="cart_container d-flex flex-row align-items-center justify-content-end">-->
							<!--		<div class="cart_icon">-->
							<!--			<img src="<?php echo base_url();?>assets/images/cart.png" alt="">-->
							<!--			<div class="cart_count"><span>10</span></div>-->
							<!--		</div>-->
							<!--		<div class="cart_content">-->
							<!--			<div class="cart_text"><a href="<?php echo base_url();?>">Cart</a></div>-->
							<!--			<div class="cart_price">$85</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
    <div style="
    height:30px;
    padding: 5px;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    border-radius: 20px;
    text-align:center;
    border:1px solid #0e8ce4;
	margin-left:auto;
	margin-right:auto;
	background-color:#f20089;
	margin-bottom:5px;
    ";>
	<marquee  behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();">
         <?php $res = $this->db->get("marquee")->result();?>
         <?php foreach($res as $row):?>
		 <h4 style="color:white;">
             <?php echo $row->notice; ?>
			 </h4>
         <?php endforeach;?>
     </marquee>
	 </div>
	 </div>
		
		
		
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<!-- <!-- <div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<li><a href="<?php echo base_url();?>">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>
									<li><a href="<?php echo base_url();?>">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
									<li class="hassubs">
										<a href="<?php echo base_url();?>">Hardware<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li class="hassubs">
												<a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="<?php echo base_url();?>">Menu Item<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url();?>">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url();?>">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url();?>">Gadgets<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url();?>">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url();?>">Video Games & Consoles<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url();?>">Accessories<i class="fas fa-chevron-right"></i></a></li>
								</ul>
							</div> -->

							<!-- Main Nav Menu -->

							<!-- <div class="main_nav_menu ml-auto"> -->
	               <div class="main_nav_menu">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="<?php echo base_url();?>">Home<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a>Registration<i class="fas fa-chevron-down"></i></a>
										<ul>
										    	<li><a href="<?php echo base_url();?>index.php/auth/signupSubscriber">Subscriber Registration<i class="fas fa-chevron-down"></i></a></li>
										    		<li><a href="<?php echo base_url();?>index.php/auth/singupEmployee">Employee Registration<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>index.php/auth/singupDeliveryBoy">Delivery Incharge<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>index.php/auth/signupShop">Sub Branch Registration<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a>Business Plan<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="<?php echo base_url();?>index.php/bussiness_plan_cont/subscriber">Subscriber<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>index.php/bussiness_plan_cont/aboutpass">About Passystem<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>index.php/bussiness_plan_cont/cashback">CashBack<i class="fas fa-chevron-down"></i></a></li>
											<!-- <li><a href="<?php echo base_url();?>">Temporary/permanent Registration<i class="fas fa-chevron-down"></i></a></li> -->
											<!--<li><a href="<?php echo base_url();?>index.php/bussiness_plan_cont/chaining_sys">Sharing System<i class="fas fa-chevron-down"></i></a></li>-->
										</ul>
									</li>

									<!-- <li class="hassubs">
										<a href="<?php echo base_url();?>">Pages<i class="fas fa-chevron-down"></i></a>

										<ul>
											<li><a href="<?php echo base_url();?>assets/shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>assets/product.html">Product<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>assets/blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>assets/blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>assets/regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>assets/cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>welcome/contact">Contact<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="<?php echo base_url();?>auth/signin">Login<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li> -->
									<!-- <li><a href="<?php echo base_url();?>index.php/cashback_cont/cashback">CashBack<i class="fas fa-chevron-down"></i></a></li> -->
									<li><a href="<?php echo base_url();?>index.php/pagination"> Our Product<i class="fas fa-chevron-down"></i></a></li>
									<!-- <li><a href="<?php echo base_url();?>assets/blog.html">Blog<i class="fas fa-chevron-down"></i></a></li> -->
									<li class="hassubs">
										<a>About Us<i class="fas fa-chevron-down"></i></a>
										<ul>
										<li><a href="<?php echo base_url(); ?>index.php/about_us_cont/author_view">Author's View</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/about_us_cont/support_author_view">Best Supporting  Authorities</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/about_us_cont/topten_ach_view">Top Ten Achievers</a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url();?>index.php/contact_us_cont/contact">Contact Us<i class="fas fa-chevron-down"></i></a></li>
										<li><a href="<?php echo base_url();?>index.php/auth/signin">Login<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<!-- <div class="page_menu_search">
								<form action="<?php echo base_url();?>index.php/pagination/">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div> -->
							<ul class="page_menu_nav">
								<li class="page_menu_item">
									<a href="<?php echo base_url();?>">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="<?php echo base_url();?>">Registration<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
									    	<li onclick="location.href='<?php echo base_url();?>index.php/auth/signupSubscriber';"><a href="">Subscriber Registration<i class="fas fa-chevron-down"></i></a></li>
									    	<li onclick="location.href='<?php echo base_url();?>index.php/auth/singupEmployee';"><a href="">Employee Registration<i class="fas fa-chevron-down"></i></a></li>
									   
										<li onclick="location.href='<?php echo base_url();?>index.php/auth/singupDeliveryBoy';"><a href="">Delivery Incharge<i class="fas fa-chevron-down"></i></a></li>
										 <li onclick="location.href='<?php echo base_url();?>index.php/auth/signupShop';"><a href="">Sub Branch Registration<i class="fas fa-chevron-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="<?php echo base_url();?>">Business Plan<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
											<li onclick="location.href='<?php echo base_url();?>index.php/bussiness_plan_cont/subscriber';"><a href="">Subscriber<i class="fas fa-chevron-down"></i></a></li>
											<li onclick="location.href='<?php echo base_url();?>index.php/bussiness_plan_cont/aboutpass';"><a href="">About Passystem<i class="fas fa-chevron-down"></i></a></li>
											<li onclick="location.href='<?php echo base_url();?>index.php/bussiness_plan_cont/cashback';"><a href="<?php echo base_url();?>">Cashback<i class="fas fa-chevron-down"></i></a></li>
											<!--<li onclick="location.href='<?php echo base_url();?>index.php/bussiness_plan_cont/chaining_sys';"><a href="<?php echo base_url();?>index.php/bussiness_plan_cont/chaining_sys">Sharing System<i class="fas fa-chevron-down"></i></a></li>-->
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="<?php echo base_url();?>">About Us<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
									<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/author_view';"><a href="">Author's View<i class="fa fa-angle-down"></i></a></li>
										<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/support_author_view';"><a href="">Best Supporting  Authorities<i class="fa fa-angle-down"></i></a></li>
										<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/topten_ach_view';"><a href="">Top Ten Achievers<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="<?php echo base_url();?>">Employee<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/directorview';"><a href="">Director's View<i class="fa fa-angle-down"></i></a></li>
										<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/managerview';"><a href="">Manager's View<i class="fa fa-angle-down"></i></a></li>
										<li onclick="location.href='<?php echo base_url();?>index.php/about_us_cont/topview';"><a href="">Top Authorities's View<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="<?php echo base_url();?>index.php/pagination"> Our Product<i class="fas fa-chevron-down"></i></a></li>
								<!-- <li class="page_menu_item"><a href="<?php echo base_url();?>assets/blog.html">blog<i class="fa fa-angle-down"></i></a></li> -->
								<li class="page_menu_item"><a href="<?php echo base_url();?>index.php/contact_us_cont/contact">Contact Us<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item"><a href="<?php echo base_url();?>index.php/auth/signin">Login<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url();?>assets/images/phone_white.png" alt=""></div>+91&nbsp;&nbsp;739&nbsp;482&nbsp;6066</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url();?>assets/images/mail_white.png" alt=""></div><a href="<?php echo base_url();?>assets/mailto:passystem1@gmail.com">passystem1@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
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
				<div  style="height:400px; width:100%;">
				    <!--//div class="banner_product_image"-->
					<video controls style=" margin-left:50px; margin-top: 10px; height: 300px; width:80%;">
						<source src="<?php echo base_url();?>assets/videos/pass_video.mp4" type="video/mp4">

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
<!--<div class="container" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;-->
<!--    overflow: hidden; background-color:#e5ffec;">-->
<!--    <img  src="<?php echo base_url();?>assets/images/people/5.png" style="height:300px; width:250px;">-->
    
<!--</div>-->

<div class="container" style="margin-top:50px;">
<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Best Supporting Authorities</h3>
<hr>
<div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 442px; overflow: hidden;">
    
    <!--<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">-->
    <!--    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />-->
    <!--</div>-->

     
    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
    overflow: hidden; background-color:#e5ffec; ">
      <?php 
      $this->db->order_by('id','asc');
      $this->db->limit(10);
      $bst = $this->db->get('bst_supporting')->result();
      foreach($bst as $ddt)
      { ?>
        <div class="clearfix1 ">
			<p><a href="<?php echo base_url();?>index.php/about_us_cont/support_author_view"><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo $this->config->item('asset_url');?>/images/people/<?php echo $ddt->image;?>"/></a>
			<h4 ><?php echo $ddt->msg;?></h4>
			<br><h4><?php echo $ddt->name;?></h4></p>
        </div>
      <?php }
      ?>
      
   <!--     <div class="clearfix1" >-->
			<!--<p><a href="<?php echo base_url();?>index.php/about_us_cont/support_author_view"><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo base_url();?>assets/images/people/best_top_authorty1.jpg"/></a>-->
			<!--<h4>After just joining the PASS I didn’t succeed in my work. I failed in my life but I didn’t stopped because you shouldn’t embarrass by your failure, just learn from them and start again. After restarting with more effort I tried and now I am a successful person.</h4>-->
			<!--<br><h4>Er. Nagendra </h4></p>-->
   <!--     </div>-->
  
        
    </div>
    
    <style>
.jssorb072 .i {position:absolute;color:#000;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
.jssorb072 .i .b {fill:#fff;opacity:.3;}
.jssorb072 .i:hover {opacity:.7;}
.jssorb072 .iav {color:#fff;}
.jssorb072 .iav .b {fill:#000;opacity:.5;}
.jssorb072 .i.idn {opacity:.3;}
    </style>
<div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
    <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
            <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
        </svg>
        <div data-u="numbertemplate" class="n"></div>
    </div>
</div>
    <style>
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>

</div>
</div>


<div class="container" style="margin-top:50px;">
<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Top Ten Achievers</h3>
<hr>
<div id="slider2_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 442px; overflow: hidden;">
    
    <!--<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">-->
    <!--    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />-->
    <!--</div>-->

        
    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
   		 overflow: hidden; background-color:#e5ffec; ">
        <?php 
         
                   $this->db->order_by("pv", "desc");
        	       //$this->db->where('emp_id',$edata->username);
        	       $this->db->limit(10);
        	       $row2=$this->db->get('pv');
        	       //print_r($row2);
        	       if($row2->num_rows()>0){
        	       foreach($row2->result() as $eedata)
        	       {
        	            $this->db->where('id',$eedata->cid);
        	            $edata2= $this->db->get('customers');
        	            if($edata2->num_rows()>0){
        	             ?>
        <div class="clearfix1 ">
			<p><a href="<?php echo base_url();?>index.php/about_us_cont/topten_ach_view"><?php if(strlen($edata2->row()->image)>0) {?><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo $this->config->item('asset_url');?>/images/subscriber/<?php echo $edata2->row()->image;?>"/><?php } else {?><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;"  class="img1"   src="<?php echo base_url();?>a_pass/images/subscriber/userlogo.png"/> <?php } ?></a>
			<h4 ><?php  $this->db->where('cus_username',$edata2->row()->username);
        	            $eta= $this->db->get('viewmessage');
        	            if($eta->num_rows()>0)
        	            {
        	                echo $eta->row()->viewmsg;    
        	            }
        	            else
        	            {
        	                echo "Customer View Not Submit";
        	            }
        	            ?></h4>
			<br><h4><?php echo $edata2->row()->name;?></h4></p>
        </div>
   <?php }else{
       echo "Customer Table empty";
   }}}else{
       echo "Empty Table ";
   }?>
    </div>
    
<style>
	.jssorb072 .i {position:absolute;color:#000;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
	.jssorb072 .i .b {fill:#fff;opacity:.3;}
	.jssorb072 .i:hover {opacity:.7;}
	.jssorb072 .iav {color:#fff;}
	.jssorb072 .iav .b {fill:#000;opacity:.5;}
	.jssorb072 .i.idn {opacity:.3;}
</style>
<div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
    <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
            <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
        </svg>
        <div data-u="numbertemplate" class="n"></div>
	</div>
	</div>
		<style>
			.jssora051 {display:block;position:absolute;cursor:pointer;}
			.jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
			.jssora051:hover {opacity:.8;}
			.jssora051.jssora051dn {opacity:.5;}
			.jssora051.jssora051ds {opacity:.3;pointer-events:none;}
		</style>
		<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			</svg>
		</div>
		<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			</svg>
		</div>

	</div>
</div>





<div class="container" style="margin-top:50px;">
<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Best Advising Officers</h3>
<hr>
<div id="slider3_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 442px; overflow: hidden;">
    
    <!--<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">-->
    <!--    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />-->
    <!--</div>-->

     
    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
   		 overflow: hidden; background-color:#e5ffec; ">
        <?php 
         
                   $this->db->order_by("pv", "desc");
        	       $this->db->like('emp_id','PSUAO', 'after');
        	       $this->db->limit(10);
        	       $row1=$this->db->get('emp_pv');
        	       if($row1->num_rows()>0){
        	          $row2= $row1->result();
        	       foreach($row2 as $edata)
        	       {
        	            $this->db->where('username',$edata->emp_id);
        	            $edata1= $this->db->get('employee');
        	            if($edata1->num_rows()>0)
        	            {
        	            $this->db->where('emp_username',$edata1->row()->username);
        	            $empfd=$this->db->get('emp_feedback');
        	             ?>
        <div class="clearfix1 ">
          
			<p><a href="<?php echo base_url();?>index.php/about_us_cont/best_ao"><?php if(strlen($edata1->row()->photo)>0){?><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo $this->config->item('asset_url'). '/images/employee/' . $edata1->row()->photo; ?>"/><?php } else  { ?> <img style="margin-left:10%; margin-right:10%; width:200px; height:300px;"  class="img1"   src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/> <?php } ?></a>
			<h4><?php echo $edata1->row()->name;?></h4><br><h4><?php   if($empfd->num_rows()>0){if(strlen($empfd->row()->description)>0){ echo $empfd->row()->description; } else { echo "FeedBack Not Fill.."; } }  else { echo "FeedBack Not Fill.."; } ?></h4>
			</p>
		
        </div>
   <?php } else{
       
       echo " Empty Employee's table";
   } } } else {
   echo "Pv Not Assign";
   }?>
    </div>
    
<style>
	.jssorb072 .i {position:absolute;color:#000;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
	.jssorb072 .i .b {fill:#fff;opacity:.3;}
	.jssorb072 .i:hover {opacity:.7;}
	.jssorb072 .iav {color:#fff;}
	.jssorb072 .iav .b {fill:#000;opacity:.5;}
	.jssorb072 .i.idn {opacity:.3;}
</style>
<div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
    <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
            <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
        </svg>
        <div data-u="numbertemplate" class="n"></div>
	</div>
	</div>
		<style>
			.jssora051 {display:block;position:absolute;cursor:pointer;}
			.jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
			.jssora051:hover {opacity:.8;}
			.jssora051.jssora051dn {opacity:.5;}
			.jssora051.jssora051ds {opacity:.3;pointer-events:none;}
		</style>
		<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			</svg>
		</div>
		<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			</svg>
		</div>

	</div>
</div>

<!--==============================================================-->



<!--=====================================================================-->
<div class="container" style="margin-top:50px;">
<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Top Ten Employee</h3>
<hr>
<div id="slider4_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 442px; overflow: hidden;">
    
      <?php 
        	    $this->db->limit(10);
        	    $this->db->order_by("rank", "asc");
        	    $empp= $this->db->get("rank_emp");
        	    ?> 
        	    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
   		 overflow: hidden; background-color:#e5ffec; ">
        <?php 	
       
        foreach($empp->result() as $ddata){
        // 	  echo $ddata->emp_username;
        	    $this->db->where("username",$ddata->username);
        	   $emppdtlp= $this->db->get("employee");
        	   ?>  <div class="clearfix1"> <?php
        	   if($emppdtlp->num_rows()>0){
        	      $emppdto=$emppdtlp->row();
        	  ?>
      
			<p><a href="<?php echo base_url();?>index.php/about_us_cont/top_emp"><?php if(strlen($emppdto->photo)>0){?><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo $this->config->item('asset_url'). '/images/employee/' . $emppdto->photo; ?>"/><?php } else { ?><img style="margin-left:10%; margin-right:10%; width:200px; height:300px;" class="img1"  data-u="image" src="<?php echo $this->config->item('asset_url'). '/images/userlogo.png' ?>"/><?php } ?></a>
			<h4><?php echo $emppdto->name; ?></h4>
			<br><h4>
			    <?php $this->db->where('emp_username',$ddata->username);
			    $emp_fd = $this->db->get('emp_feedback');
			    if($emp_fd->num_rows()>0)
			    {
			        echo $emp_fd->row()->description;
			    }
			    else
			    {
			        echo "Employee View Not Submit.";
			    }?>
			</h4>
			</p>
			<?php } else { echo "Employee Record Not Found"; } ?>
        </div>
        <?php }
        ?>
    </div>
    
<style>
	.jssorb072 .i {position:absolute;color:#000;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
	.jssorb072 .i .b {fill:#fff;opacity:.3;}
	.jssorb072 .i:hover {opacity:.7;}
	.jssorb072 .iav {color:#fff;}
	.jssorb072 .iav .b {fill:#000;opacity:.5;}
	.jssorb072 .i.idn {opacity:.3;}
</style>
<div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
    <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
            <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
        </svg>
        <div data-u="numbertemplate" class="n"></div>
	</div>
	</div>
		<style>
			.jssora051 {display:block;position:absolute;cursor:pointer;}
			.jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
			.jssora051:hover {opacity:.8;}
			.jssora051.jssora051dn {opacity:.5;}
			.jssora051.jssora051ds {opacity:.3;pointer-events:none;}
		</style>
		<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			</svg>
		</div>
		<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			</svg>
		</div>

	</div>
</div>




	<!--<div class="brands" style="padding-top: 5%; padding-bottom: 5%;">-->
	<!--	<div class="container-fluid">-->
	<!--		<div class="row">-->
	<!--			<div class="col">-->
	<!--			    	<div class="viewed_title_container">-->
	<!--					<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Offer On Product</h3>-->
	<!--				</div>-->
	<!--				<div class="brands_slider_container">-->
						
						<!-- Brands Slider -->

	<!--					<div class="owl-carousel owl-theme brands_slider">-->
						     <?php 
                           
                            //  $stckdt= $this->db->get("r_launch");
                            //  if($stckdt->num_rows()>0){
                            //  $i=1;
                            //  foreach($stckdt->result() as $data):
                            //   if(strlen($data->rlaunch)>0){
                                  
                                  
                              ?>
							
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center">-->
							    
							    <!--<img src="<?php // echo $this->config->item('asset_url'). '/offerimg/' . $data->rlaunch; ?>"-->
           <!--                                  style="height:50px;width:100px;">-->
							    <!--</div></div>-->
							    	<?php //  $i++; } endforeach; } ?>
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/lakmelogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:150px;" src="<?php echo base_url();?>assets/images/masalalogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/patanjalilogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/daburlogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:180px; margin-top:30px;" src="<?php echo base_url();?>assets/images/britannialogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/chocolatelogo.webp" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/goldilogo.png" alt=""></div></div>-->

						<!--</div>-->
						
						<!-- Brands Slider Navigation -->
				<!--		<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>-->
				<!--		<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>-->
						
						

				<!--	</div>-->
				<!--</div>-->
				<!--</div>-->
				<!--</div>-->
				<!--</div>-->
	
	<!--pcode-->

	<div class="viewed" style="margin:30px;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Recently Launched Product</h3>
					</div>
					
                    <div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
						     <?php 
                           
                             $stckdt= $this->db->get("r_launch");
                             if($stckdt->num_rows()>0){
                             $i=1;
                             foreach($stckdt->result() as $data):
                              if(strlen($data->rlaunch)>0){
                                  
                                  
                              ?>
							
							<div class="owl-item">
							    <div class="brands_item d-flex flex-column justify-content-center">
							       <a href="<?php echo base_url();?>index.php/about_us_cont/launch_pro/<?php echo $data->id;?>"><img src="<?php echo $this->config->item('asset_url'). '/offerimg/' . $data->rlaunch; ?>" style="height:50px;width:100px;"></a>
							    </div>
							</div>
							    	<?php   $i++; } endforeach; } ?>
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/lakmelogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:150px;" src="<?php echo base_url();?>assets/images/masalalogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/patanjalilogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/daburlogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:180px; margin-top:30px;" src="<?php echo base_url();?>assets/images/britannialogo.png" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:200px;" src="<?php echo base_url();?>assets/images/chocolatelogo.webp" alt=""></div></div>-->
							<!--<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img style="width:100px;" src="<?php echo base_url();?>assets/images/goldilogo.png" alt=""></div></div>-->

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
						
						

					</div>
				
				</div>
			</div>
		</div>
	</div>

<!--pcode end-->
	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="color: rgb(242, 0, 137);">Best Offers</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							 <?php 
                           
                             $stckdt= $this->db->get("r_launch");
                             if($stckdt->num_rows()>0){
                             $i=1;
                             foreach($stckdt->result() as $data):
                              if(strlen($data->offer_image)>0){
                                  
                                  
                              ?>
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image">
									    <a href="<?php echo base_url();?>index.php/about_us_cont/best_offer/<?php echo $data->id;?>">
									    <img src="<?php echo $this->config->item('asset_url'). '/offerimg/' . $data->offer_image; ?>" style="height:100px;width:100px;">
									    </a>
									</div>
									<div class="viewed_content text-center"><br>
						<div class="viewed_name" ><a href="#" style="font-size:30px;"><?php echo $data->offerimg_name;?></a></div>
									</div>
									<!-- <ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul> -->
								</div>
							</div>
							<?php   $i++; } endforeach; } ?>

							<!-- Recently Viewed Item -->
						
							

						

							<!-- Recently Viewed Item -->
						
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
							<div class="char_subtitle">Within 48 hours</div>
						</div>
					</div>
				</div>
				
					<div class="col-lg-3 col-md-6 char_col mt-3">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title"><a href="<?php echo base_url();?>index.php/auth/track_order">Tracking Your Order</a></div>
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
	
	  
	    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jssor.slider.min.js"></script>

  <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 2000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $SpacingX: 12,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

           
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            
            
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            
            
         var jssor_slider2 = new $JssorSlider$("slider2_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider2() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider2.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider2, 30);
            }
            
            
            
            ScaleSlider2();

            $(window).bind("load", ScaleSlider2);
            $(window).bind("resize", ScaleSlider2);
            $(window).bind("orientationchange", ScaleSlider2);
            //responsive code end
            
            
                     var jssor_slider3 = new $JssorSlider$("slider3_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider3() {
                var parentWidth = jssor_slider3.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider3.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider3, 30);
            }
            
            
            
            ScaleSlider3();

            $(window).bind("load", ScaleSlider3);
            $(window).bind("resize", ScaleSlider3);
            $(window).bind("orientationchange", ScaleSlider3);
            //responsive code end
            
            
             var jssor_slider4 = new $JssorSlider$("slider4_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider4() {
                var parentWidth = jssor_slider4.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider4.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider4, 30);
            }
            
            
            
            ScaleSlider4();

            $(window).bind("load", ScaleSlider4);
            $(window).bind("resize", ScaleSlider4);
            $(window).bind("orientationchange", ScaleSlider4);
            //responsive code end
        });
    </script>
	    

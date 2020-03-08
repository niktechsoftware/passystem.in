<!-- start: PAGESLIDE LEFT -->
<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-left" class="pageslide inner">
<div class="navbar-content">
<!-- start: SIDEBAR -->
<div class="main-navigation left-wrapper transition-left">
<div class="navigation-toggler hidden-sm hidden-xs">
    <a href="#main-navbar" class="sb-toggle-left">
    </a>
</div>
    <div class="user-profile border-top padding-horizontal-10 block">
    <div class="inline-block">
    
                        <img src="<?php echo $this->config->item('asset_url'); ?>/images/anonymous.jpg" class="img-circle" style="width:50px; margin-left:-6px; margin-top:-10px;" alt="">
                            
                    </div>
                        <div class="inline-block">
                            <h5 class="no-margin"> Welcome </h5>
                            <h4 class="no-margin"> <?php echo $this->session->userdata('name'); ?> </h4>
                            <a class="btn user-options sb_toggle open">
                                <i class="fa fa-cog"></i>
                            </a>
                        </div>
                    </div>
<!-- start: MAIN NAVIGATION MENU -->

<!-- ===================================================== Administrator Menu Start ======================================= -->
<?php if(($this->session->userdata('login_type') == 1 )): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span> </a>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Branch</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/bregistration">
                Branch Registration <i class="icon-arrow"></i>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/branchListActive">
                <span class="title"> Branch Active List  </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/branchListinActive">
                <span class="title"> Branch Inactive List </span>
            </a>
        </li>
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Shop </span><i class="icon-arrow"></i> </a>
   
<ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchReg">
                Registration <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchList">
               Active List <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchInactiveList">
              Inactive List <i class="icon-arrow"></i>
            </a>
        </li>
        <!-- <li>
            <a href="<?php echo base_url(); ?>index.php/studentHWControllers/showHomeWork">
                Pending Invoice <i class="icon-arrow"></i>
            </a>
        </li> -->
    </ul>
<li>
        <a href="javascript:;">
            <i class="fa fa-wrench"></i> <span class="title">Products</span><i class="icon-arrow"></i> <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>index.php/stockController/defineCategory">
                Define Category  <i class="icon-arrow"></i>
                </a>
            </li>
         </ul>
         <!-- <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>index.php/login/feecategory">
                Category List  <i class="icon-arrow"></i>
                </a>
            </li>
         </ul>
          <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>index.php/login/staffcategory">
                Sub Category List  <i class="icon-arrow"></i>
                </a>
            </li>
         </ul> -->
         <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>index.php/stockController/addProduct">
               Add Product  <i class="icon-arrow"></i>
                </a>
            </li>
         </ul>
          <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>index.php/stockController/stocklist">
              Stock Product List  <i class="icon-arrow"></i>
                </a>
            </li>
         </ul>
    </li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title">Stock $ Items </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/stockController/producttransfer">-->
        <!--        <span class="title"> Product Transfer </span>-->
        <!--    </a>-->
        <!--</li>-->
        <!-- <li>-->
        <!--    <a href="<?php echo base_url();?>stockController/sale_product">-->
        <!--        <span class="title">Product Sale</span>-->
        <!--    </a>-->
        <!--</li>-->
         <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/transferproductlist/3">
                <span class="title">Total Transfer Product List </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/transferproductlist/5">
                <span class="title">Today's Transfer Product List </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/assignproduct/">
                <span class="title">Assign Transfer Product List </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/recieveproductlist">
                <span class="title">Today's Receive Product List </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/branchstocklist">
                <span class="title">Branch Product List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/subbranchstocklist">
                <span class="title">Shop Product List</span>
            </a>
        </li>
       
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="title"> Subscriber Requirement </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <!-- <li>
            <a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                <span class="title">Favourite List</span>
            </a>
        </li> -->
        <li>
           <!-- <a href="<?php echo base_url(); ?>index.php/adminController/adminsubscriberdemandList">-->
            <a href="<?php echo base_url(); ?>index.php/adminController/admindemandList">
                <span class="title">Demand List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberOtherDemandList">
                <span class="title">Other Demand List</span>
            </a>
        </li>
        

    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-money"></i> <span class="title">Subscriber </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberReg">
                <span class="title">Registration</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscActiveList">
                <span class="title">Subscriber List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/cash_back_request">
                <span class="title">Cashback Request</span>
            </a>
        </li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/subscriberController/subsciberInactiveList">-->
        <!--        <span class="title">Inactive List</span>-->
        <!--    </a>-->
        <!--</li>-->
       
        
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-sitemap"></i> <span class="title"> Employee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
    <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/empRegistration">
                <span class="title">Employee Registration</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/empActiveList">
                <span class="title">Employee Active  List </span>
            </a>
        </li>
        <li>

            <a href="<?php echo base_url(); ?>index.php/employeeController/empInactiveList">

                <span class="title">Employee Inactive  List </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/top10Employee">
                <span class="title"> Top 10 Employee </span>
            </a>
        </li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/login/stuAttendanceReport">-->
        <!--        <span class="title"> Authority Set </span>-->
        <!--    </a>-->
        <!--</li>-->
       <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/deliveryInchargeList">
                <span class="title"> Delivery Incharge List </span>
            </a>
        </li>
  
    </ul>
</li>
       <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title">Order List</span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">
	               <li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/2/a">Demand Orders List By Branch.<i class="icon-arrow"></i>
					</a>
				</li>	<li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/1/a">Available Orders List of Branch.<i class="icon-arrow"></i>
					</a>
				</li>
					<li>
					<a href="<?php echo base_url();?>shopController/sborder/a">Over All Demand Order Of Branch<i class="icon-arrow"></i>
					</a>
				</li>
				 <li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/3/a">Confirmed Order List<i class="icon-arrow"></i>
					</a>
				</li>
			<!--	<li>
					<a href="<?php echo base_url();?>shopController/sborder">Pending Orders<i class="icon-arrow"></i>
					</a>
				</li>-->
				<!--<li>
					<a href="<?php echo base_url();?>shopController/sbpaidorder">Paid Orders<i class="icon-arrow"></i>
					</a>
				</li>-->
			</ul>
       </li>  
  
<li>
    <a href="javascript:void(0)"><i class="fa fa-hospital-o"></i> <span class="title">Approval System</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/adminController/verify_payment">
                <span class="title">Verify Payment</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/adminController/cnfrm_amount">
                <span class="title">Payment Approvel Orderwise</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/adminController/offlinepaymentapproval">
                <span class="title">Payment Approvel</span>
            </a>
        </li>
         <li>
             <a href = "<?php echo base_url(); ?>index.php/adminController/adminorderapprove">
             <span class="title">Pending  Order Approvel</span>
             </a>
        </li>
         <li>
             <a href = "<?php echo base_url(); ?>index.php/adminController/paidadminorderapprove">
             <span class="title">Paid Orders </span>
             </a>
        </li>
       

    </ul>
</li>
        
<li>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="title"> Meetings </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url();?>employeeController/meeting">
              <i class="fa fa-user"></i>  <span class="title"> Sms for Meetings </span>
            </a>
        </li>
       <li>
            <a href="<?php echo base_url();?>index.php/adminController/create_meeting"><i class="fa fa-cogs"></i> <span class="title">Sponsorship</span></a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/adminController/AO_assign">
                <i class="fa fa-user"></i> <span class="title">Assign AO for Meeting</span>
            </a>
        </li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberOtherDemandList">-->
        <!--        <span class="title">Other Demand List</span>-->
        <!--    </a>-->
        <!--</li>-->
        

    </ul>
</li>

<!-- <li>
    <a href="javascript:;">
        <i class="fa fa-envelope"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/noticeAlert">
                Notice / Alert <i class="icon-arrow"></i>
            </a>

                </li>
                <li>
            <a href="<?php echo base_url(); ?>index.php/login/message">
               Message <i class="icon-arrow"></i>
            </a>

                </li>

            </ul>
        </li> -->
       <li>
    <a href="javascript:;">
        <i class="fa fa-envelope-o"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
   				 <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/smssetting">
		                 SMS Setting<i class="icon-arrow"></i>
		            </a>
                </li>
        		<li>
		            <a href="<?php echo base_url(); ?>sms">
		                Send Message<i class="icon-arrow"></i>
		            </a>
                </li>
                <!-- <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/mobileNotice/Parent%20Message">
		              Parent Message <i class="icon-arrow"></i>
		            </a>
                </li>
                 <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/mobileNotice/Announcement">
		               Announcement(For Staff)<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/mobileNotice/Greeting">
		              Greeting (To All)<i class="icon-arrow"></i>
		            </a>
                </li>

                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/classwise">
		            Class Wise <i class="icon-arrow"></i>
		            </a>
                </li> -->

            </ul>
 </li>
 <!--////////////////////product_transfer//////////////////-->
 
        <li>
    <a href="javascript:;">
        <i class="fa fa-envelope-o"></i> <span class="title"> Product Transfer</span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
   				 <li>
		            <a href="<?php echo base_url(); ?>index.php/stockController/admin_to_other">
		                 Admin To Other<i class="icon-arrow"></i>
		            </a>
                </li>
        		<!--<li>-->
		        <!--    <a href="<?php echo base_url(); ?>index.php/stockController/branch_to_other">-->
		        <!--        Branch To Other<i class="icon-arrow"></i>-->
		        <!--    </a>-->
          <!--      </li>-->
              <!--  <li>-->
		            <!--<a href="<?php echo base_url(); ?>index.php/stockController/shop_to_other">-->
		            <!--  Shop To Other<i class="icon-arrow"></i>-->
		            <!--</a>-->
              <!--  </li>-->
                <!--  <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/mobileNotice/Announcement">
		               Announcement(For Staff)<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/adminController/mobileNotice/Greeting">
		              Greeting (To All)<i class="icon-arrow"></i>
		            </a>
                </li>

                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/classwise">
		            Class Wise <i class="icon-arrow"></i>
		            </a>
                </li> -->

            </ul>
 </li>
 
 <!--//////////////////product_tr_end///////////////-->
 <li>
    <a href="javascript:;">
        <i class="fa fa-money"></i> <span class="title"> Accounting </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>adminController/dayBook">
               Day Book<i class="icon-arrow"></i>
            </a>

                </li>
                <li>
            <a href="<?php echo base_url(); ?>adminController/pvdayBook">
              Pv Day Book<i class="icon-arrow"></i>
            </a>

                </li>
            <!--    <li>-->
            <!--<a href="<?php echo base_url(); ?>shopController/cashPayment">-->
            <!--  Transaction <i class="icon-arrow"></i>-->
            <!--</a>-->

            <!--</li>-->
      </ul>
    </li>

<li>
	    <a href="javascript:;">
	        <i class="fa fa-eye"></i> <span class="title"> Website Upload </span><i class="icon-arrow"></i> <span class="arrow "></span>
	    </a>
	    <ul class="sub-menu">
	        <li>
	            <a href="<?php echo base_url(); ?>adminController/upload_image">
	              Offer Image<i class="icon-arrow"></i>
	            </a>
	        </li>
	         <li>
	            <a href="<?php echo base_url(); ?>adminController/upload_ad">
	             Upload Best Supporting<i class="icon-arrow"></i>
	            </a>
	        </li>
	        <!-- <li>-->
	        <!--    <a href="<?php echo base_url(); ?>adminController/ten_acheiver">-->
	        <!--      Top Ten Acheiver<i class="icon-arrow"></i>-->
	        <!--    </a>-->
	        <!--</li>-->
	         <li>
	            <a href="<?php echo base_url(); ?>adminController/rank_employee">
	              Rank Employee<i class="icon-arrow"></i>
	            </a>
	        </li>
	     </ul>
	</li>

	<li>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="title"> Matching Day Book</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
    	    <a href="<?php echo base_url(); ?>shopController/datewisematch">
    	        <i class="fa fa-eye"></i> <span class="title"> Matching Day Book Out</span>
    	    </a>
	    </li>
      <li>
    	    <a href="<?php echo base_url(); ?>adminController/admin_pay_recieve">
    	        <i class="fa fa-eye"></i> <span class="title">Pay And Recieve </span>
    	    </a>
	    </li>
	    <!-- <li>-->
    	<!--    <a href="<?php echo base_url(); ?>adminController/matching_day_book">-->
    	<!--        <i class="fa fa-eye"></i> <span class="title"> Matching Day Book In</span>-->
    	<!--    </a>-->
	    <!--</li>-->

    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="title">Complain</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
    	    <a href="<?php echo base_url(); ?>adminController/complain">
    	        <i class="fa fa-eye"></i> <span class="title"> View Complain</span>
    	    </a>
	    </li>

    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-users"></i> <span class="title">Generate ID Card</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <!--<li>-->
        <!--    <a href="<?php echo base_url();?>employeeController/id_card/3">-->
        <!--      <i class="fa fa-user"></i>  <span class="title">Employee ID Card </span>-->
        <!--    </a>-->
        <!--</li>-->
        <!-- <li>-->
        <!--    <a href="<?php echo base_url();?>subscriberController/id_card/5">-->
        <!--      <i class="fa fa-user"></i>  <span class="title">Subscriber ID Card </span>-->
        <!--    </a>-->
        <!--</li>-->
        <li>
            <a href="<?php echo base_url();?>adminController/aid_card">
              <i class="fa fa-user"></i>  <span class="title">ID Card </span>
            </a>
        </li>
    </ul>
</li>
          
    

</ul>
<?php endif;?>

<!-- ===================================================== Administrator Menu End ======================================= -->
<!-- ===================================================== Student Menu Start ======================================= -->

<!-- ===================================================== Accountent Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == '2'): ?>
<ul class="main-navigation-menu">
    <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/index">
               <i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span>
            </a>
        </li>
     <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/branchfull_profile">
              <i class="fa fa-user"></i>  <span class="title"> Full Profile </span>
            </a>
        </li>
         <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title"> Shop </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchReg">
                 Registration <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchList">
                Active List <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/subBranchInactiveList">
                Inactive List <i class="icon-arrow"></i>
            </a>
        </li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/shopControllers/showHomeWork">-->
        <!--        Sub Branch Pending Invoice <i class="icon-arrow"></i>-->
        <!--    </a>-->
        <!--</li>-->
    </ul>
</li>
 <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title"> Pending Order List </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/sbranchOrderlist">
                Sub Branch Order List <i class="icon-arrow"></i>
            </a>
        </li>
    </ul>
</li>
 <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title">Stock And Item </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
         <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/transferproductlist/5">
                <span class="title">Today's Transfer Product List </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/shopController/recieveproductlist">
                <span class="title">Today's Receive Product List </span>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/branchstocklist">
            Branch Stock Product List <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/subbranchstocklist">
            Shop Product List <i class="icon-arrow"></i>
            </a>
        </li>
    </ul>
</li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/branchController/producttransfer">-->
        <!--       <i class="fa fa-user"></i> <span class="title"> Product Transfer </span>-->
        <!--    </a>-->
        <!--</li>-->
         <li>
            <a href="<?php echo base_url(); ?>index.php/stockController/branch_to_other">
               <i class="fa fa-user"></i> <span class="title">New Product Transfer </span>
            </a>
        </li>
        
          <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title"> Subscriber </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberReg">
                Subscriber Registration <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscActiveList">
                Active List <i class="icon-arrow"></i>
            </a>
        </li>
        <!--<li>-->
        <!--    <a href="<?php echo base_url(); ?>index.php/subscriberController/subsciberInactiveList">-->
        <!--        Inactive List <i class="icon-arrow"></i>-->
        <!--    </a>-->
        <!--</li>-->
        
         <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberdemandList">
                Shop Demand List <i class="icon-arrow"></i>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/overalldlbarnch">
                Over All Demand List <i class="icon-arrow"></i>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/subscriberController/subscriberOtherDemandList">
                Subscriber Other Demand List <i class="icon-arrow"></i>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title"> Employee </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/empRegistration">
                Employee Registration <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/empActiveList">
                Active List <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/empInactiveList">
                Inactive List <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/employeeController/deliveryInchargeList">
                <span class="title"> Delivery Incharge List </span>
            </a>
        </li>
    </ul>
</li>
 <!--<li>-->
 <!--           <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/TeacherLeave">-->
 <!--              <i class="fa fa-user"></i> <span class="title"> Send Sms</span>-->
 <!--           </a>-->
 <!--       </li>-->
         <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title">Order List</span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">
	               <li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/2/b">Demand Orders List By Shop.<i class="icon-arrow"></i>
					</a>
				</li>	<li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/1/b">Available Orders List of Shop.<i class="icon-arrow"></i>
					</a>
				</li>
					<li>
					<a href="<?php echo base_url();?>shopController/sborder/b">Over All Demand Order Of Branch<i class="icon-arrow"></i>
					</a>
				</li>
				 <li>
					<a href="<?php echo base_url();?>shopController/avaofb">Confirmed Order for Shop<i class="icon-arrow"></i>
					</a>
				</li>
			<!--	<li>
					<a href="<?php echo base_url();?>shopController/sborder">Pending Orders<i class="icon-arrow"></i>
					</a>
				</li>-->
				<!--<li>
					<a href="<?php echo base_url();?>shopController/sbpaidorder">Paid Orders<i class="icon-arrow"></i>
					</a>
				</li>-->
			</ul>
       </li>
        <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title"> Accounts  </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/daybook">
                DayBook <i class="icon-arrow"></i>
            </a>
        </li>
    </ul>
</li>
        <li>
    <a href="javascript:;">
        <i class="fa fa-book"></i> <span class="title">Branch Approval System </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/branchController/offlinepaymentapproval">
             Payment Approval <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>/index.php/branchController/branchorderapprove">
                Order Approval <i class="icon-arrow"></i>
            </a>
        </li>
    </ul>
</li>   <li>
               <a href="<?php echo base_url(); ?>index.php/shopController/lockManage">
                   <i class="fa fa-lock"></i> <span class="title">Lock System</span>
                </a>
            </li>
   </ul>
<?php endif;?>
<!-- ===================================================== Accountent Menu End ======================================= -->

<!-- ===================================================== Employee Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == '4'): ?>
<ul class="main-navigation-menu">
    <li>
            <a href="<?php echo base_url(); ?>shopController/index">
               <i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span>
            </a>
        </li>
	 <li>
            <a href="<?php echo base_url();?>shopController/sbranchfull_profile">
              <i class="fa fa-user"></i>  <span class="title"> Full Profile </span>
            </a>
        </li>
        
         <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title"> Product List </span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">

				<li>
					<a href="<?php echo base_url();?>stockController/stocklist">Stock Product List<i class="icon-arrow"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>shopController/transferproductlist/5">  Transfer Product List <i class="icon-arrow"></i>
					</a>
				</li>
				<li>
            <a href="<?php echo base_url(); ?>index.php/shopController/recieveproductlist">
                <span class="title"> Receive Product List <i class="icon-arrow"></i> </span>
            </a>
           </li>
				<!--<li>-->
				<!--	<a href="<?php echo base_url();?>stockController/todaysubbranchstock">Received Product List <i class="icon-arrow"></i>-->
				<!--	</a>-->
				<!--</li>-->
			</ul>
       </li>
       

        
       
 <!--<li>
            <a href="<?php echo base_url();?>stockController/sale_product">
               <i class="fa fa-money"></i> <span class="title">Product Sale</span>
            </a>
        </li>-->
        	<li>
            <a href="<?php echo base_url();?>stockController/newsaleproduct">
               <i class="fa fa-money"></i> <span class="title">Product Sale</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>shopController/pay_and_receive ">
               <i class="fa fa-money"></i> <span class="title">Product Receive And Pay</span>
            </a>
        </li>
         <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title">Order List</span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">
	               <li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/2/s">Demand Orders List By Sub.<i class="icon-arrow"></i>
					</a>
				</li>	<li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/1/s">Available Orders List of Sub.<i class="icon-arrow"></i>
					</a>
				</li>
					<li>
					<a href="<?php echo base_url();?>shopController/sborder/s">Over All Demand Order Of Shop<i class="icon-arrow"></i>
					</a>
				</li>
				 <li>
					<a href="<?php echo base_url();?>shopController/availableOrderList/3/s">Confirmed Order List<i class="icon-arrow"></i>
					</a>
				</li>
			<!--	<li>
					<a href="<?php echo base_url();?>shopController/sborder">Pending Orders<i class="icon-arrow"></i>
					</a>
				</li>-->
				<li>
					<a href="<?php echo base_url();?>shopController/sbpaidorder">Paid Orders<i class="icon-arrow"></i>
					</a>
				</li>
			</ul>
       </li>

       
        <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title"> Subscriber </span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">

				<li>
					<a href="<?php echo base_url();?>subscriberController/subscriberReg">Subscriber Registration<i class="icon-arrow"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>subscriberController/subsciberActiveList">Subscriber List<i class="icon-arrow"></i>
					</a>
				</li>
			</ul>
       </li>
	   <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title"> Subscriber Requirement </span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">

				<li>
					<a href="<?php echo base_url();?>shopController/shopfavouritelist">Demand List By Subscriber<i class="icon-arrow"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>shopController/shopshowdemandlist">Overall Demand List<i class="icon-arrow"></i>
					</a>
				</li>
			</ul>
       </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/stockController/shop_to_other">
              <i class="fa fa-user"></i>Shop To Other<i class="icon-arrow"></i>
            </a>
        </li>
	   <li>
            <a href="<?php echo base_url();?>shopController/sbdircpt">
               <i class="fa fa-user"></i> <span class="title">Generate D.I. List</span>
            </a>
        </li>
        
          <li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title"> Matching Amount </span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">

				<li>
					<a href="<?php echo base_url();?>shopController/match_daybook">All Orders<i class="icon-arrow"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>shopController/datewisematch">DateWise<i class="icon-arrow"></i>
					</a>
				</li>
			</ul>
       </li>
       
		<li>
			<a href="javascript:;">
				<i class="fa fa-book"></i> <span class="title"> Accounts </span><i class="icon-arrow"></i> <span class="arrow "></span>
			</a>
			<ul class="sub-menu">

				<li>
					<a href="<?php echo base_url();?>shopController/dayBook">Daybook<i class="icon-arrow"></i>
					</a>
				</li>
				
			</ul>
       </li>
         <li>
               <a href="<?php echo base_url(); ?>index.php/shopController/lockManage">
                   <i class="fa fa-lock"></i> <span class="title">Lock System</span>
                </a>
            </li>
   </ul>




<?php endif; ?>
<!-- ===================================================== Employee Menu End ======================================= -->

<!-- ===================================================== Teacher Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == '5'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url();?>index.php/subscriberController/index"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
</li>

<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/profile"><i class="fa fa-cogs"></i> <span class="title"> Full Profile </span></a>
</li>
<!--<li>-->
<!--    <a href="<?php echo base_url();?>index.php/subscriberController/create_fv"><i class="fa fa-cogs"></i> <span class="title"> Create Favourite List </span></a>-->
<!--</li>-->
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/new_create_fv"><i class="fa fa-cogs"></i> <span class="title"> New Create Favourite List </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/my_fvlist"><i class="fa fa-cogs"></i> <span class="title"> My Favourite List </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/my_phlist"><i class="fa fa-cogs"></i> <span class="title"> My Purchase List </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/my_bill"><i class="fa fa-cogs"></i> <span class="title"> My Bill </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/tree"><i class="fa fa-cogs"></i> <span class="title"> UpLine/DownLine </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/id_card"><i class="fa fa-cogs"></i> <span class="title"> ID Card </span></a>
</li>
<li>
    <a href="<?php echo base_url();?>index.php/subscriberController/cashback_demand"><i class="fa fa-cogs"></i> <span class="title">CashBack Demand</span></a>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-code"></i> <span class="title">Subscriber</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">


        <li>
            <a href="<?php echo base_url();?>index.php/subscriberController/kyc">
                <span class="title">Submission Of KYC</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url();?>index.php/subscriberController/wallet">
                <span class="title">Wallet</span>
            </a>
        </li>
          <li>
            <a href="<?php echo base_url();?>index.php/subscriberController/order_details">
                <span class="title">Order Details</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>index.php/subscriberController/feedback">
                <span class="title">Send View</span>
            </a>
        </li>

    </ul>
</li>
<!--<li>-->
<!--    <a href="<?php echo base_url();?>index.php/subscriberController/create_meeting"><i class="fa fa-cogs"></i> <span class="title">Sponsership</span></a>-->
<!--</li>-->
</ul>
<?php endif;?>

<!--====================================Subscriber menu End========================-->
<?php if($this->session->userdata('emp_type') == '5'): ?>
<ul class="main-navigation-menu">
    <li>
            <a href="<?php echo base_url(); ?>employeeController/index">
               <i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span>
            </a>
        </li>
	 <li>
            <a href="<?php echo base_url();?>employeeController/empfull_profile">
              <i class="fa fa-user"></i>  <span class="title"> Full Profile </span>
            </a>
        </li>
      
       <li>
            <a href="<?php echo base_url();?>employeeController/deliveryOrderList">
              <i class="fa fa-user"></i>  <span class="title"> OrderList </span>
            </a>
        </li>
	  <li>
            <a href="<?php echo base_url();?>employeeController/empid_card">
              <i class="fa fa-user"></i>  <span class="title"> ID Card </span>
            </a>
        </li>
	   <li>
            <a href="<?php echo base_url();?>employeeController/deliverypayment">
               <i class="fa fa-user"></i> <span class="title">Payment Option</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url();?>employeeController/empwallet">
               <i class="fa fa-user"></i> <span class="title">Wallet</span>
            </a>
        </li>

   </ul>




<?php endif; ?>
<!-- ===================================================== Delivery Menu End ======================================= -->
<?php if($this->session->userdata('emp_type') == '7'): ?>
<ul class="main-navigation-menu">
    <li>
            <a href="<?php echo base_url(); ?>employeeController/index">
               <i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span>
            </a>
        </li>
	 <li>
            <a href="<?php echo base_url();?>employeeController/empfull_profile">
              <i class="fa fa-user"></i>  <span class="title">AO Full Profile </span>
            </a>
        </li>
      
       <!--<li>-->
       <!--     <a href="<?php echo base_url();?>employeeController/meeting">-->
       <!--       <i class="fa fa-user"></i>  <span class="title"> Meetings </span>-->
       <!--     </a>-->
       <!-- </li>-->
         <li>
            <a href="<?php echo base_url();?>employeeController/aftermeeting">
              <i class="fa fa-user"></i>  <span class="title">After Meetings </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url();?>employeeController/visitor_entry ">
              <i class="fa fa-user"></i>  <span class="title"> Visitor Entry </span>
            </a>
        </li>
	  <li>
            <a href="<?php echo base_url();?>employeeController/id_card">
              <i class="fa fa-user"></i>  <span class="title"> ID Card </span>
            </a>
        </li>
          <li>
            <a href="<?php echo base_url();?>employeeController/empwallet">
               <i class="fa fa-user"></i> <span class="title">Wallet</span>
            </a>
        </li>
	   <!--<li>-->
    <!--        <a href="<?php echo base_url();?>employeeController/deliverypayment">-->
    <!--           <i class="fa fa-user"></i> <span class="title">Payment Option</span>-->
    <!--        </a>-->
    <!--    </li>-->

   </ul>




<?php endif; ?>
<!-- ===================================================== AO Menu End ======================================= -->

<?php if($this->session->userdata('emp_type') == '6'): ?>
<ul class="main-navigation-menu">
    <li>
            <a href="<?php echo base_url(); ?>employeeController/index">
               <i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span>
            </a>
        </li>
	 <li>
            <a href="<?php echo base_url();?>employeeController/empfull_profile">
              <i class="fa fa-user"></i>  <span class="title">Full Profile </span>
            </a>
        </li>
      
   <!--    <li>-->
   <!--         <a href="<?php echo base_url();?>employeeController/meeting">-->
   <!--           <i class="fa fa-user"></i>  <span class="title"> Meetings </span>-->
   <!--         </a>-->
   <!--     </li>-->
	  <li>
            <a href="<?php echo base_url();?>employeeController/id_card">
              <i class="fa fa-user"></i>  <span class="title"> ID Card </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url();?>employeeController/empwallet">
               <i class="fa fa-user"></i> <span class="title">Wallet</span>
            </a>
        </li>
	   <!--<li>-->
    <!--        <a href="<?php echo base_url();?>employeeController/deliverypayment">-->
    <!--           <i class="fa fa-user"></i> <span class="title">Payment Option</span>-->
    <!--        </a>-->
    <!--    </li>-->

   </ul>




<?php endif; ?>
<!-- ===================================================== Accoutant Menu End ======================================= -->

<!-- ===================================================== Teacher Menu End ======================================= -->

<!-- end: MAIN NAVIGATION MENU -->
</div>
<!-- end: SIDEBAR -->
</div>
<div class="slide-tools">
    <div class="col-xs-6 text-left no-padding">
        <a class="btn btn-sm status" href="#">
            Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
        </a>
    </div>
    <div class="col-xs-6 text-right no-padding">
        <a class="btn btn-sm log-out text-right" href="<?php echo base_url()?>index.php/homeController/logout">
            <i class="fa fa-power-off"></i> Log Out
        </a>
    </div>
</div>
</nav>
<!-- end: PAGESLIDE LEFT -->
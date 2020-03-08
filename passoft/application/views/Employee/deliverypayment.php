
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel">
			<div class="panel-body">
		    <div class="card">
              <div class="card-header">
               <center><h2 style="color:#01a9ac;font-size:20px;">Payment Collection Detail</h2></center>
               </div>
             </div>
            <form action="<?php echo base_url();?>employeeController/collectpayment/<?php echo $this->session->userdata('username');?>" method="post">
             <div class="row">
								            <div class="col-sm-12">
											<center><h4 class="panel-title">Payment Source</h4></center>
											<div class="panel-body" style="margin-top:20px;">
											<div class="col-md-4">
											<select class="form-control" id="selectforpayment" name="selectforpayment" style="height:40px;"><span style="color:red;">*</span>
											  <option value="">--Select Payment Option--</option>    
											 <option value="Paytm">Paytm Payment</option>
											 <option value="Account">Direct Account</option>
											 <option value="BankQr">Bank Qr code</option>
											 <option value="BhimUPI">Bhim UPI</option>
											 <option value="GooglePay">Google Pay</option>
											 <option value="cod">Cash On Delivery</option>
											 <option value="PhonePe">PhonePe</option>  
											</select>
										</div>
										<div  class="col-md-4" style="margin-top:2px;">
		                        <input type="text" class="form-control"  id="transaction"  name="transactionid" style="height:42px;" placeholder="Fill transaction id" required="">
		                                   </div>
		                                   <div  class="col-md-4" style="margin-top:2px;">
		                        <input type="text" class="form-control" id="orderId" name="orderid" <?php if($this->uri->segment(3)){?> value = "<?php echo $this->uri->segment(3);?> "  readonly ="readonly" <?php } ?> style="height:42px;" placeholder="Fill Order id">
		                                   </div>
		                                   </div>
			
			<div class="form-group">
            <div class="form-group" id="paytm">
			  <div class="row">
			       <div class="col-md-12" style="margin-top:5px;"> 
			       <label for="name" style="color:blue;margin-left:20px;" class="text-uppercase" >Paytm QR CODE Transaction:</label>
			       <div class="col-md-12">
			        <img src="<?php echo $this->config->item('asset_url');?>/images/payment/paytm.png" style="width:200px; height:250px;">
			        </div>
			    
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
		<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
		</div>
          </div>
          </div>
          <div class="form-group" id="directaccount">
		   <div class="row">
		        <div class="col-md-12" style="margin-top:5px;"> 
		       	<label  style="color:blue;margin-left:20px;" class="text-uppercase">PAS SYSTEM ACCOUNT DETAILS :</label>
			          <div class="col-md-12">
			            <lable>ACCOUNT HOLDER NAME:</lable>&nbsp;&nbsp;<span>PROGENY ALTERATION OF SUBSCRIBING SYSTEM</span>
			       </div>
			       <div class="col-md-12">
			            <lable>ACCOUNT NO:</lable>&nbsp;&nbsp;&nbsp;<span>696020110000470</span>
			       </div>
			       <div class="col-md-12">
			             <lable>BANK NAME :</lable>&nbsp;&nbsp;&nbsp;<span>BANK OF INDIA</span>
			       </div>
			       <div class="col-md-12">
			            <lable>IFSC CODE :</lable>&nbsp;&nbsp;&nbsp;<span>BKID0006960</span>
			       </div>
			       </div>
                </div>
                
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:20px;">
	<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
            </div>
              <div class="form-group" id="bankqrcode">
			 <div class="row">
			     <div class="col-md-12" style="margin-top:5px;">
			   <label style="color:blue;margin-left:20px;"  class="text-uppercase">BANK QR CODE transaction :</label>
			   <div class="col-md-12">
			        <img src="<?php echo $this->config->item('asset_url');?>/images/payment/paytm.png" style="width:200px; height:250px;">
			        </div>
			        </div>
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
		<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
			       </div>
          </div>
          <div class="form-group" id="bhimupi">
			       <div class="row">
			            <div class="col-md-12" style="margin-top:5px;">
			          <label style="color:blue;margin-left:20px;" class="text-uppercase">BHIM UPI transaction:</label>
                   <div class="col-md-12">
			         <img src="<?php echo $this->config->item('asset_url'); ?>/images/payment/paytm.png" style="width:200px; height:250px;">
			        </div>
			      </div>
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
	<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
			       </div>
              </div>
              <div class="form-group" id="googlepay">
			       <div class="row">
			          <div class="col-md-12" style="margin-top:5px;">
			          <label style="color:blue;margin-left:20px;" class="text-uppercase">GOOGLE PAY transaction:</label>
                      <div class="col-md-12">
			         <img src="<?php echo $this->config->item('asset_url'); ?>/images/payment/google_pay.jpeg" style="width:200px; height:200px;">
			        </div>
			      </div>
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
		<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
			       </div>
              </div>
              <div class="form-group" id="cashondelivery">
			       <div class="row">
			           <div class="col-md-12" style="margin-top:5px;">
			          <label style="color:blue;margin-left:20px;">CASH ON DELIVERY:</label>
                   <div class="col-md-12">
			         <!-- <img src="<?php //echo $this->config->item('asset_url'); ?>/images/payment/paytm.png" style="width:200px; height:250px;"> -->
			        </div>
			        </div>
                <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                <input type="submit" class="btn btn-danger" value="Confirm to Pay">	
                </div>
			       </div>
              </div>
              <div class="form-group" id="phonepey">
			       <div class="row">
			            <div class="col-md-12" style="margin-top:5px;">
			          <label style="color:blue;margin-left:20px;" class="text-uppercase">PHONEPE transaction:</label>
                    <div class="col-md-12">
			         <img src="<?php echo $this->config->item('asset_url'); ?>/images/payment/phone_pay.jpeg" style="width:200px; height:200px;">
			        </div>
			        </div>
		<div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
		<input type="submit" class="btn btn-danger" value="Confirm to Pay">	
		</div>
			       </div>
              </div>
              </div>
		
									   
       </div>
    	</div>
         </div>
          
        </div>
        </div>
         </form> 
        </div>        						
	 	</div>
  <script>
    $(document).ready(function(){
        
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
    $('#transaction').hide();
    $('#orderId').hide();
    $("#selectforpayment").change(function(){
      var value=$("#selectforpayment").val();
      //alert(value);
       if(value=="")
      {
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
    $('#transaction').hide();
     $('#orderId').hide();
      }
      if(value=="Paytm")
      {
    $('#paytm').show();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
     $('#transaction').show();
      $('#orderId').show();
      }
      if(value=="Account")
      {
          
     $('#paytm').hide();
    $('#directaccount').show();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
     $('#transaction').show();
      $('#orderId').show();
      }
      if(value=="BankQr")
      {
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').show();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
     $('#transaction').show();
       $('#orderId').show();   
      }
      if(value=="BhimUPI")
      {
   $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#googlepay').hide();
    $('#bhimupi').show();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
     $('#transaction').show();
     $('#orderId').show();
      }
     if(value=="GooglePay")
      {
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').show();
    $('#cashondelivery').hide();
    $('#phonepey').hide();
     $('#transaction').show();
       $('#orderId').show();   
      }
      if(value=="PhonePe")
      {
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').hide();
    $('#phonepey').show();
     $('#transaction').show();
       $('#orderId').show();   
      }
      if(value=="cod")
      {
    $('#paytm').hide();
    $('#directaccount').hide();
    $('#bankqrcode').hide();
    $('#bhimupi').hide();
    $('#googlepay').hide();
    $('#cashondelivery').show();
    $('#phonepey').hide();
     $('#transaction').show();
       $('#orderId').show();   
      }
        
       });
    });
    </script>
  
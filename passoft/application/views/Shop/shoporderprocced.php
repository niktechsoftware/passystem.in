<!-- Page body start -->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>



	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
     return false;
    // $('#message').html('only digits').css('color', 'red');
    }
    return true;
   
}


$(document).ready(function(){
    
$('#addressprint').show();
$('#addressinsert').hide();
 $("#phonenumber").change(function(){
     var mn=$("#phonenumber").val();
  //alert(mn);
   $.post("<?php echo site_url("welcome/sendotp")?>",{mn:mn},function(data){
      // alert(data);
    var otp=prompt("Enter Otp");
    var otpp=Number(otp);
    if(otpp==data){
     $("#validid").html("Otp Matched").css('color','green');
       document.getElementById("saveaddresss").disabled =false;
    }
    else{
      $("#validid").html("Otp Not Matched").css('color','red');
         document.getElementById("saveaddresss").disabled =true;
    }

   });
 });
   
   $('#addressprint').show();
   $("#newadd").click(function(){
  $('#addressprint').hide();
$('#addressinsert').show();
 $("#newadd").hide();
   
    })
    
    
    $('#deleteaddresss').click(function(){
      $('#addressprint').show();  
      $('#addressinsert').hide(); 
       $("#newadd").show();
    })
 
 
});

</script>

<style>

.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}




a:hover,a:focus{
    outline: none;
    text-decoration: none;
}
.tab .nav-tabs{
    border: none;
    margin-bottom: 30px;
}
.tab .nav-tabs li a{
    padding: 12px 20px;
    margin-right: 15px;
    font-size: 18px;
    font-weight: 700;
    color: #4f000b;
    text-transform: uppercase;
    border-radius: 0;
    z-index: 1;
    position: relative;
}
.tab .nav-tabs li a:hover{ color: #fff; }
.tab .nav-tabs li.active a{
    border: none;
    color: #fff;
}
.tab .nav-tabs li a:before{
    content: "";
    width: 100%;
    height: 100%;
    border: 3px solid #4f000b;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 1;
    transform: scale(1);
    transition: all 0.5s ease 0s;
}
.tab .nav-tabs li a:hover:before,
.tab .nav-tabs li.active a:before{
    opacity: 0;
    transform: scale(0.5);
}
.tab .nav-tabs li a:after{
    content: "";
    width: 100%;
    height: 100%;
    background: #4f000b;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: -1;
    transform: scale(1.2);
    transition: all 0.5s ease 0s;
}
.tab .nav-tabs li a:hover:after,
.tab .nav-tabs li.active a:after{
    opacity: 1;
    transform: scale(1);
}
.tab .tab-content{
    padding: 20px 35px;
    margin: 0;
    background: #da7635;
    font-size: 15px;
    color: #fff;
    letter-spacing: 1px;
    line-height: 25px;
    z-index: 1;
    position: relative;
}
.tab .tab-content:before,
.tab .tab-content:after{
    content: "";
    display: block;
    width: 100%;
    height: 21px;
    background: linear-gradient(-45deg, transparent 75%, #da7635 75%) 0 50%,linear-gradient( 45deg, transparent 75%, #da7635 75%) 0 50%;
    background-repeat: repeat-x;
    background-size: 16px;
    position: absolute;
    bottom: -21px;
    left: 0;
}
.tab .tab-content:after{
    bottom: auto;
    top: -21px;
    transform: rotate(-180deg);
}
.tab .tab-content h3{
    font-size: 24px;
    margin-top: 0;
}
@media only screen and (max-width: 479px){
    .tab .nav-tabs{ overflow: hidden; }
    .tab .nav-tabs li{
        width: 100%;
        text-align: center;
        margin-bottom: 15px;
    }
    .tab .nav-tabs li a{ margin-right: 0; }
}
</style>


<!-- start: PAGE CONTENT -->
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel">
			<div class="panel-body">
		    <div class="card">
              <div class="card-header">
               <center><h2 style="color:#01a9ac;font-size:20px;">Subscriber Product Purchase Detail</h2></center>
               </div>
             </div>
				<div class="row">
					<div class="col-sm-12">
						 <div class="tab" role="tabpanel">
				        <ul class="nav nav-tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#myTab_example1" aria-controls="home" class="btn btn-primary" role="tab" data-toggle="tab">Subscriber  Bill List</a></li>
                      <li role="presentation"><a href="#myTab_example2" class="btn btn-danger" aria-controls="profile" role="tab" data-toggle="tab">Subscriber Delivery Address</a></li>
                      <!--<li role="presentation"><a href="#myTab_example3" class="btn btn-warning" aria-controls="messages" role="tab" data-toggle="tab">Payment Detail</a></li>-->
                  </ul>
	                 </div>
						<div class="tab-content">
						  <div  role="tabpanel" class="tab-pane fade in active panel" id="myTab_example1" >
						 <div class="row" >
						     	<div class="col-sm-12">
						<h4 class="panel-title" style="margin-left:10px;">Subscriber Bill List</h4>		
						<div class="panel-body table-responsive" >
				        <table id="alt-pg-dt"  class="table table-responsive table-striped" style="width: 100%;">
                        <thead>
                          <tr>
                        <th>SNO</th>
                       <th>Company Name</th>
                       <th>Product Name</th> 
                      <th>Type</th>
                      <th>Valume</th>
                      <th>Total Quantity</th>
                     <th>Total Price</th>
                     <th>Image</th>
                     <!--<th>Check Availability</th>-->
                    
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                $this->db->where('order_no',$orderno);
                                  $ptt=$this->db->get('order_detail');

                               if($ptt->num_rows()> 0){
                              
                       $i=1;
                       foreach($ptt->result() as $row):?>
                        <tr class="text-uppercase text-center">
                            <td><?php echo $i;?></td>

                            <?php 
                              $this->db->where('id',$row->p_code);
                              $stocks=$this->db->get('stock_products');
                                if($stocks->num_rows()>0){
                                  $sst=$stocks->row();
                                ?>
                            <td><?php echo $sst->company;?></td>
                          <td style="width:5px;"><?php echo $sst->name;?></td>
                          <td><?php echo $sst->p_type;?></td>
                          <td><?php echo  $sst->size;?></td>
                          <td><?php  echo $row->quantity;?> </td>
                          <td><?php  echo $row->subtotal;?> </td>
                        <td><?php if($sst->file1){?><img src="<?php echo base_url();?>assets/productimg/<?php  echo $sst->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { ?><img src="<?php echo base_url();?>assets/productimg/<?php  echo $sst->file2;?>" style="max-height: 50px; max-width: 100px;"><?php }?></td>
                       <!--<td >-->
                       <!--    <input type="hidden"  value="<?php echo $row->id;?>" id="dtid<?php echo $i;?>" >-->
                       <!--     <input type="hidden"  value="<?php echo $orderno;?>" id="order<?php echo $i;?>" >-->
                       <!--   <button  id="delete<?php echo $i;?>"  style="border:none;width:100px;">-->
                       <!--   <i class="icofont icofont-delete-alt"></i></button>-->
                       <!--   </td>-->
                       
                       <script>
                       $(document).ready(function(){
                           
      
            });
            
    </script>
                       
                       
                          </tr>
                          <?php }  $i++;endforeach; } ?>
                        </tbody>
                      </table>
                      
                    <h6  class="btn btn-primary" style="float:left" > Total Amount :<span style="color:yellow;" id="subtotal" ><?php 

                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$orderno);
                             $dt1= $this->db->get("order_detail")->row();
                              echo   $dt1->subtotal;
                           ?> </span> </h6>
					                         
					                     </div>
					                    </div>
				                       </div>
									  </div>
							      <div role="tabpanel" class="tab-pane fade" id="myTab_example2">
								  <h4><span style="color:green">Product Delivery Address:</span><?php 
								   $this->db->where_not_in('deliver_address	',"Shop Purchasing");
								  $this->db->where('order_no',$orderno);
								  $deliveryaddress=$this->db->get('order_serial')->row();
								  ?>
								  <?php echo  $deliveryaddress->deliver_address;?>
								  </h4>
								  <h4><span style="color:blue">Subscriber Payment Mode:</span>
								  <?php if($deliveryaddress->payment_mode=="cashondelivery"){ echo "Cash On Delivery";} 
								  else if($deliveryaddress->payment_mode=="online Paytm"){ echo "Paytm Qr Code";}
								 else if($deliveryaddress->payment_mode=="online Account"){ echo "Direct PasSystem Account";}
								 else if($deliveryaddress->payment_mode=="online BankQr"){ echo "Direct PasSystem Bank Qr Code ";}
							     else if($deliveryaddress->payment_mode=="online GooglePay"){ echo "Google Pay Transaction";}
							     else if($deliveryaddress->payment_mode=="online BhimUPI"){ echo "Bhim UPI Transaction";}
							     else if($deliveryaddress->payment_mode=="online PhonePe"){ echo "PhonePe Transaction";}
					           	?>
					           	
								  </h4>
								  
								  <?php 
                                   if($deliveryaddress->payment_mode=="online Paytm"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }
							        else if($deliveryaddress->payment_mode=="online Account"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }
									 else if($deliveryaddress->payment_mode=="online BankQr"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }
							 	   else if($deliveryaddress->payment_mode=="online GooglePay"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }
							 	   else if($deliveryaddress->payment_mode=="online BhimUPI"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }
							 	   else if($deliveryaddress->payment_mode=="online PhonePe"){?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $deliveryaddress->transaction_id;?></span></h4> <?php }?>
							     
							     
								  <form action="<?php echo base_url();?>shopController/generatebillinvoice"  method="post">
								<input type="hidden" value="<?php echo $orderno;?>" name="ordernumber">
								<input type="hidden" value="<?php echo $deliveryaddress->invoice_no;?>" name="invoicenumber">
								<button type="sumbit" class="btn btn-success">Order Generate Invoice</button>
								</form>
								  	        
                                </div>
                            	        	<!--<div role="tabpanel" class="tab-pane fade" id="myTab_example3">
                            	        	
                                       </div>-->
		
										   
       </div>
    	</div>
         </div>
          
        </div>
        </div>
         </form> 
        </div>        						
	 	</div>
	    </div>
        
							       

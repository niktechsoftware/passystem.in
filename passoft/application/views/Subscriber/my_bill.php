<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- start: PAGE CONTENT -->
<?php $check=$this->uri->segment(3);?>
<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
     
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
               <?php   if($check==3){ ?>
                  
                <li >
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> My Bill
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Address
                  </a>
                </li>
                <li class="active">
                  <a href="#myTab_example3" data-toggle="tab">
                    <i class="green fa fa-home"></i> Payment
                  </a>
                </li>
            <?php }
            elseif($check==6){
            ?>
                
                <li>
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> My Bill
                  </a>
                </li>
                <li  class="active">
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Address
                  </a>
                </li>
                <li>
                  <a href="#myTab_example3" data-toggle="tab">
                    <i class="green fa fa-home"></i> Payment
                  </a>
                  </li>
                  <?php }
                  else { 
                  ?>
                  
                    <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> My Bill
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Address
                  </a>
                </li>
                <li>
                  <a href="#myTab_example3" data-toggle="tab">
                    <i class="green fa fa-home"></i> Payment
                  </a>
                  </li>
                  <?php } ?>
                  
                  
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="myTab_example1">
                  <div class="alert panel-pink">
                    <button data-dismiss="alert" class="close"></button>
                    <h3 class="media-heading text-center">Welcome to Select Quantity Area </h3>
                    <a class="alert-link" href="#"></a>
                    This is very important to create Category first because Stock and Classes requires a valid
                    Category.You should not change Category after creating and declare the Stocks.
                    Please type in the Category Name into the box given below the Category
                      Name and Press <strong>Add Category </strong> Button.To <strong>Edit</strong> existing Category Edit
                      it's Name and Press <strong>Edit</strong> Button , And to <strong>Delete</strong> a Category simply Press <strong>Delete</strong> Button.
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">My Bill</h4>   
                        </div>
                        <div class="table-responsive">
                          <div class="table-responsive" >
                            <table class="table table-striped table-hover" id="sample-table-2">
                              <thead>
                                <tr style="background-color:#1ba593; color:white;">
                                                      <th width:"10px">SNO</th>
                                                      <th width:"10px">Company</th>
                                                      <th width:"10px">Product Name</th> 
                                                      <th width:"10px">Image</th>
                                                      <th width:"10px">Size</th>
                                                      <th width:"10px">Price</th>
                                                      <th width:"10px">Quantity</th>
                                                      <th width:"10px">T Amount</th>
                                                      <!-- <th width:"10px">Total Price</th> -->
                                                      <th width:"10px">Type Of Product</th>
                                                      <th width:"10px">Remove</th>
                                                      <!-- <th width:"10px">Image 2</th>
                                                      <th width:"10px">Like</th>
                                                      <th width:"10px">DisLike</th> -->
                                </tr>
                              </thead>
                                              <tbody>
                                              <?php $i=1; if($ph_data->num_rows()>0) { 
                                                      foreach($ph_data->result() as $phdata) { 
                                                          if($p_data->num_rows()>0) {
                                                              // print_r($p_data);
                                                              // exit;
                                                              foreach($p_data->result() as $pdata) { 
                                                                  if($phdata->pt_code == $pdata->id){
                                                                 // if($phdata->qyt>0){?>
                                                  <tr class="text-uppercase">
                                                  <td width:"10px"><?php echo $i; ?></td>
                                                  <td width:"10px"> <?php echo $pdata->company; ?> </td>
                                                  <td width:"10px"> <?php echo $pdata->name; ?> </td>
                                                  <td width:"10px"> <?php if(strlen($pdata->file1)>0){?><img class="zoom1"  src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pdata->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } elseif(strlen($pdata->file2)>0) { ?><img src="<?php echo base_url();?>assets/productimg/<?php echo $pdata->file2;?>" style="max-height: 50px; max-width: 100px;"><?php } else { echo "N/A"; } ?> </td>
                                                  <td width:"10px"> <?php echo $pdata->size; ?> </td>
                                                   <td width:"10px"> <?php echo $pdata->selling_price; ?> </td>
                                                  <input type="hidden" id="subranchid" value="<?php $this->db->where('id',$id); $sb_data=$this->db->get('customers')->row(); echo $sb_data->sub_branchid;?>">
                                       
                                          
                                        <td  style="width:130px;"><input type="hidden" value="<?php echo $phdata->id; ?>" id="iid<?php echo $i;?>">
                                        <button style="border-radius:50%;" type='button' class="btn btn-success" id="minusbutton<?php echo $i;?>">-</button>&nbsp;&nbsp;&nbsp;
                                        <input type="text" readonly=""  value="<?php echo $phdata->qyt;?>" class="from-control text-center"  style="width:50px;" id="qt<?php echo $i;?>" > 
                                        <button style="border-radius:50%;" type='button' class="btn btn-primary" id="puls<?php echo $i;?>" >+</button></td>

                                        

                                        <td width:"10px"><input type="hidden"  value="<?php echo $pdata->id;?>" id="code<?php echo $i;?>">
                                            <input type="hidden"  value="<?php echo $pdata->selling_price;?>" id="price<?php echo $i;?>">
                                      <input type="text"  readonly class="form-control text-center" value="<?php echo $phdata->price;?>" style="width:100px;" id="totalprice<?php echo $i;?>" >
                                          </td>

                                      <td width:"10px"><?php echo $pdata->p_type; ?></td>
                                    <td >
                                        <input type="hidden"  value="<?php echo $phdata->id;?>" id="dtid<?php echo $i;?>" >
                                        <button class="btn btn-danger" id="delete<?php echo $i;?>"  style="border:none;width:100px;">
                                        Remove</button></td>
                                    
                                    <script>
                                    $(document).ready(function(){
                                  $("#puls<?php echo $i;?>").click(function(){
                                    
                                    var subbranchid=$("#subranchid").val();
                                      var qty=Number($("#qt<?php echo $i;?>").val());
                                      var tqty=qty+1;
                                      var rowid=$("#iid<?php echo $i;?>").val();
                                      var code=$("#code<?php echo $i;?>").val();
                                      var pri=Number($("#price<?php echo $i;?>").val());
                                       var subtotal=$("#sbtotal1").val();
                                       var pt=pri*tqty;
                                       var pt1=pri*qty
                                        
                                     
                                       //alert(top);
                                    if(qty > -1){
                                         $.ajax({
                        "url": '<?php echo site_url("subscriberController/updateItemQty");?>',
						"method": 'POST',
						"data": {tqty:tqty,rowid:rowid,pri:pri,code:code,subbranchid:subbranchid,subtotal : subtotal},
						beforeSend: function(data) {
						   $("#puls<?php echo $i;?>").hide();
							$("#sbtotal1").val("Wait....")
							
							
						},
						success: function(data) {
						     var pt=pri*tqty;
						                     $("#totalprice<?php echo $i;?>").val(pt.toFixed(2));
                                $("#qt<?php echo $i;?>").val(tqty);
                                  var top =Number(subtotal) +pri;
                                       
                                       $("#puls<?php echo $i;?>").show();
                                         if(data=="001"){
                                             alert("Please Contact to Admin");
                                              $("#qt<?php echo $i;?>").val(tqty);
                                                  $("#totalprice<?php echo $i;?>").val(pt.toFixed(2));
                                          $("#qt<?php echo $i;?>").val(tqty);
                                           $("#sbtotal1").val(top.toFixed(2));
                                         }else{
                               
                                         
                                              $("#totalprice<?php echo $i;?>").val(pt.toFixed(2));
                                          $("#qt<?php echo $i;?>").val(tqty);
                                           $("#sbtotal1").val(top.toFixed(2));
                                         }
						
						},
						error: function(data) {
							$("#sbtotal1").val("Error")
						}
					
                                       
                                  });
                                    }
                                    else
                                    {
                                        $("#qt<?php echo $i;?>").val(1);
                                        $("#sbtotal1").val(top.toFixed(2));
                                        $("#totalprice<?php echo $i;?>").val(pri.toFixed(2));
                                      window.location.reload();
                                    }
                                      });
                                      $("#minusbutton<?php echo $i;?>").click(function(){
                                                  
                                                      var qty=Number($("#qt<?php echo $i;?>").val());
                                                      if(qty>0){
                                                      var tqty=qty-1;
                                                      var rowid=$("#iid<?php echo $i;?>").val();
                                                      var code=$("#code<?php echo $i;?>").val();
                                                      var pri=Number($("#price<?php echo $i;?>").val());
                                                     var subtotal=$("#sbtotal1").val();
                                                      var pt=pri*tqty;
                                                       var pt1=pri*qty;
                                        
                                       
                                                     //alert(subtotal);
                                                      
                                                  if(tqty=>0){
                                                      
                                         $.ajax({
						"url": '<?php echo site_url("subscriberController/removeItemQty");?>',
						"method": 'POST',
						"data": {tqty:tqty,rowid:rowid,pri:pri,code:code,subtotal : subtotal},
						beforeSend: function(data) {
						   $("#minusbutton<?php echo $i;?>").hide();
							$("#sbtotal1").val("Wait....")
							
							
						},
						success: function(data) {
						     var pt=pri*tqty;
						       $("#totalprice<?php echo $i;?>").val(pt.toFixed(2));
                                $("#qt<?php echo $i;?>").val(tqty);
                                 var top =Number(subtotal) - pri;
                                        $("#sbtotal1").val(top.toFixed(2));
                                       $("#minusbutton<?php echo $i;?>").show();
						
						},
						error: function(data) {
							$("#sbtotal1").val("Error")
						}
                                        
                                                 
                                                          
                                                  });
                                                  }
                                                  
                                                  else
                                                  {   
                                                      
                                                      $("#qt<?php echo $i;?>").val(1);
                                                      $("#sbtotal1").val(top.toFixed(2));
                                                      $("#totalprice<?php echo $i;?>").val(pri.toFixed(2));
                                                      window.location.reload();
                                                  }}
                                      });
                              
                              
                                                  $("#delete<?php echo $i;?>").click(function(){
                                                      var rowid=$("#dtid<?php echo $i;?>").val();
                                                  // alert(rowid);
                                                  $.post("<?php echo site_url("subscriberController/removeItem")?>",{rowid:rowid},function(data){
                                                      window.location.reload();
                                                      
                                                      });
                                              });
                                          });
                                  </script>
                                    
                                    
                                        </tr>
                                     

                                              <?php  $i++; }}
                                            //  }
                                          }
                                          } 
                                          } ?>
                                           </tbody>  
                                          <tfooter>
                                           <tr style="position:fixed;background:#bc6cff;" >
                                            <th></th>
                                              <th></th>
                                              <th><span style="color:red" >Total</span></th>
                                                <th></th>
                                                  <th></th>
                                                    <th></th>
                                                      <th>  
                              <?php
                              $this->db->select_sum('price');
                              $this->db->where('cust_usr',$this->session->userdata('id'));
                              $dt1= $this->db->get("purchase_list")->row();
                            
                              ?> 
                              
                              <input type="text" value ="<?php echo $dt1->price;?>" style="color:red" name ="sbtotal1"  id="sbtotal1" readonly/>
                              </th>
                                                        <th></th>
                                                          <th></th>
                                                            <th></th>
                                        </tr>
                                        </tfooter>
                                              
                            </table>
                           
                          </div>
                          <!--<a class="btn btn-success" href="<?php echo base_url();?>subscriberController/my_bill/6">NEXT</a>-->
					              </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
               
                <div role="tabpanel" class="tab-pane fade" id="myTab_example2">
								  	         <div class="row">
								  	         <div class="col-sm-12">
								  	            
										             
											<h3 style="text-align:center; margin:10px;"><u>Delivery Detail</u></h3>
												<!--<button id="newadd"  type="submit" class="btn btn-warning" style="margin-left:10px;max-height:50px;max-width:100px;">Add New</button>-->
											 <form action="<?php echo base_url();?>subscriberController/saveaddress" method="post">
												    
												<div  id="addressinsert"  >
												      
												    <div class="col-md-12 space20">
                                                  
                                                    <div class="col-sm-6">
                                                      <div class="form-group">
                                                          	<div class="col-md-4">
                                                                    <label for="card-number" class="form-label">Your Name<span style="color:red;"> *</span> </label>
                                                            </div> 
                                                            	<div class="col-md-8">
                                                                    <input id="name" name="name"  required="" type="text" class="form-control text-uppercase">
                                                                </div>    
                                                      </div>
                                                    </div>
                                                  
                                                  <div class="col-md-6">
                                                  
                                                      <div class="form-group">
                                                          	<div class="col-md-4">
                                                                <label for="address" class="form-label">Your Address <span style="color:red;"> *</span></label>
                                                        </div> 
                                                        	<div class="col-md-8">
                                                        <input id="address"  required=""  name="address" type="text" class="form-control text-uppercase">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                   <div class="col-md-12 space20">
                                                  
                                                    <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <div class="col-md-4">
                                                       <label for="city" class="form-label">Your City <span style="color:red;"> *</span></label>
                                                       </div><div class="col-md-8">
                                                        <input id="city"  required=""   name="city" type="text" class="form-control text-uppercase">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  
                                                  <div class="col-md-6 ">
                                                  
                                                      <div class="form-group">
                                                          <div class="col-md-4">
                                                        <label for="phone-2" class="form-label">Your Mobile Number <span style="color:red;"> *</span></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <input id="phonenumber" maxlength="10"  minlength="10"  required="" onkeypress="return isNumber(event)" name="phonenumber" type="text" class="form-control phone">
                                                     </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                   <div class="col-md-12 space20">
                                                  
                                                    <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <div class="col-md-4">
                                                       <label for="phone-2" class="form-label">Your Alternate Phone</label>
                                                       </div>
                                                       <div class="col-md-8">
                                                        <input id="alterphonenumber" maxlength="10" minlength="10"  onkeypress="return isNumber(event)" name="alertphone" type="text" class="form-control phone">
                                                     </div>
                                                      </div>
                                                    </div>
                                                  
                                                  <div class="col-md-6">
                                                  
                                                      <div class="form-group">
                                                          <div class="col-md-4">
                                                          <label for="email" class="form-label">Your Email <span style="color:red;"> *</span></label>
                                                          </div>
                                                          <div class="col-md-8">
                                                        <input id="email" name="email" type="email"   required="" class="form-control">
                                                        </div>
                                                     
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                              
                                                    
                                                 <div class="row">
                                                     <div class="col-md-2">
                                                      <div class="form-group">
                                                     <input id="saveaddresss" value="Save Address Detail" type="submit" class="btn btn-danger">
                                                      </div>
                                                    <span id="validid"></span>
                                                  </div>
                                                </div>
                                              </div>
                                                </form>
                                                
                                              </div>
                                              <!--<div class="col-md-9">-->
                                              <!--      <button id="deleteaddresss"  type="button" class="btn btn-warning">back</button> -->
                                              <!--      </div>-->
                                              </div>
                                         <form action="<?php echo base_url();?>subscriberController/subscriber_order" method="post">      
                                             <div  id="addressprint" style="margin-top:10px;" >
                                         <table  id="sample-table-2" class="table table-responsive table-striped" style="width: 100%;">
                                                    <thead>
                                                      <tr>
                                                    <th width:"10px">SNO</th>
                                                   <th width:"10px"> Name</th>
                                                   <th width:"10px"> Address</th>
                                                   <th width:"10px"> City</th>
                                                  <th width:"10px">Mobile Number</th>
                                                  <th style="width:auto;">Email</th>
                                                 <th width:"10px"> Remove</th>
                                                 <th width:"10px">Select Address</th>
                                                  </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php 
                                                     $this->db->where('cust_id',$this->session->userdata('id'));
                                                $delivery=$this->db->get('delivery_address');
                                                      if($delivery->num_rows()>0){
                                              
                                                   $i=1;
                                                   foreach($delivery->result() as $row):?>
                                                    <tr class="text-uppercase">
                                                     <td width:"10px"><?php echo $i;?></td>
                                                     <td width:"10px"><?php echo $row->recipt_name;?></td>
                                                     <td width:"10px"><?php echo $row->recipt_address;?></td>
                                                     <td width:"10px"><?php echo $row->recipt_city;?></td>
                                                     <td width:"10px"><?php echo  $row->recipt_mobilnm;?></td>
                                                     <td class="text-lowercase" style="width:auto;"><?php echo  $row->recipt_email;?></td>
                                                     
                                          <td width:"10px"><input type="hidden"  value="<?php echo $row->id;?>" id="rmid<?php echo $i;?>" >
                                          <button id="rem<?php echo $i;?>"  class="btn btn-primary" type="button">Remove Address</button></td>
                                          
                                           
                                              <td width:"10px">
                                                  <input type="radio"  class="btn btn-danger" value="<?php echo $row->id;?>" name="checkaddress" style="height:35px; width:25px; vertical-align: middle;">
                                                   </td>
                                            
                                                         <script>
                                                         $(document).ready(function(){
                                                          $("#rem<?php echo  $i;?>").click(function(){
                                                            var rowid=$("#rmid<?php echo $i;?>").val();
                                                                  // alert(rowid);
                                                                 $.post("<?php echo site_url("subscriberController/removeaddress")?>",{rowid:rowid},function(data){
                                                                      });
                                                                      window.location.reload();
                                                            });

                                                          });
                                                         
                                                            
                                                    </script>
                                                   
                                                      </tr>
                                                      <?php $i++;endforeach; } ?>
                                                    </tbody>
                                                  </table> 
                                                </div>
                                                 <!--<a class="btn btn-success" href="<?php echo base_url();?>subscriberController/my_bill/3">NEXT</a>-->
                            		  	          </div>
               
                            		  	       
                            		  	       
               
                <div class="tab-pane fade"            id="myTab_example3">
                  <div class="alert btn-azure">
                    <button data-dismiss="alert" class="close">
                      ×
                    </button>
                    <h3 class="media-heading text-center">Welcome To Address Area </h3>
                    <a class="alert-link" href="#"></a>
                    a Section simply Press <strong>Delete</strong> Button.
                  </div>

                                    <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-red border-light">
                          <h4 class="panel-title">Select Your Payment Mode</h4>
                        </div>
                        <form method="post" action="<?php echo base_url();?>subscriberController/subscriber_order" enctype="multipart/form-data" >
                        <label style=" margin:20px; font-size:20px;"> Payment Options : </label>
                        <select class="form-control" id="selectforpayment" name="selectforpayment" style="height:40px; width:250px;"><span style="color:red;">*</span>>
                          <option value=" ">--Select Payment Option--</option>    
                          <option value="Paytm"> PayTm </option>
                          <option value="PhonePe"> PhonePe </option>
                          <option value="BhimUPI"> BHIM </option>
                          <option value="BankQr"> Bank QR Code </option>
                          <option value="GooglePay"> Google Pay </option>
                          <option value="Account"> Bank Account </option>
                          <option value="cod"> Cash On Delivery </option>
                        </select>
                        
                        <div class="form-group">
                          <div class="form-group" id="paytm">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:5px;"> 
                                <label for="name" style="color:blue;margin-left:20px;" class="text-uppercase" >Paytm QR CODE Transaction:</label>
                                <div class="col-md-12">
                                  <img src="<?php echo $this->config->item('asset_url');?>/images/payment/paytm.png" style="width:200px; height:250px;">
                                </div>
                                <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                                  <input type="submit" class="btn btn-primary" value="Confirm to Pay">
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
                            <input type="submit" class="btn btn-dark" value="Confirm to Pay">
                            </div>
                          </div>
                          <div class="form-group" id="bankqrcode">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:5px;">
                                <label style="color:blue;margin-left:20px;"  class="text-uppercase">BANK QR CODE transaction :</label>
                              </div>
                              <div class="col-md-12">
                                <img src="<?php echo $this->config->item('asset_url');?>/images/payment/paytm.png" style="width:200px; height:250px;">
                              </div>
                              <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                                <input type="submit" class="btn btn-info" value="Confirm to Pay">
                              </div>
                            </div>
                          </div>
                          <div class="form-group" id="bhimupi">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:5px;">
                                <label style="color:blue;margin-left:20px;" class="text-uppercase">BHIM UPI transaction:</label>
                                <div class="col-md-12">
                                  <img src="<?php echo $this->config->item('asset_url');?>/images/payment/paytm.png" style="width:200px; height:250px;">
                                </div>
                              </div>
                              <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                              <input type="submit" class="btn btn-success" value="Confirm to Pay">
                              </div>
                            </div>
                          </div>
                          <div class="form-group" id="googlepay">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:5px;">
                                <label style="color:blue;margin-left:20px;" class="text-uppercase">GOOGLE PAY transaction:</label>
                                <div class="col-md-12">
                                  <img src="<?php echo $this->config->item('asset_url');?>/images/payment/google_pay.jpeg" style="width:200px; height:200px;">
                                </div>
                              </div>
                              <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                              <input type="submit" class="btn btn-primary" value="Confirm to Pay">
                              </div>
                            </div>
                          </div>
                          <div class="form-group" id="cashondelivery">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:-5px;">
                                <label style="color:blue;margin-top:15px; margin-left:-250px;">CASH ON DELIVERY:</label>
                                <!-- </div> -->
                                <div class="col-md-6" style="margin-top:45px;">
                                  <h4>Order Rule And Note:</h4>
                                  <ul class="list-group">
                                    <li class="list-group-item">1-Order Must be Greater Then 1999</li>
                                    <li class="list-group-item">2-Please Check order detail from Own Dashboard</li>
                                    <li class="list-group-item">3-Please pay  Money to Delivery Incharge</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                                <input type="submit" class="btn btn-warning" value="Confirm Order">
                              </div>
                            </div>
                          </div>
                          <div class="form-group" id="phonepey">
                            <div class="row">
                              <div class="col-md-12" style="margin-top:5px;">
                                <label style="color:blue;margin-left:20px;" class="text-uppercase">PHONEPE transaction:</label>
                                <div class="col-md-12">
                                  <img src="<?php echo $this->config->item('asset_url');?>/images/payment/phone_pay.jpeg" style="width:200px; height:250px;">
                                </div>
                              </div>
                              <div class="col-md-12" id="clickbutton" style="margin-top:10px;margin-left:50px;">
                                <input type="submit" class="btn btn-danger" value="Confirm to Pay">
                              </div>
                            </div>
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
      $('#transaction').hide();  
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
          
      }
        
       });
    });
                          
                        </script>
                        
                              <!-- <div class="col-md-9">
                                    <button id="deleteaddresss"  type="button" class="btn btn-warning">back</button> 
                                    </div> -->
                      </div>            
                    </div>
                      <div class="col-sm-6">
                        <div class="panel panel-calendar">
                          <div class="panel-heading panel-red border-light">
                            <h4 class="panel-title">Submit Your Payment Transaction Id</h4>
                          </div>
                          <label style="font-size:20px; margin:20px;">Your Payment Transaction Id : </label>
                          <input type="text" name="transactionid" placeholder="Transaction ID" required />
                        </div>
                      </div>
                  </div> 
                              <!-- <div class="col-md-9">
                                    <button id="deleteaddresss"  type="button" class="btn btn-warning">back</button> 
                                    </div>-->
                              
            
                      </div>
                      </div>
                </div>
                    
               
            </div>
          </div>
        </div>
      </div>
      <!-- end: INLINE TABS PANEL -->
    </div>
  </div>
</div>
</div>


                               <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                                <div class="panel-heading panel-red" style="text-align:center;color:#01a9ac;">
                                                  
                                                </div>
                                                 <form action="<?php echo base_url();?>shopController/saleStock"  method ="post" role="form" class="" >
                                                <div class="panel-body">
                                                    <center>
                                                    <select id="cat" class="form-control" style="width:150px;">
                                                        <option >--Select--</option>
                                                        <option value="1">Direct Selling</option>
                                                         <option value="2">Online</option> 
                                                    </select>
                                                    </center>
                                          
		                                    
                                                    <div id="usernm" class="form-group">
                                                         <center>
                                                         <span style="text-align:center;color:#01a9ac;font-size:30px;" id="lblhead">Direct Selling Area</span></br>
                                                         <label id="lblnm"> Username:</label>
                                                  <input  id="username" class="text-uppercase" name="usernam" style="width:180px;" type="text"/>
                                                  </center>
                                                         <span class="" id="message1"></span>
                                                    </div>
                                                    
                 <div id="directform">
                   <div class="dt-responsive table-responsive" >
        			<table class="table table-hover">
						<thead>
	                        <tr class="text-uppercase">
	                           <th>SNO</th>
	                            <th class="text-center"><label>P Code</label></th>
	                           <th><label> Name</label></th>
	                           <th><label> Category</label></th>
	                           <th><label>Weight</label></th>
	                           <th><label>Price</label></th>
	                           <th><label> Qty</label></th>
                               <th><label>Pur. Qty</label></th>
	                           
	                           <!-- <th><label>Total Price</label></th> -->
	                           <th><label>Sub Total</label></th>
	                        </tr>
	                    </thead>
	                    <tbody>
                        <?php $i = 1; for($i = 1; $i <= 10; $i++){ ?>
                            
                        <tr >
                            <td width="40"   >
                                <strong><?php echo $i; ?></strong>
                             </td>
                             <td>
                               
                                    <input id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>" valur=" " style="width:90px;">
                          

                            </td>

                           
                           
                            <td>
                                  <input id="item_name<?php echo $i; ?>" name="item_name<?php echo $i; ?>" style="width:150px;">
                            </td>
                            <td>
                                  <input readonly id="item_cat<?php echo $i; ?>" class="text-uppercase" name="item_cat<?php echo $i; ?>" style="width:110px;">
                            </td>
                            
                            <td>
                                  <input readonly id="item_size<?php echo $i; ?>" class="text-uppercase" name="item_size<?php echo $i; ?>" style="width:70px;">
                            </td>
                            <td>
                                   <input readonly id="item_price<?php echo $i; ?>"  class="text-uppercase" name="item_price<?php echo $i; ?>" style="width:70px;">
                            </td>
                            <td>
                             <input readonly id="item_quantity1<?php echo $i; ?>" class="text-uppercase" name="item_quantity1<?php echo $i; ?>" style="width:70px;" type="text"/>
                             </td>
                            <td>
                            	
                                <input id="item_quantity<?php echo $i; ?>" class="text-uppercase" name="item_quantity<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                           
                                     
                            <td>
                                <input  readonly id="sub_total<?php echo $i; ?>" class="text-uppercase" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                  <input type="hidden" readonly id="total_price<?php echo $i; ?>" class="text-uppercase"  name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                            	
                                <input type="hidden" id="username<?php echo $i; ?>" class="text-uppercase" name="username" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                  <input  type="hidden" readonly id="item_catid<?php echo $i; ?>" class="text-uppercase" name="item_catid<?php echo $i; ?>" style="width:70px;">
                            </td>
                       </tr>
                       <?php } ?>
                       <tr>
                            	<!-- <td colspan="3"><strong>Previous Balance</strong></td> -->
                                <td colspan="5"><input type="hidden" readonly id="valid_id" name="p_balance" style="width:180px;" type="text"/></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Total</strong></td>
                                <td colspan="5"><input id="total" name="tt" style="width:180px;" type="text" required /></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Paid</strong></td>
                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" type="text" required /></td>
                       </tr>
                       <!-- <tr >
                            
                             <td >  <label>Direct Sale &nbsp;&nbsp;&nbsp;</label> <input  id="direct" class="text-uppercase" name="delivery" style="width:70px;" type="radio" value="cash" checked/>
                            </td>
                            <td> <label>Cash On Delivery &nbsp;&nbsp;&nbsp;</label>  <input  id="cash" class="text-uppercase" name="delivery"style="width:70px;" type="radio" />
                            </td>
                        </tr> -->
                       <tr id="unm">
                            
                             <td>  
                              <input  id="username" class="text-uppercase" name="username" style="width:180px;" type="hidden"/>
                                                 
                        </td>
                           </tr>
                       <tr>
                            	<!-- <td colspan="3"><strong>Balance</strong></td> -->
                                <td colspan="5"><input type="hidden" id="balance" name="balance" style="width:180px;" type="text" /></td>
                       </tr>
                      </tbody>
                  </table>
                 
                  </div>
                                                
                                           
                                           
                                            
                                            <div class="col-md-4">
                    			<input type="submit" id="submit" name="day_book_detail" value="Pay & Print Reciept" class="submit btn btn-primary">
                    	</div>
                    	
                    	 </div>
                    	  </form>
                    	 
                      <div id="onlineform">
                         <center>   <span style="text-align:center;color:#01a9ac;font-size:30px;">Online Generate Bill</span>  </center>
                   <div class="dt-responsive table-responsive">
         <form action="<?php echo base_url();?>stockController/generatebill"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
              <center> 
              <div class="form-group">
              order Number: <input  id="orderno" class="text-uppercase" name="orderno" style="width:180px;" type="text"/>
               </div> 
               </center>
					<table class="table table-hover">
						<thead>
	                        <tr class="text-uppercase">
	                           <th>SNO</th>
	                           <th class="text-center"><label>P Code</label></th>
	                           <th><label> Name</label></th>
	                           <th><label> Category</label></th>
	                           <th><label>Weight</label></th>
	                           <th><label>Price</label></th>
	                           <th><label> Qty</label></th>
                               <th><label>Pur. Qty</label></th>
	                           
	                           
	                           <!-- <th><label>Total Price</label></th> -->
	                           <th><label>Sub Total</label></th>
	                        </tr>
	                    </thead>
	                    <tbody>
                        <?php $i = 1; for($i = 1; $i <= 10; $i++){ ?>
                            
                        <tr >
                            <td width="40"   >
                                <strong><?php echo $i; ?></strong>
                             </td>
                             <td>
                                    <input id="item_nu<?php echo $i; ?>" name="item_no<?php echo $i; ?>" value=" " style="width:90px;">
                            </td>

                           
                           
                            <td>
                                  <input id="item_nm<?php echo $i; ?>" name="item_name<?php echo $i; ?>" style="width:150px;">
                            </td>
                            <td>
                                  <input readonly id="item_cate<?php echo $i; ?>" class="text-uppercase" name="item_cat<?php echo $i; ?>" style="width:110px;">
                            </td>
                            
                            <td>
                                  <input readonly id="item_sieze<?php echo $i; ?>" class="text-uppercase" name="item_size<?php echo $i; ?>" style="width:70px;">
                            </td>
                            <td>
                                   <input readonly id="item_pric<?php echo $i; ?>"  class="text-uppercase" name="item_price<?php echo $i; ?>" style="width:70px;">
                            </td>
                            <td>
                             <input readonly id="item_quantity2<?php echo $i; ?>" class="text-uppercase" name="item_quantity1<?php echo $i; ?>" style="width:70px;" type="text"/>
                             </td>
                            <td>
                            	
                                <input id="item_quntity<?php echo $i; ?>" class="text-uppercase" name="item_quantity<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                           
                                     
                            <td>
                                <input  readonly id="sub_totel<?php echo $i; ?>" class="text-uppercase" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                  <input type="hidden" readonly id="total_pric<?php echo $i; ?>" class="text-uppercase"  name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                            	
                                <input type="hidden" id="username<?php echo $i; ?>" class="text-uppercase" name="username" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                  <input  type="hidden" readonly id="item_catidd<?php echo $i; ?>" class="text-uppercase" name="item_catid<?php echo $i; ?>" style="width:70px;">
                            </td>
                       </tr>
                       <?php } ?>
                       <tr>
                            	<!-- <td colspan="3"><strong>Previous Balance</strong></td> -->
                                <td colspan="5"><input type="hidden" readonly id="valid_id" name="p_balance" style="width:180px;" type="text"/></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Total</strong></td>
                                <td colspan="5"><input id="totel" name="tt" style="width:180px;" type="text" required /></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Paid</strong></td>
                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" type="text" required /></td>
                       </tr>
                       <!-- <tr >
                            
                             <td >  <label>Direct Sale &nbsp;&nbsp;&nbsp;</label> <input  id="direct" class="text-uppercase" name="delivery" style="width:70px;" type="radio" value="cash" checked/>
                            </td>
                            <td> <label>Cash On Delivery &nbsp;&nbsp;&nbsp;</label>  <input  id="cash" class="text-uppercase" name="delivery"style="width:70px;" type="radio" />
                            </td>
                        </tr> -->
                       
                       <tr>
                            	<!-- <td colspan="3"><strong>Balance</strong></td> -->
                                <td colspan="5"><input type="hidden" id="balance" name="balance" style="width:180px;" type="text" /></td>
                       </tr>
                      </tbody>
                  </table>
                 
                  </div>
                                                
                                           
                                           
                                            
                                            <div class="col-md-4">
                    			<input type="submit" id="submit" name="day_book_detail" value=" Print Receipt" class="submit btn btn-primary">
                    	</div>
                    	 </form>
                    	 </div>
                    
                                            </div>
                                            <!--<center>  <a href="<?php echo base_url();?>welcome/index"  class ="btn btn-info">Done</a></center>-->
                                            </div>
                               </form>
                                            </div>
                                            </div>
                                            </div>
                     
                     
                   <script>
                   
                   $(document).ready(function() {
                       
                   $("#directform").hide();
                    $("#usernm").hide();
                     $("#onlineform").hide();
                     
                       $("#cat").change(function(){
                           
                             var unm = $("#cat").val();
                              if(this.value == 1){
                                //  alert(this.value);
                                  
                                   $("#usernm").show(); 
                                   
                                 $("#directform").hide();
                               
                                  $("#orderno").hide(); 
                                      $("#onlineform").hide();
                                       
                                 
                                 $("#username").keyup(function(){
                               var classv =  $("#username").val();
                            //   alert(classv);
                            if(classv.length>=8){
                                   $.post("<?php echo site_url("stockController/checkuser") ?>",{ classv: classv }, function(data) {
                                   //alert(data);
                                  $('#message1').html(data);
                                  $("#directform").show();
                                    
                              
                           
                                });
                            }
                            else
                            {
                                 $("#directform").hide(); 
                            }
                           
                            }); 
                            }
                            else if(this.value==2) {
                                 // alert("r");
                                // alert(this.value);
                                  $("#orderno").show(); 
                                  $("#onlineform").show();
                                  
                                 //  $("#directform").show();
                                 $("#usernm").show(); 
                                  $("#username").hide(); 
                                   $("#lblnm").hide(); 
                                     $("#lblhead").hide(); 
                                 
                            } 
                            else{
                                  $("#orderno").hide(); 
                                  $("#onlineform").hide();
                                  
                                   $("#directform").hide();
                                 $("#usernm").show(); 
                                  $("#username").hide(); 
                                   $("#lblnm").hide(); 
                                     $("#lblhead").hide(); 
                            }
                           
                            
                  
                     
                  });
                   });
                   </script> 
                   <!--<script>-->
                   <!--$("#sub_total<?php //$i;?>").change(function(){-->
                   <!--   var cc = Number($("#total").val());-->
                   <!-- cc = cc + Number($("#sub_total<?php // $i;?>").val()); -->
                   <!--   $("#total").val(cc);  -->
                   <!--});-->
                   <!--</script>-->
<div class="row">
    <div class="col-sm-6">
      <div class="panel panel-calendar">
        <div class="panel-heading panel-red border-light">
          <h4 class="panel-title">Current CashBack in Your Account</h4>
        </div>
        <label style="font-size:20px; margin:20px;"> Current Balance </label>
        <input type="text" name="transactionid" value="<?php echo $cashback->rupee;?>" readonly />
      </div>            
    </div>
      <div class="col-sm-6">
        <div class="panel panel-calendar">
          <div class="panel-heading panel-red border-light">
            <h4 class="panel-title">CashBack Request To Admin</h4>
          </div>
          <!--<form method="post" action="<?php echo base_url();?>subscriberController/cashback_request"/>-->
          <label style="font-size:20px; margin:20px;">CashBack Request : </label>
          <input type="text" id="cash_amt" name="requ_cb" placeholder="Request Amount" required />
          <input type="submit" id="cash_req" name="cash_req1" value="Submit" class="btn btn-primary"/>
        </div>
      </div>
  </div> 
  <script>
 
    $(document).ready(function(){
       $("#cash_req").click(function(){
        var amt = $("#cash_amt").val();
         if( amt > <?php echo $cashback->rupee;?>)
         {
             alert("Please Enter less amount from your credit balance.");
         }
         else
         {
            // alert(amt);
             $.post("<?php echo site_url("subscriberController/cashback_request"); ?>", {amt:amt}, function(data){
                alert(data);
             });
         }
        
        
       }); 
    });  
      
  </script>
  
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <center><h2 class="panel-title">Online Payment Transaction Id Matching</h2></center>
        </div>
        <form action="<?php echo base_url()?>wallet/adminpayment" method="post" >
                <div class="row">
                    <div class="col-md-3"></div>
                       <div class="col-md-6">
                       	<div class="form-group">
                       	 <label><strong>File Order Number</strong></label>
                          <input type="text" id="orderno" class="form-control" name="orderno" placeholder="fill Order Number" />
                            </div>
                            </div>
                            <div class="col-md-3"></div>
                       </div>
                        <div class="row">
                       <div class="col-md-3"></div>
                       <div class="col-md-6">
                       	<div class="form-group">
                       	 <label><strong>File Transaction id</strong></label>
                          <input type="text" id="transactionid" class="form-control" name="transactionid" placeholder="fill trasaction id" />
                          <div id="message"></div>
                            </div>
                             </div>
                            <div class="col-md-3"></div>
                          </div>
              
        </div>
    </div>
    
    <script>
     $(document).ready(function(){
           
        $("#transactionid").keyup(function(){
         var transactionid=$("#transactionid").val();
         var orderno=$("#orderno").val();
     
      $.post("<?php echo site_url("adminController/matchtransectionid")?>",{transactionid:transactionid,orderno:orderno},function(data){
      $('#message').html(data);
   
      });
        });
        
     });
 
        
    </script>
 

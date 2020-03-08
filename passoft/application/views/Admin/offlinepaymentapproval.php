<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <center><h2 class="panel-title">Payment Matching </h2></center>
        </div>
        <div class="panel-body">
        <form action="<?php echo base_url()?>adminController/adminpayment" method="post" >
                <div class="row">
                       <div class="col-md-3">
                       	    <?php 
                       	       $branch=$this->db->get('branch');
                       	       if($branch->num_rows()>0){
                       	     ?>
                       	<div class="form-group">
                       	 <label><strong>Branch Name</strong></label>
                         <select id="branchid" class="form-control text-uppercase text-primary" style="height:35px;">
                        <option value=""><span style="color:red">Select Branch</span></option>      
                        <?php foreach($branch->result() as $row):?>
                            <option  value="<?php echo $row->id?>"><?php echo $row->b_name;?></option>  
                        <?php endforeach;} ?>
                            </select>
                            </div>
                            </div>
                            <div class="col-md-3" id="showsubbranch">
                            <div class="form-group">
                        <label><strong>Shop Name</strong></label>
                       	 <select id="sbranchid" class="form-control text-uppercase text-primary" style="height:35px;">
                            </select>
                            </div>
                       </div>
                            <div class="col-md-6" id="dateselect">
                                <div class="row">
                                     <?php 
                       	       $delivery=$this->db->get('employee');
                       	       if($delivery->num_rows()>0){
                       	             ?>
                                    <div class="col-md-6">
                                        <label><strong>Select Delivery Incharge</strong></label>
                                        <select id="delivery" class="form-control text-uppercase " style="height:35px;">
                                        <option value=""><span style="color:red">Select Delivery Boy</span></option>      
                                         <?php foreach($delivery->result() as $row):?>
                                         <option  value="<?php echo $row->id?>"><span style="color:green;"></span><?php echo $row->name;?><span style="color:red;"><?php echo " [ ". $row->username. " ] "; ?></span></option>  
                                        <?php endforeach;} ?>
                                       </select>
                                       
                                    </div>
                          
                                    <div class="col-md-6">
                                        <label><strong>Select Date</strong></label>
                                        <input type="date" id="enddate" class="form-control" style="width:200px;">
                                    </div>
                                </div>
                                
                            </div>
                       </div>
                       </div>
                         <div class="row" >
                           <div class="col-sm-12">  
                           <div class="col-md-10"  id="amountdatashow" style="margin-left:30px;"></div>
                           </div>
                          </div>
                       
                        </div>
                        </div>
                        </div>
                        
    
    <script>
     $(document).ready(function(){
           $('#showsubbranch').hide();
           $('#dateselect').hide();
        $("#branchid").change(function(){
         var classv=$("#branchid").val();
        //alert(classv);
      $.post("<?php echo site_url("adminController/getsubbranch")?>",{classv:classv},function(data){
           $('#showsubbranch').show();
      $('#sbranchid').html(data);
   
      });
        });
        
        $("#sbranchid").change(function(){
          
          $('#dateselect').show();
        });
        
    $("#enddate").change(function(){
       var sbranchid=$("#sbranchid").val();
       var branchid=$("#branchid").val();
       var enddate=$("#enddate").val();
       var delivery=$("#delivery").val();
       if(sbranchid!=" " && branchid!=" " && delivery!="" && enddate!=""){
      $.post("<?php echo site_url("adminController/remainingamount")?>",{sbranchid:sbranchid,branchid:branchid,enddate:enddate,delivery:delivery},function(data){
      $('#amountdatashow').html(data);
      });
       }
       else
       {
            $('#amountdatashow').html('<div><h3>please select all option<h3></div>').css('color','red');
       }
        
     });
     
     });
 
        
    </script>
 

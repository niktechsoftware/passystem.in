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
            <div class="row">
              <div class="col-md-3">
                <?php if($branch->num_rows()>0){
                  $bid=$branch->row();
                  ?>
                  <select class="form-control" id="branchid">
                    <option>-Select Branch-</option>
                    <option value="<?php echo $bid->id; ?>"><?php echo $bid->b_name;?></option>
                  </select>
                  <?php
                }?>
              </div>
              <div class="col-md-3">
                <select class="form-control" id="sbranchid">
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-control" id="delevryid">
                  
                </select>
              </div>
              <div class="col-md-3" id="enddate">
                <input type="date" name="date1" id="date1" class="form-control">
              </div>
            </div> 
          </div>
        <div class="row" >
         <div class="col-sm-12">  
          <div class="col-md-11" id="amountdatashow" style="margin-left:30px;"></div>
           </div>
           </div>
          </div>
           </div>
           </div>
            </div>
    

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light btn-warning">
                <h4 class="panel-title">Day Book Record </h4>
              </div><br>
              <form action="<?php echo base_url();?>adminController/walletdaybook"  method ="post" >
                 <div class="panel-body">
            	   <div class="row">
            	     <div class="col-md-6">
            	        <div class="form-group" style="margin-left:70px;"  />
                          <label><strong>Start Date</strong> </label>
                          <input type="date" class="form-control" name="sdate" id="sdate" placeholder="Start Date " style="width:250px; height:30px;" required="" />
                          </div>
                            </div>
                             <div class="col-md-6">
            	           <div class="form-group" style="margin-left:70px;" >
                          <label><strong> End Date</strong> </label>
                          <input type="date" class="form-control" name="enddate" id="enddate" placeholder="End Date " style="width:250px; height:30px;" required="" />
                        </div>
                       </div>
                   </div><br>
                     <div class="row">
            	     <div class="col-md-6">
                          <label style="float:left;padding-left:50px;"><strong>All</strong> </label>
                          <input type="radio" class="form-control" value="Both" name="value1" required="required" style="width:40px; height:20px; float: left;"/>
                         <label style="float:left;"><strong>Debit</strong> </label>
                         <input type="radio" class="form-control" value="Debit" required="required" name="value1" style="width:40px; height:20px;  float: left;"/>
                           <label style="float:left;"><strong>Credit</strong> </label>
                          <input type="radio" class="form-control" value="Credit" required="required" name="value1" style="width:40px;height:20px;float:left;"/>

                         <label style="float:left;"><strong>All Branch</strong> </label>
                          <input type="radio" class="form-control" value="Allbranch"  name="value2" style="width:40px;height:20px;float:left;"/>

                          <label  style="float:left;"><strong>One Branches</strong> </label>
                          <input type="checkbox" class="form-control"  value="Onebranch" name="value2"  id="branchsss" style="width:40px; height:20px;float: left;" />
                         <div id="branchesnameee" class="autoUpdate" style="margin-left:280px;">
                         	<select name=branchid class="text-uppercase form-control"  style="max-width:250px;max-height:50px;">
                         		<?php $branch=$this->db->get('branch');
                              if($branch->num_rows()>0)
                                {
                                  ?>
                               <option value="">--Select Branch---</option>
                                  <?php 
                            foreach ($branch->result() as $value):
                         		 ?>
                         		<option value="<?php echo $value->id?>"><?php echo $value->b_name;?>
                         		</option>
                         	<?php endforeach;}?>
                         	</select>
                         </div>
                    </div>
                     <div class="col-md-6" style="margin-top:-15px;">
                      <button type="submit" class=" form-control btn-danger"  style="width:300px; height:40px;margin-left:50px;">
                        <span style="font-size:15px;">Get Record</span></button>
                        </div>        
                </div>
              </div>
            </form>
            </div>
          </div>
          <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    	 <script >
           $(document).ready(function(){
          $('#branchesnameee').hide();
          $('#branchsss').change(function(){
          if(this.checked)
          $('#branchesnameee').fadeIn('slow');
            else
          $('#branchesnameee').fadeOut('slow');

         });
           });
    </script>
          
        </div>
       <br>
       <div class="row">
         <div class="col-md-12">

           <div class="panel">
            <div class="panel-heading panel-blue border-light btn-danger" >
                <h4 class="panel-title">Day Book Account</h4>
              </div>
                 <div class="panel-body">
            	   <div class="row">
                    <div class="col-md-6">
            		<div class="form-group">
            			<h3 style="text-align:center; margin-top:20px;">Debit</h3>
            		</div>
                 <?php $this->db->where('opening_date',date('y-m-d'));
                $balance=$this->db->get('opening_closing_balance')->row();?>
                
            		<div class="form-group">
            	  <label class="control-label" style="float: left;"><span style="font-size:15px;margin-left:10px;">Opening Balance</span></label><br>
            	  <input type="text" value="<?php echo  $balance->opening_balance;?>"  class="form-control"   readonly=""/>
            		</div>
              
            		<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px; margin-left:10px;">Investment Amount</span></label><br>
            			<input type="text" class=" form-control"  readonly=""/>
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px; margin-left:10px;">Stock Sale</span></label>
            			<input type="text" class=" form-control"   readonly=""/>
            		</div>
                <div class="form-group">
                <label class="control-label" style="float: left;"><span style="font-size:15px;margin-left:10px; ">Receive From Director</span></label>
                  <input type="text" class=" form-control"   readonly=""/>
                </div>
            	<!-- 	<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px; margin-left:10px;">Branch stock</span></label>
            			<input type="text" style="max-width:300px;max-height:50px;" class=" form-control"  readonly=""/>
            		</div> -->
            	</div>
            	 <div class="col-md-6">
            	 	<div class="form-group">
            	 		<H3 style="margin-left:100px;margin-top:20px;">Credit</H3>
            		</div>
                
            	 		<div class="form-group">
            			<label class="control-label" style="float: left;">
            				<span><span style="font-size:15px;">Closing Balance</span></span>
            			</label>
            			<input type="text" value="<?php echo  $balance->closing_balance;?>" class=" form-control"  readonly=""/>
            		</div>
             
            		<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px;">Cash Payment</span></label>
            			<input type="text" class=" form-control"  readonly="" />
            		</div>
            		<!-- <div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px;">Salary</span></label>
            			<input type="text" style="max-width:300px;max-height:50px;" class=" form-control"    readonly=""/>
            		</div> -->
            		<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px;">Bank Deposite</span></label>
            			<input type="text" class=" form-control" readonly="" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" style="float: left;"><span style="font-size:15px;">Handover To Director</span></label>
            			<input type="text"  class=" form-control"  readonly="" />
            		</div>
            	</div>
          </div>
        </div>
        </div>
         </div>
         </div>
         
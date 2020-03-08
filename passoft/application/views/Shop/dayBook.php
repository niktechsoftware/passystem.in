<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Day Book Record </h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url();?>index.php/dayBookControllers/daybook"  method ="post" role="form" id="form">
			
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-3">
                   				 Start Date</div>
                   				 <div class="col-md-3">
                   				 <input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="st_date" style="width:180px; height:30px;" required/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-3">
                   				 End Date
                    		</div>
                			<div class="col-md-3">
                    			<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="end_date" style="width:180px; height:30px;" required/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row">
            		 <div class="col-md-12 space20">
            		 	<div class="col-md-2">
            		 			<input type="radio" name="check_list"  checked="checked" value="all" required="required">
                       			 All
                    	</div>
                     	<div class="col-md-2">
                        		<input type="radio" name="check_list" value="Fee Deposit" required="required">
                       			 Monthly Fee
                     	</div>
                     	<div class="col-md-2">
                        		<input type="radio" name="check_list" value="From sale Stock" required="required">
                        		Stock Sale
                     	</div>
                     	<div class="col-md-2">
                        		<input type="radio" name="check_list" value="Recieve From Bank" required="required">
                        		Bank Withdrawal
                     	</div>
                     	<div class="col-md-3">
                        		<input type="radio" name="check_list" value="Admission Fee + 1 Month Fee" required="required">
                       		 	Admission + 1 Month Fee
                     	</div>
                    </div>
                 </div>   	
                <div class="row">
            		 <div class="col-md-12 space20" >
            		 	<div class="col-md-2">
                        		<input type="radio" name="check_list" value="Recieve From Director" required="required">
                       			Receive From Director
                     	</div>
                     	<div class="col-md-2">
                       			<input type="radio" name="check_list" value="Cash Payment" required="required">
                       			 Cash Payment
                     	</div>
                     	<div class="col-md-2">
                     			<input type="radio" name="check_list" value="By Salary" required="required">
                        		Salary
                     	</div>
                     	<div class="col-md-2">
                        		<input type="radio" name="check_list" value="Diposit in Bank" required="required">
                       			 Bank Deposit
                     	</div>
                     	<div class="col-md-3">
                        		<input type="radio" name="check_list" value="Diposit to Director" required="required">
                        		Handover To Director
                    	</div>
               		</div>
               		 <div class="row">
            		 <div class="col-md-12 space20" >
            		 <div style="color: red;"><?php echo $msg;?>
            		 </div>	
            		 </div>
                </div>
                </div>		
                  <div class="row">
            		 <div class="col-md-12 space20" >
            		 	<div class="col-md-2">
            		 		<label class="radio-inline">
            		 		
								<input type="radio" class="grey" value="Debit" name="value1" required="required" >
							Debit</label>
						</div>
						<div class="col-md-2">
            		 		<label class="radio-inline">
            		 		
								<input type="radio" class="grey" value="Credit" name="value1" required="required" >
							Credit</label>
						</div>	
						<div class="col-md-2">
            		 		<label class="radio-inline">
            		 		
								<input type="radio" class="grey" value="Both"  checked="checked" name="value1" required="required" >
							Both</label>
						</div>	
                
                </div>
                </div>	
                <div class="row">
            		 <div class="col-md-6">
            		 	<div class="col-md-4">
                    			<input type="submit" name="dbd" value="Get Day Book Detail" class="submit btn btn-blue">
                    	</div>
                    </div>
                 </div>   	
           		 </form>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
			<h4 class="panel-title">Day Book Account</h4>
			</div>
			<div class="panel-body">
				
           <div class="row">
           	<div class="col-md-12"> 
            	<div class="col-md-6">
            		<div class="form-group">
            			<H3 style="margin-left: 100px;">Debit</H3>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Opening Balance</label>
            			<input type="text" style="margin-left: 100px;" value="<?php //echo $opening?>" disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Fee &amp; Admission</label>
            			<input type="text" style="margin-left: 100px;" value ="<?php //echo $admin;?>" disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Stock Sale</label>
            			<input type="text" style="margin-left: 135px;" value ="<?php //echo $sale;?>" disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Bank Withdrawal</label>
            			<input type="text" style="margin-left: 100px;" value="<?php //echo $bt;?>" disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Receive From Director</label>
            			<input type="text" style="margin-left: 68px;" value="<?php //echo $dt;?>" disabled="disabled"/>
            		</div>
            		
            	</div>
            	 <div class="col-md-6">
            	 	<div class="form-group">
            	 		<H3 style="margin-left: 100px;">Credit</H3>
            		</div>
            	 		<div class="form-group">
            			<label class="control-label">
            				<span>Closing Balance</span>
            			</label>
            			<input type="text" style="margin-left: 100px;" value="<?php //echo $closing?>" disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Cash Payment</label>
            			<input type="text" style="margin-left: 110px;" value="<?php //echo $cash;?>" disabled="disabled" />
            		</div>
            		<div class="form-group">
            			<label class="control-label">Salary</label>
            			<input type="text" style="margin-left: 157px;" value="<?php //echo $salary;?>"  disabled="disabled"/>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Bank Deposit</label>
            			<input type="text" style="margin-left: 110px;" value="<?php //echo $banktransaction;?>" disabled="disabled" />
            		</div>
            		<div class="form-group">
            			<label class="control-label">Handover To Director</label>
            			<input type="text" style="margin-left: 73px;" value="<?php //echo $htd;?>"disabled="disabled" />
            		</div>
            	</div>
            	</div>
            	</div>
           	</div>
      	</div>
  	</div>
</div>
      
     

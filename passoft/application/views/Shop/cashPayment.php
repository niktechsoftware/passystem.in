<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<div class="panel-tools">										
					<div class="dropdown">
					<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
						<i class="fa fa-cog"></i>
					</a>
					<ul class="dropdown-menu dropdown-light pull-right" role="menu">
						<li>
							<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
						</li>
						<li>
							<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
						</li>
						<li>
							<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
						</li>										
					</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="tabbable">
							<ul id="myTab" class="nav nav-tabs">
								<li <?php if(($this->uri->segment(3) == "cash") || ($this->uri->segment(3) == "")) {?> class="active"<?php }?>>
									<a href="#myTab_example1" data-toggle="tab">
										<i class="green fa fa-money"></i> Cash Payment
									</a>
								</li>
								<li <?php if(($this->uri->segment(3) == "bank")) {?> class="active"<?php }?>>
									<a href="#myTab_example2" data-toggle="tab">
										<i class="green fa fa-bank"></i> Bank Transaction
									</a>
								</li>
								<li <?php if(($this->uri->segment(3) == "director")) {?> class="active"<?php }?>>
									<a href="#myTab_example3" data-toggle="tab">
										<i class="green fa fa-user"></i> Director Transaction
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane fade<?php if(($this->uri->segment(3) == "cash") || ($this->uri->segment(3) == "")) {?> in active<?php }?>" id="myTab_example1">
								<div class="row">
									<div class="col-sm-12">
				                        <form method="post" action="<?php echo base_url()?>index.php/dayBookControllers/cashPaymentDb">
				                            
				                        	<div class="panel panel-calendar">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Cash Payment</h4>
												</div>
												<div class="panel-body">
												    <div class="alert alert-info">
											<h4 class="center"><b>WELCOME TO THE CASH PAYMENT AREA</b></h4><br>
	                                    <center>  Here You Can Pay CASH Money For Our Business .</center>

										</div>
				                      		<table class="table">
				                      		<?php 
				                      		$this->db->distinct();
				                      		$this->db->select('expenditure_name');
				                      		
				                      		$ex= $this->db->get("expenditure");
											?>
				                      		<tr>
				                      			 <td><label> Expenditure <span style="color:#F00">*</span></label> 
							                            <select id="expenditure" name="expenditure" style="width:150px;" required>
							                                <option value="">-Expenditure-</option>
							                                <?php if($ex->num_rows()>0){
							                                foreach($ex->result() as $row):?>
							                                 <option value="<?php echo $row->expenditure_name;?>"><?php echo $row->expenditure_name;?> </option>
							                                	
							                               <?php  endforeach;}?>
							                               
							                            </select>
				                      			 </td>
				                      			  <td><label> Expenditure Depart <span style="color:#F00">*</span></label> 
							                            <select id="expenditurer" name="expenditurer" style="width:150px;" required>
							                               
							                               
							                            </select>
				                      			 </td>
				                      			 <td>
				                      			 </td>
				                      			 <td></td>
				                      			 
				                      			 
				                      		</tr>
				                        		<tr>
				                        			<td>
							                        	<label>Employee ID <span style="color:#F00">*</span></label> 
							                            <select id="stu_emp_id" name="id_name" style="width:150px;" required>
							                                <option value="">-Item Id-</option>
							                                <option value="Employee Id"> Employee Id </option>
							                               
							                                <option value="other"> Other </option>
							                            </select>
							                       </td>
							                        <td>
							                            <label id="valid_id">Enter Valid ID</label>
							                            <input id="emp_id" name="emp_id" style="width:150px;" type="text"/>
							                        </td>
							                        <td>
							                        	<label id="Other_name">Name</label>
							                            <input id="name" name="name" style="width:150px;" type="text"/>
							                           </td>
							                           <td> 
							                            <label id="Other_phno">Phone No</label>
							                            <input id="phone_no" name="phone_no" style="width:150px;" type="text"/>
							                        </td>
				                        			<td id="check_valid_id"></td>
				                         		</tr>
				                         	</table>
				                         	<table class="table">
				                         		<tr>
				                         			<td>
				                        				<label id="res">Reason  <span style="color:#F00">*</span></label>
				                        			</td>
				                            		<td>
				                            			<textarea name="reason" cols="60" rows="6" required></textarea>
				                            		</td>
				                            		<td>
				                            			Pay Date
							                           
							                            <input  name="paydate" style="width:150px;" type="date" required/>
				                        			</td>
				                        		</tr>
				                            		<td>
				                            			<span id="balance"></span><br/>
							                            <label id="am" >Amount <span style="color:#F00">*</span></label>

							                           	<input id="amount"  name="amount"   style="width:150px;" type="text"  required > <span style="color:#F00" id="digit"></span></td>

													
				                        		</tr>
				                        	</table>

					                         <div class="form-group" style="margin-top:30px">
					                              	<div class="form-group" align="right">
					                              		<input class="submit btn btn-blue" type="submit" value="Save Record" />
					                              	</div>
					                          </div>
					                     </div>
					                    </div>
				                       	</form>
									</div>
								</div>
							</div>
							<div class="tab-pane fade<?php if(($this->uri->segment(3) == "bank")) {?> in active<?php }?>" id="myTab_example2">
								<div class="row">
									<div class="col-sm-12">
										<?php if(($this->uri->segment(4) == "bankTrue")) {?>
										<div class="alert alert-success">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Done!</strong> Bank Transaction record saved successfully... :)
										</div>
										<?php }elseif(($this->uri->segment(4) == "bankFalse")){?>
										<div class="alert alert-danger">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Oh my god...!</strong> Somthing Wrong contact to Hwebs technologies... :(
										</div>
										<?php }elseif(($this->uri->segment(4) == "balanceFalse")){?>
										<div class="alert alert-danger">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Oh my god...!</strong> Not enough balance avaliable in account.... <strong>Sorry...</strong> :(
										</div>
										<?php }?>
									
										<div class="panel panel-calendar">
											<div class="panel-heading panel-blue border-light">
												<h4 class="panel-title">Bank Transaction Detail</h4>
											</div>
											<div class="panel-body">
											     <div class="alert alert-info">
											<h4 class="center"><b>WELCOME TO THE BANK TRANSACTION AREA</b></h4><br>
	                                    <center>  Here You Can Maintain bank Related Transaction's Entries .</center>
										</div>
												<form method="post" action="<?php echo base_Url()?>dayBookControllers/bankTransactionDb">
					                            <div class="form-group">
					                              	<div class="form-group" align="center">
					                                	<table width="60%">
						                                	<tr>
						                                        <td>
						                                        	<a href="<?php echo base_Url()?>dayBookControllers/transactionDetail/bank/deposit" class="submit btn btn-blue">
						                                        		Previous Deposit
						                                        	</a>
						                                        </td>
						                                        <td>
						                                        	<a href="<?php echo base_Url()?>dayBookControllers/transactionDetail/bank/withdrwal" class="submit btn btn-blue">
						                                        		Previous Withdrawal
						                                        	</a>
						                                        </td>
						                                	</tr>
					                                 	</table>
					                                </div>
					                       		</div>
					                            <table width="100%" align="center">
							                        <tr>
							                        <td>
							                        	<label>Bank Transaction</label> &nbsp;&nbsp;&nbsp; <br>
							                            <select name="id_name" style="width:150px;" required>
							                                <option value="">-Select Transaction-</option>
							                                <option value="deposite"> Deposit </option>
							                                <option value="receive"> Withdrawal </option>
							                            </select>
							                       </td>
							                        <td>
							                            <label>Bank Name</label> &nbsp;&nbsp;&nbsp;<br>
							                            <input name="bank_name" style="width:150px;" type="text" required/>
							                        </td>
							                        <td>
							                        	<label>Account No.</label> &nbsp;&nbsp;&nbsp;<br>

							                        <!--    <input name="account_no" name="amount" id="amount3" pattern="[0-9]" onkeyup="digitvalidation3()" style="width:200px;" type="text" required/><span style="color:#F00" id="digit3"></span>-->
							                           <input name="account_no"  id="amount3"   style="width:200px;" type="number" required/><span style="color:#F00" id="digit3"></span>
							                       
							                        </td>
							                        <td>
							                            	<span id="balance1"></span><br/>
							                            <label>Amount<span style="color:#F00">*</span></label> &nbsp;&nbsp;&nbsp;<br>
							                            <!--<input name="amount" id="amount1" pattern="[0-9]" onkeyup="digitvalidation1()" style="width:200px;" type="text" required /><span style="color:#F00" id="digit1"></span>-->

							                            <input name="amount" id="amount1" onkeyup="digitvalidation1()"  style="width:200px;" type="text" required /><span style="color:#F00" id="digit1"></span>
							                        </td>
							                        
							                    
							                      
							                        </tr>
							                        <tr>
							                        </tr>
							                        <tr>
							                       
							                         	<td>
							                           	 	<label>Cheque / Trasaction Number *</label> &nbsp;&nbsp;&nbsp;<br>
							                            	<input name="chequeTranNum" style="width:200px;" type="text" required="required" />
							                       	 	</td>
							                       	 	<td>
							                           	 	<label>Remark *</label> &nbsp;&nbsp;&nbsp;<br>
							                           	 	<textarea rows="3" name="remark" style="width:200px;" cols="6" required="required"></textarea>
							                            	
							                       	 	</td>
							                        </tr>
							                    </table>
						                         <div class="form-group" style="margin-top:30px">
					                              	<div class="form-group" align="right">
					                              		<input class="submit btn btn-blue" type="submit" value="Save to Pass Record" />
					                        		</div>
												</div>
					                       		</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade<?php if(($this->uri->segment(3) == "director")) {?> in active<?php }?>" id="myTab_example3">
								<div class="row">
									<div class="col-sm-12">
										<?php if(($this->uri->segment(4) == "directorTrue")) {?>
										<div class="alert alert-success">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Done!</strong> Director Transaction record saved successfully... :)
										</div>
										<?php }elseif(($this->uri->segment(4) == "directorFalse")){?>
										<div class="alert alert-danger">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Oh my god...!</strong> Somthing Wrong contact Hwebs technologies... :(
										</div>
										<?php }elseif(($this->uri->segment(4) == "balanceFalse")){?>
										<div class="alert alert-danger">
											<button data-dismiss="alert" class="close">
												&times;
											</button>
											<strong>Ooops...!</strong> Not enough balance avaliable in account.... <strong>Sorry...</strong> :(
										</div>
										<?php }?>
									
									
										 <form method="post" action="<?php echo base_Url()?>dayBookControllers/directorTransaction">
										 	<div class="panel panel-calendar">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Director Transaction Detail</h4>
												</div>
												<div class="panel-body">
												     <div class="alert alert-info">
											<h4 class="center"><b>WELCOME TO THE DIRECTOR TRANSACTION AREA</b></h4><br>
	                                          <center>In This Area Director Can Withdraw Money in Emergency Case And Also Can Deposite Money .</center> 
										</div>
					                        		<div class="form-group">
						                              	<div class="form-group" align="center">
						                                	<table width="60%">
							                                	<tr>
							                                        <td>
							                                        	<a href="<?php echo base_Url()?>dayBookControllers/transactionDetail/director/deposit" class="submit btn btn-blue">
							                                        		Previous Deposit
							                                        	</a>
							                                        </td>
							                                        <td>
							                                        	<a href="<?php echo base_Url()?>dayBookControllers/transactionDetail/director/withdrwal" class="submit btn btn-blue">
							                                        		Previous Received
							                                        	</a>
							                                        </td>
							                                	</tr>
						                                 	</table>
						                                </div>
						                       		</div> 
						                             <table class="table table-striped table-hover" id="sample-table-2">
						                            	<tr>
							                          		<td>
							                             		<label id="action">Action <span style="color:#F00">*</span></label> &nbsp;&nbsp;&nbsp; 
							                            		<select name="action_transaction" style="width:120px;">
								                               		<option value="">-select one-</option>
								                                	<option value="Diposited">Handover to Director</option>
								                               		<option value="Receive">Received from Director</option>
							                           			</select> 
							                                 </td>
							                                 	  <td>
							                            <label>Bank Name</label> &nbsp;&nbsp;&nbsp;<br>
							                            <input name="bank_nm" style="width:150px;" type="text" required/>
							                        </td>
							                        <td>
							                        	<label>Account No.</label> &nbsp;&nbsp;&nbsp;<br>

							                        <!--    <input name="account_no" name="amount" id="amount3" pattern="[0-9]" onkeyup="digitvalidation3()" style="width:200px;" type="text" required/><span style="color:#F00" ></span>-->
							                           <input name="accountno"  id="amount4" style="width:200px;" type="number" required/><span style="color:#F00" id="digit4"></span>
							                       
							                        </td>
							                         		<td>
							                         		    	<span id="balance3"></span><br/>
							                            <label>Amount<span style="color:#F00">*</span></label> &nbsp;&nbsp;&nbsp;<br>
							                            <!--<input name="amount" id="amount1" pattern="[0-9]" onkeyup="digitvalidation1()" style="width:200px;" type="text" required /><span style="color:#F00" id="digit1"></span>-->

							                            <input name="amount" id="damt" onkeyup="digitvalidation3()"  style="width:200px;" type="text" required /><span style="color:#F00" id="errorid"></span>
							                        </td>
									                     </tr>
									                     <tr>   
									                        <td>
									                        	<label>Handover/Receive by Name</label> &nbsp;&nbsp;&nbsp;<br>
									                            <input name="name" style="width:200px;" type="text"/>
									                        </td> 
									                        <td>
									                        	<label>Discription</label> &nbsp;&nbsp;&nbsp;<br>
									                            <textarea rows="5" cols="12" name="disc" style="width:200px;" type="text"> </textarea> 
									                        </td>                       	
								                        </tr>
						                        	</table>
							                         <div class="form-group" style="margin-top:30px">
							                         	<div class="form-group" align="right">
							                            	<input class="submit btn btn-blue" type="submit" value="Save to School Record" />
							                           	</div>
							                        </div>
							                     </div>
							                 </div>
					                	</form>
									</div>
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



								

							<!---- Script For Testing --->
						<!-- end: PAGE CONTENT-->
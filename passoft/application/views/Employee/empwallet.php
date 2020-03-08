
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Wallet Details</span></h4>
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
									<a class="panel-refresh" href="#">
										<i class="fa fa-refresh"></i> <span>Refresh</span>
									</a>
								</li>
								<li>
									<a class="panel-config" href="#panel-config" data-toggle="modal">
										<i class="fa fa-wrench"></i> <span>Configurations</span>
									</a>
								</li>
								<li>
									<a class="panel-expand" href="#">
										<i class="fa fa-expand"></i> <span>Fullscreen</span>
									</a>
								</li>
							</ul>
						</div>
						<a class="btn btn-xs btn-link panel-close" href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="panel-body">
				    			<div style="text-align:center;" class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
                                    <h4 class="media-heading text-center">Welcome To Wallet Details Area</h4>
                                    <p>In This Section You can see your pass wallet value and cash back amount<br>
                                    </p> 
                                </div>
				    
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr style="background-color:#1ba593; color:white;">
                                            <th style="text-align:center;">PAS Value</th>
                                            <th style="text-align:center;">Cashback Amount</th>                                        
									</tr>
								</thead>
								<tbody>
								     <tr class=" text-center">
								<?php if($emppv->num_rows()>0)
                            		    {
                            		        $data = $emppv->row(); ?>
                            		        <td style="text-align:center;"><?php if($data->pv>0) { echo $data->pv; } else { echo "There Is No PV(Pass Value) In Your Account."; } ?></td>
                                        <td style="text-align:center;"> <?php if($data->rupee>0) { echo "Rs-".$data->rupee."/-"; } else { echo "There Is No Cashback In Your Account."; } ?></td>
                                    <?php
                            		    }
                            		    else
                            		    {
                            		        echo "Data Not Found";
                            		    }?>
                                        </tr>
                                </tbody>   
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
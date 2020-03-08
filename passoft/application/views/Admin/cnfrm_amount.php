
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Admin Confirm Amount List</span></h4>
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
					<div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <select class="form-control" id="branch_name">
                                    <option>-Select Branch-</option>
                                        <?php 
                                        $brow = $this->db->get('branch');
                                        if($brow->num_rows()>0){
                                    foreach($brow->result() as $row):
                                            ?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                                            <?php
                                        endforeach;}?>
                                </select>
                            </div>
                            <div class="col-md-6">
                            
                            </div>
                        </div>
                    </div>
                      <div class="row" style="padding-top:20px;">
                        <div class="col-md-12" id="amount_list">
                            
                        </div>
                      </div>                  
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
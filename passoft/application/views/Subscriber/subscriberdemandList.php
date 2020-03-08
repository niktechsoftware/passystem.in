
<div class="container">
	<div class="row col-md-12">
	
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Registered Active Shops Demand List</span></h4>
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
				    			<div class="alert btn-purple">
				    			    <button data-dismiss="alert" class="close"></button>
<h4 class="media-heading text-center">Welcome to Shops Demand List </h4>
<p>You can see the Shops Demand List according to Shops.<br>
</p> </div>
				    
				
					<div class="row">
						<div class="col-md-12 ">
						<?php if($this->session->userdata("login_type")==1){ ?>

					
						<div class="col-md-5">
								<select class="form-control" id="branchid">
								<option>-Select Branch-</option>
								<?php foreach($branch as $rdt):?>
									<option value="<?php echo $rdt->id;?>"><?php echo $rdt->b_name;?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="col-md-5">
								<select class="form-control" id="sbranchid">
								
								</select>
							</div>
					<?php	} else if($this->session->userdata("login_type")==2) { ?>
							<div class="col-md-5">
								<select class="form-control" id="subbranch1">
								<option>-Select Sub Branch-</option>
								<?php foreach($activeList->result() as $row):?>
									<option value="<?php echo $row->id;?>"><?php echo $row->bname;?></option>
									<?php endforeach;?>
								</select>
							</div>
					<?php } ?>
						</div>
					</div>
					<div class="table-responsive" id="subscriberList" style="padding-top:20px;">
					
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
	
	</div>
	<!-- end: PAGE CONTENT-->
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
     $(document).ready(function(){
          
        $("#branchid").change(function(){
         var classv=$("#branchid").val();
        //alert(classv);
      $.post("<?php echo site_url("subscriberController/getsubbranch")?>",{classv:classv},function(data){
        //  alert(data);
      $('#sbranchid').html(data);
   
      });
        });
		
		
  
    	$("#sbranchid").change(function(){
            var subbranchid = $("#sbranchid").val();
           alert(subbranchid);
            $.post("<?php echo site_url('subscriberController/adminsbranchSub') ?>", {subbranchid : subbranchid
        }, function(data){
					 //alert(data);
            $("#subscriberList").html(data);
					
               // document.getElementById("subbutton").disabled =false;
       });
        });

      $('#subbranch1').change(function(){
        var subBranch = $('#subbranch1').val();
        //alert(subBranch);
        $.post("<?php echo site_url('subscriberController/subscriberDemandList1')?>",{subBranch: subBranch},function(data){
          $('#subscriberList').html(data);
         // alert(data);
        });
      });
     });
		</script> 

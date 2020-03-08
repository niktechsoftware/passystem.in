<div class="page-body">
  
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- start: EXPORT DATA TABLE PANEL  -->
			<div class="panel panel-white">
			<div class="panel-heading panel-red">
					<h4 class="panel-title"> <span class="text-bold">Assign Product To Delivery Incharge</span></h4>
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
<h4 class="media-heading text-center">Welcome to Assign Product To Delivery Incharge </h4>
<p>Here you can Assign  Transfer   Products Invoice to Delivery Incharge.<br>
</p> </div>
				    
						<div class="row">
						<div class="col-md-12 space20">
							<div class="btn-group pull-right">
								<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
									Export <i class="fa fa-angle-down"></i>
								</button>
							
								<ul class="dropdown-menu dropdown-light pull-right">
								
									<li>
										<a href="#" class="export-excel" data-table="#sample-table-2" >
											Export to Excel
										</a>
									</li>
								
								</ul>
							
							</div>
						</div>
					</div>
  
  

    <!--<script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js">-->
    <!--</script>-->
     <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <table id="sample-table-2" class="table table-striped table-bordered nowrap">
      <thead>
        <tr style="background-color:#1ba593; color:white;">
          <th style="width:8px;">SNO</th>

             <th style="width:20px;">Sender Username</th>
             <th style="width:20px;">Invoice Number</th>
             <th style="width:40px;">Order Assign</th>
             <th style="width:30px;">Date</th>
              <th style="width:30px;">Product Details</th>
            
        </tr>
      </thead>
      <tbody style="margin-top:2px;">
        <?php 
                //   
                $dt=date('Y-m-d');
             
                 $senderusername= $this->session->userdata("username");
                 $this->db->where('sender_username',$senderusername);
                 $brwproduct=$this->db->get('assignproduct')->result(); 
                 $i=1;foreach ($brwproduct as  $value):
                //  $this->db->where('id',$value->p_code);
                //  $sproduct=$this->db->get('stock_products')->row(); 
                  ?>
        <tr class="text-uppercase">
          <td><?php echo $i;?></td>
          <td style="width:20px;"><?php echo $value->sender_username;?> </td>
          <td style="width:2px;"><a href="<?php echo base_url();?>stockController/productinvoice/<?php echo $value->invoice_no; ?>" class="btn btn-primary"> <?php echo $value->invoice_no;?></a> </td>
            <td><?php if($value->del_boy==0){?>
                   
                          <input type="hidden" id="orderno<?php echo $i; ?>" value="<?php echo  $value->invoice_no;?>">
                     <button type="sumbit" id="assign<?php echo $i;?>" class="btn btn-warning"><?php echo "Assign"?></button><select id="delivery<?php echo $i;?>" class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;"></select>
                    <?php } else{  
                
                   $id= $this->session->userdata("id");
                    $aa= array(
                                'emp_type'=>'5',
                                'status'=>'1');
                    
                      $this->db->where($aa);
                      $deliveryboy=$this->db->get('employee');//->num_rows();
                      // echo $deliveryboy;
                      // exit;
                          
                      ?>
                       <input type="hidden" id="orderno1<?php echo $i; ?>" value="<?php echo  $value->invoice_no;?>">
         <select class="form-control text-uppercase"  id="selectdelivery<?php echo $i;?>" style="max-height:40px;max-width:120px;margin-left:-12px;color:#01a9ac">
           <?php if($deliveryboy->num_rows()>0)
         {
         $boy=$deliveryboy->result(); ?>
      <?php 
       foreach($boy as $row1){
    //              $this->db->where('order_no',$row->order_no);
    //                  $boy1=$this->db->get('order_serial')->row();
       ?> 
  <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row1->id;?>" <?php if($row1->id): echo 'selected="selected"'; endif; ?>><?php echo  $row1->name." [ ". $row1->username. " ] ";?></option>     
            
      <?php } ?>
        
    <?php }?></select><?php }?></td>
        
            <td><?php echo $value->date;?> </td>
             <td><a href="<?php echo base_url();?>stockController/productdetail/<?php echo $value->invoice_no;?>" class="btn btn-info">Product Deails</a> </td>
              </tr>
      

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

                  <script>
                  $(document).ready(function() {
                      
                 $('#delivery<?php echo $i;?>').hide();    
                 $('#assign<?php echo $i;?>').click(function(){
              
               // alert(orderno);
              $.post("<?php echo site_url('shopController/selectdelivery1')?>", {}, function(data){
                $('#assign<?php echo $i;?>').hide();
                 $('#delivery<?php echo $i;?>').show(); 
                 $('#delivery<?php echo $i;?>').html(data);
                      })
                    });
    
    $('#delivery<?php echo $i;?>').change(function(){
      var id = $('#delivery<?php echo $i;?>').val();
      var orderno = $('#orderno<?php echo $i; ?>').val();
      $.post("<?php echo site_url('shopController/assigntodeliveryproduct')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
    
     $('#selectdelivery<?php echo $i;?>').change(function(){
      var id = $('#selectdelivery<?php echo $i;?>').val();
      var orderno = $('#orderno1<?php echo $i; ?>').val();
      $.post("<?php echo site_url('shopController/assignagaindeliveryproduct')?>", {id : id,orderno:orderno}, function(data){ 
        //  // alert(data)
        //  $('#selectdelivery<?php echo $i;?>').html(data);
      })
    });
                  });
    </script>
    
      <?php $i++;endforeach;?>
      </tbody>
    </table>
    
  	
					</div>
				</div>
			</div>
			<!-- end: EXPORT DATA TABLE PANEL -->
		</div>
	</div>
	<!-- end: PAGE CONTENT-->
</div>
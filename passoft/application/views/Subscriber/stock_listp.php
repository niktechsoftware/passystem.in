<style>
    mark { 
                background-color:#FF00FF; 
                color:white; 
            } 
            mark1 { 
                background-color:#296d98; 
                color:white; 
            }
</style>
<div class="table-responsive">
    <table class="table table-striped table-hover" id="sample-table-2">
        	<thead>
				<tr style="background-color:#1ba593; color:white;">
                    <th width:"10px">SNO</th>
                    <th width:"10px">Company</th>
                    <th width:"10px">Product Name</th> 
                    <th width:"10px">Type</th>
                    <th width:"10px">Size</th>
                      <th width:"10px">MRP</th>
                    <th width:"10px">Our Price</th>
                    
                  
                   
                    <th width:"10px">Image 1</th>
                    <th width:"10px">Like</th>
                     <th width:"10px">Discount</th>
                   
				</tr>
			</thead>
			<tbody>
			   <?php //print_r($custdata); 
			   if($custdata->num_rows()>0)
			   {
			       $like=0; $i=1;
			       foreach($custdata->result() as $pro_data)
    			   {
    			     //  echo $pro_data->name."<br>";
    			   ?>
    			       <tr>
    			            <td><?php echo $i;?></td>
    			            <td width:"10px" style ='text-transform: capitalize;'><?php echo $pro_data->company;?></td>
                            <td width:"10px" style ='text-transform: capitalize;'><?php echo $pro_data->name;?></td>
                            <td width:"10px" style ='text-transform: capitalize;'><?php echo $pro_data->p_type;?></td>
                            <td width:"10px"><?php echo $pro_data->size;?></td>	
                             <td style="color:red"><?php echo "<u>".$pro_data->mrp_price."</u>";?></td>
                            <td  ><mark><b><?php echo $pro_data->selling_price;?></b></mark></td>
                           
                            
                            <td width:"10px"><?php if(strlen($pro_data->file1)>0){?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } else { ?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $pro_data->file2;?>" style="max-height: 50px; max-width: 100px;"><?php }?></td>
                            <input type="hidden" value="<?php echo $pro_data->id;?>" id="abc<?php echo $i;?>" />
							<td width:"10px">
							    <img src="<?php echo $this->config->item('asset_url');?>/images/subscriber/like.jpg" id="inactive<?php echo $i;?>" style="max-height: 50px;">
							    
							    <img src="<?php echo $this->config->item('asset_url');?>/images/subscriber/heart.gif" id="active<?php echo $i;?>" style="max-height: 50px;">
                                
							</td>
						 <td width:"10px"><?php $prof = ((($pro_data->mrp_price -$pro_data->selling_price)*100)/$pro_data->mrp_price); if($prof>0){echo "<mark1>".number_format((float)$prof, 2, '.', '')."%</mark1>";}else{ echo "0%";}?></td>
                           
                           
                             <script>
                                   $("#active<?php echo $i;?>").hide();
                                        $("#inactive<?php echo $i;?>").hide();
                                         <?php $this->db->where('id',$this->session->userdata('id'));
							                	$sb_data=$this->db->get('customers')->row();
                                         $condtion= array('product_code' => $pro_data->id, 'customer_id' =>$this->session->userdata('id'),'sub_branchid' =>$sb_data->sub_branchid);
											$this->db->where($condtion);
											$fv_check=$this->db->get('favourite_list')->num_rows();
											if($fv_check>0) 
											    { ?>
											     $("#active<?php echo $i;?>").show();
                                                $("#inactive<?php echo $i;?>").hide();
										    <?php } 
										    else 
											    { ?>
    											$("#inactive<?php echo $i;?>").show();
                                                $("#active<?php echo $i;?>").hide();
										    <?php } ?>
										    
										$("#inactive<?php echo $i;?>").click(function(){
                                           var id = $("#abc<?php echo $i;?>").val();
                                           //alert(id);
												$.post("<?php echo site_url();?>subscriberController/insert_in_fvlist", { id:id }, function(data){
													$("#active<?php echo $i;?>").show();
                                                    $("#inactive<?php echo $i;?>").hide();
													$('#number').html(data);
												});
											});
											
											 $("#active<?php echo $i;?>").click(function(){
                                                var id = $("#abc<?php echo $i;?>").val();
                                                //alert(id);
												$.post("<?php echo site_url();?>subscriberController/delete_in_fvlist", { id:id }, function(data){
													$("#active<?php echo $i;?>").hide();
                                                    $("#inactive<?php echo $i;?>").show();
													$('#number').html(data);
												});
											});

                             </script>       
    			       </tr>
		             <?php $i++; 
		            } 
			   }
			   ?>
			   
			</tbody>
    </table>
     <a style=" margin:10px;" class="btn btn-warning" href="<?php echo base_url();?>subscriberController/my_fvlist">Go to Next Step</a>
</div>
	<script>
					    
			//	Main.init();
			//	SVExamples.init();
			//	FormElements.init();
				TableExport.init();
			//	UIModals.init();
			            
					</script>
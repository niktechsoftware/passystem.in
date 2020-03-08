<?php // print_r($streamList); exit(); ?>
	
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sample-table-2">
								<thead>
									<tr>
                                      <th>#</th>
                                      <th>Sub Cat</th>
                                      <th>Action</th>
                                    </tr>
								</thead>
                                <tbody>
                                <?php  $i=1;  if(isset($streamList)){
                                foreach ($streamList->result() as $row)
                                { ?>
                                   <tr>
    							        <td><?php echo $i; ?></td>
    							        <td>
    							            <input type="text" id="sub_cat_name<?php echo $i;?>" class="text-uppercase" value="<?php echo $row->name; ?>"/>
    							            <input type="hidden" id="sub_cat<?php echo $i;?>" value="<?php echo $row->id;?>"/>
    							        </td>
    							        <td>
    							            <input type="button" class="btn btn-sm btn-light-green" id="editt<?php echo $i;?>" value="Edit"/>
    			                            <input type="button" class="btn btn-sm btn-light-green" id="deletet<?php echo $i;?>"value="Delete"/>
    							        </td>
							        </tr> 
                                <script>
                        		 $("#editt<?php echo $i;?>").click(function(){
                        	    		var streamId = $("#sub_cat<?php echo $i;?>").val();	
                        	    		var stream_name = $("#sub_cat_name<?php echo $i;?>").val();	
                        	    		alert(streamId);
                        	    		alert(stream_name);
                        	    		$.post("<?php echo site_url('stockController/updatesubCategory');?>", {streamId:streamId, stream_name:stream_name}, function(data){
                                        $("#sectionList").html(data);
                        	  
                        	    		});
                        	    	
                        	        });
                        
                        		    $("#deletet<?php echo $i;?>").click(function(){
                        		     	var streamId = $('#sub_cat<?php echo $i;?>').val();
                        	    		 $.post("<?php echo site_url('stockController/deletesubCategory');?>", {streamId : streamId}, function(data){
                                        $("#sectionList").html(data);
                        	  
                        	    		});
                        	        });
                        
                        
                        		</script>
                                <?php    $i++;
                                
                                }
                                
                                }?>
							    
                                </tbody>   
							</table>
						</div>
					
				
					<script>
					     TableExport.init();
	   // <!--                    Main.init();-->
				//  <!--           SVExamples.init();-->
					</script>


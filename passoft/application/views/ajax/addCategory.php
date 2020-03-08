    
    	<div class="table-responsive">
    		<table class="table table-striped table-hover" id="catttq">
    			<thead>
    				<tr>
    				    <th>#</th>
    				    <th>Category</th>
    				    <th>Action</th>
    				</tr>
    			</thead>
    			<tbody>
    			    <?php
                        $i = 1;
                        if(isset($streamList)):
                        	foreach ($streamList->result() as $row):
                        ?>
    			    <tr>
    			        <td>
			            	<?php echo $i;?>
    			        </td>
    			        <td>
    			            <span id="name2<?php echo $i;?>" Style="color:red;"></span>
			            	<input type="text" id="streamValue<?php echo $i;?>"  class="text-uppercase" maxlength="15" onkeypress="return isAlaphabte(event)" value="<?php echo $row->name;?>" >
                			<input type="hidden" id="streamId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
    			        </td>
    			        <td>
    			            <a href="#" class="btn btn-sm btn-light-green" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
    			            <a href="#" class="btn btn-sm btn-light-green" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
    			        </td>
    			    </tr>
    			
		<!--<div class="text-white text-sm pull-left space10">-->
		<!--</div>-->
		<script>
		 $("#edit<?php echo $i; ?>").click(function(){
	    		var streamId = $('#streamId<?php echo $i; ?>').val();	
	    		var streamName = $('#streamValue<?php echo $i; ?>').val();
					alert("your stream is successfully updated");
					//alert(streamName);
	    		var form_data = {
						streamId : streamId,
						streamName : streamName
					};
			$.ajax({
				url: "<?php echo site_url("stockController/updateCategory") ?>",
				type: 'POST',
				data: form_data,
				success: function(msg){
					$("#streamList1").html(msg);
				}
			});
	        });

		    $("#delete<?php echo $i; ?>").click(function(){
	    		var streamId = $('#streamId<?php echo $i; ?>').val();
	    			alert("your stream is successfully deleted");
	    		
	    		$.post("<?php echo site_url('stockController/deleteCategory') ?>", {streamId : streamId}, function(data){
	                $("#streamList1").html(data);
	                
	    		})
	        });


		</script>
<?php
	$i++;
	endforeach;
endif;
?>
                </tbody>
    		</table>
    	</div>
	                <script>
	                $(document).ready(function(){
	                    $('#catttq').DataTable();
	                     TableExport.init();
	       //             Main.init();
	       //             SVExamples.init();
	                });
					    
					</script>

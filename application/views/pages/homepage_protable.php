<div class="container">
	
  <div class="row text-center portfolio" style="margin-top:5%";>
      
              <div class="">
            <?php echo $pagination; ?>
        </div>
      
      
      <table id="product" style="width:100%">
  <thead style="display:none;">
				<tr>
					<th>Name</th>
				</tr>
  </thead>
      
      <tbody>
  <?php for ($i = 0; $i < count($productlist); ++$i) { ?>
  
 

    <div class="col-lg-3 col-sm-4 col-xs-6">
         <tr style="text-align: -webkit-center;">
      <td>
        <div class="panel panel-default" style="margin-bottom:10%; border-color:rgb(242, 0, 137);">
            <div class="panel-body ">
			
                <a href="<?php echo base_url();?>index.php/auth/signin">
				    
				<?php if ($productlist[$i]->file1){?>
                    <img src="<?php echo base_url();?>passoft/assets/productimg/<?php  echo $productlist[$i]->file1;?>" style="height:150px; width:150px;" class="img-thumbnail img-responsive">
				<?php }else{?>
					<img src="<?php echo base_url();?>passoft/assets/productimg/noimage.png" class="img-thumbnail img-responsive">
				<?php }?>
               
			    </a>
            </div>
            <div class="panel-footer">
		<span style="text-transform: uppercase">	<?php echo $productlist[$i]->company; ?></span><br/>
			<span style="text-transform: capitalize"><?php echo $productlist[$i]->name; ?><span><br/>
			<span style="text-transform: capitalize">Rs. <?php echo $productlist[$i]->selling_price; ?><span>
            </div>  
        </div> 
        
        
        </td>
    </tr>
    </div>
    
    
    
    <div class="clear"></div> 
    
    
	<?php } ?>
	
	</tbody>
      </table>
    
  </div>

 
  
</div>